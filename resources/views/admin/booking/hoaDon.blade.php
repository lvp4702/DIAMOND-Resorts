<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Invoice</title>

</head>
<style>
    body {
        font-family: 'DejaVu Sans';
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .info {
        margin-bottom: 12px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 30px;
    }

    tr {
        border-bottom: 1px solid #ddd;
        height: 50px;
    }

    th {
        text-align: left;
    }
</style>

<body>
    <p style="text-align:right;"><b>DIAMOND Resorts</b></p>
    <p style="text-align:right;">Chi nhánh: <b>Hà Nội</b></p>
    <p style="text-align:right;">Liên hệ: <b>0376365516</b></p>

    <h1>HÓA ĐƠN ĐẶT PHÒNG</h1>

    <div class="info">
        <label>Khách hàng:</label>
        <b>{{ $booking->fullname }}</b>
    </div>

    <div class="info">
        <label>Số điện thoại:</label>
        <b>{{ $booking->phoneNumber }}</b>
    </div>

    <div class="info">
        <label>Ngày đặt:</label>
        <b>{{ $booking->created_at->format('d-m-Y h:i:s') }}</b>
    </div>

    <div class="info">
        <label>Ngày in hóa đơn:</label>
        <b>{{ $printedAt }}</b>
    </div>
    <table>
        <tr>
            <th>Tên phòng</th>
            <th>Đơn giá(đ)</th>
            <th>Ngày nhận phòng</th>
            <th>Ngày trả phòng</th>
        </tr>
        <tr>
            <td>{{ $booking->room->name }}</td>
            <td>{{ number_format($booking->room->price, 0, ',', '.') }}</td>
            <td>{{ $booking->check_inDate }}</td>
            <td>{{ $booking->check_outDate }}</td>
        </tr>
    </table>

    <p style="text-align:right;">Tổng cộng: <b>{{ number_format($booking->total, 0, ',', '.') }}đ</b></p>

</body>

</html>
