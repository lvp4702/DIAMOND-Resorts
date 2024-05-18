<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CommentRequest;
use App\Http\Requests\Contact\ContactRequest;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Requests\Profile\ProfileRequest;
use App\Models\Booking;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\News;
use App\Models\Room;
use App\Models\Slide;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        //3 phong nhieu don dat nhat
        $rooms = Room::select('rooms.*', DB::raw('count(bookings.id) as booking_count'))
            ->leftJoin('bookings', 'rooms.id', '=', 'bookings.room_id')
            ->where('bookings.status', 'Đã thanh toán')
            ->groupBy('rooms.id', 'rooms.name', 'rooms.price', 'rooms.describe', 'rooms.img1', 'rooms.img2', 'rooms.img3')
            ->limit(3)
            ->get();

        $latestNews = News::orderByDesc('id')->take(2)->get();
        $skienNoiBat = News::orderBy('id')->take(3)->get();

        return view('client.index', compact('slides', 'rooms', 'latestNews', 'skienNoiBat'));
    }

    public function profile()
    {
        $bookings = Booking::where('user_id', Auth::id())->where('status', 'Đã thanh toán')->orderByDesc('created_at')->get();

        return view('client.profile', compact('bookings'));
    }

    public function up_profile(ProfileRequest $request, User $user)
    {
        $body = $request->except('password');

        if ($request->hasFile('avatar')) {
            $ext = $request->file('avatar')->extension();
            $generate_unique_file_name = md5(time()) . '.' . $ext;
            $request->file('avatar')->move('images', $generate_unique_file_name, 'local');

            $body['avatar'] = 'images/' . $generate_unique_file_name;
        }

        $user->update($body);
        return redirect()->back()->with('message', 'Cập nhật thông tin cá nhân thành công !');
    }

    public function introduce()
    {
        return view('client.introduce');
    }

    public function rooms()
    {
        $rooms = Room::all();
        return view('client.rooms', compact('rooms'));
    }

    public function room_detail($id)
    {
        $room = Room::where('id', $id)->first();
        $comments = Comment::where('room_id', $id)->orderByDesc('id')->paginate(5);
        $totalCmt = Comment::where('room_id', $id)->count();

        return view('client.room_detail', compact('room', 'comments', 'totalCmt'));
    }

    public function booking(OrderRequest $request)
    {
        $checkInDate = $request->check_inDate;
        $checkOutDate = $request->check_outDate;
        $roomID = $request->room_id;

        $room = Room::where("id", $roomID)->first();

        //kiểm tra xem ngày đặt có bị trùng không
        $existingBookings = Booking::where('room_id', $roomID)->where('status', 'Đã thanh toán')->get();
        foreach ($existingBookings as $existingBooking) {
            if (($existingBooking->check_inDate <= $checkInDate && $checkInDate <= $existingBooking->check_outDate)
                || ($existingBooking->check_inDate <= $checkOutDate && $checkOutDate <= $existingBooking->check_outDate)
                || ($checkInDate <= $existingBooking->check_inDate && $existingBooking->check_inDate <= $checkOutDate)
                || ($checkInDate <= $existingBooking->check_outDate && $existingBooking->check_outDate <= $checkOutDate)
            ) {
                return redirect()->back()->with('error', 'Phòng đã có người đặt trong khoảng thời gian bạn chọn !');
            }
        }

        //tính số ngày khách ở
        $startDate = Carbon::parse($checkInDate);
        $endDate = Carbon::parse($checkOutDate);
        $numberOfDays = $startDate->diffInDays($endDate);
        $total = $room->price * $numberOfDays;

        $dataBooking = $request->all();
        $dataBooking['total'] = $total;
        $dataBooking['status'] = 'Chưa thanh toán';

        $user_id = Auth::check() ? Auth::user()->id : null;

        $dataBooking['user_id'] = $user_id;

        $booking = Booking::create($dataBooking);

        //total > 1000
        $order = Order::create([
            'status' => 0,
            'code_order' => $this->generateRandomCode(8),
            'booking_id' => $booking->id,
            'user_id' => $user_id,
        ]);

        return redirect()->route('client.booking.momo', $order);
    }

    public function momo(Order $order)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = config('services.momo.partnerCode');
        $accessKey = config('services.momo.accessKey');
        $secretKey = config('services.momo.secretKey');

        // Tên Đơn
        $orderInfo = $order->booking->room->name . ", Ngày nhận phòng: " . $order->booking->check_inDate . ", Ngày trả phòng: " . $order->booking->check_outDate;
        //Số Tiền
        $amount = $order->booking->total;

        //code order ( không được trùng )
        $orderId = $order->code_order;

        $redirectUrl = route('client.booking.process_momo');
        $ipnUrl = route('client.booking.process_momo');
        $extraData = "Booking Room";

        $requestId = time() . "";
        $requestType = "captureWallet";

        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;

        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Diamond Resorts",
            "storeId" => "Booking Room",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );

        $result = $this->execPostRequest($endpoint, json_encode($data));

        $jsonResult = json_decode($result, true);

        if ($jsonResult['resultCode'] == '0') {
            return redirect()->to($jsonResult['payUrl']);
        }

        return redirect()->route("client.index")->with('error', 'Thanh toán đã bị hủy !');
    }

    function generateRandomCode($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomCode = '';

        for ($i = 0; $i < $length; $i++) {
            $randomCode .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomCode;
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function process_momo(Request $request)
    {
        $partnerCode = config('services.momo.partnerCode');
        $accessKey = config('services.momo.accessKey');
        $secretKey = config('services.momo.secretKey');

        $response = array();
        try {
            $partnerCode = $_GET["partnerCode"];
            $orderId = $_GET["orderId"];
            $requestId = $_GET["requestId"];
            $amount = $_GET["amount"];
            $orderInfo = $_GET["orderInfo"];
            $orderType = $_GET["orderType"];
            $transId = $_GET["transId"];
            $resultCode = $_GET["resultCode"];
            $message = $_GET["message"];
            $payType = $_GET["payType"];
            $responseTime = $_GET["responseTime"];
            $extraData = $_GET["extraData"];
            $m2signature = $_GET["signature"]; //MoMo signature

            //Checksum
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&message=" . $message . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo .
                "&orderType=" . $orderType . "&partnerCode=" . $partnerCode . "&payType=" . $payType . "&requestId=" . $requestId . "&responseTime=" . $responseTime .
                "&resultCode=" . $resultCode . "&transId=" . $transId;

            $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);

            if ($m2signature == $partnerSignature) {
                if ($resultCode == '0') {
                    $order = Order::where("code_order", $orderId)->first();
                    if (!$order) {
                        return redirect()->route("client.index")->with('error', 'Mã order không tồn tại !');
                    } else {
                        $order->status = 1;
                        $order->booking->status = 'Đã thanh toán';
                        $order->booking->save();
                        $order->save();
                        return redirect()->route("client.index")->with('message', 'Thanh toán thành công !');
                    }
                } else {
                    return redirect()->route("client.index")->with('error', 'Thanh toán đã bị hủy !');
                }
            } else {
                return redirect()->route("client.index")->with('error', 'Thanh toán đã bị hủy !');
            }
        } catch (\Exception $e) {
            return redirect()->route("client.index")->with('error', 'Thanh toán đã bị hủy !');
        }
    }

    public function news()
    {
        $news = News::orderBy('id')->take(6)->get();
        $newsDesc = News::orderByDesc('id')->take(5)->get();

        return view('client.news', compact('news', 'newsDesc'));
    }

    public function news_detail($id)
    {
        $newsDesc = News::orderByDesc('id')->take(5)->get();
        $news = News::where('id', $id)->first();
        // Lấy 4 bản ghi khác bản ghi hiện tại
        $other_news = News::where('id', '!=', $id)->orderBy('id')->take(4)->get();

        return view('client.news_detail', compact('news', 'newsDesc', 'other_news'));
    }

    public function contact()
    {
        return view('client.contact');
    }

    public function send_contact(ContactRequest $request)
    {
        Contact::create($request->all());

        return redirect()->back()->with('message', 'Gửi thông tin liên hệ thành công !');
    }

    public function comment(CommentRequest $request)
    {
        Comment::create($request->all());

        return redirect()->back()->with('message', 'Gửi đánh giá thành công !');
    }
}
