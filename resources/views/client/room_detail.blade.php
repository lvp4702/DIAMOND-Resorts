@extends('client.layouts.app')

@section('title', $room->name)

@section('content')
    <div class="room_1">
        <img src="{{ asset('images/introduce-1.jpg') }}" alt="">
        <h1>
            <a href="{{ route('client.rooms') }}">PHÒNG</a> / <span>{{ $room->name }}</span>
        </h1>
    </div>

    <div class="room_detail">
        <div class="room_detail-container">
            <div class="room_detail-content">
                @if ($room->img1)
                    <div class="room_detail-img">
                        <img src="{{ asset($room->img1) }}" alt="">
                    </div>
                @endif
                @if ($room->img2)
                    <div class="room_detail-img">
                        <img src="{{ asset($room->img2) }}" alt="">
                    </div>
                @endif
                @if ($room->img3)
                    <div class="room_detail-img">
                        <img src="{{ asset($room->img3) }}" alt="">
                    </div>
                @endif

                <div class="room_detail-img-row">
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                    @if ($room->img1)
                        <div class="room_detail-img-column">
                            <img class="demo cursor" src="{{ asset($room->img1) }}" style="width:100%"
                                onclick="currentSlide(1)">
                        </div>
                    @endif
                    @if ($room->img2)
                        <div class="room_detail-img-column">
                            <img class="demo cursor" src="{{ asset($room->img2) }}" style="width:100%"
                                onclick="currentSlide(2)">
                        </div>
                    @endif
                    @if ($room->img3)
                        <div class="room_detail-img-column">
                            <img class="demo cursor" src="{{ asset($room->img3) }}" style="width:100%"
                                onclick="currentSlide(3)">
                        </div>
                    @endif
                </div>

                <h1 class="room_detail-name">{{ $room->name }}</h1>
                <p class="room_detail-price"><span>{{ number_format($room->price, 0, ',', '.') }}đ</span> / ngày</p>
                <div class="room_detail-describe">{!! $room->describe !!}</div>

                <form method="POST" class="comment_form" action="{{ route('client.cmt') }}">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    @if(Auth::check())
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endif
                    <h1>THÊM ĐÁNH GIÁ</h1>
                    <div class="divider"></div>

                    <div class="comment_top">
                        <div class="comment_top_item">
                            <input type="radio" id="1" name="satisfaction" value="Tệ"  @if (!Auth::check()) disabled @endif>
                            <label for="1">Tệ</label>
                        </div>
                        <div class="comment_top_item">
                            <input type="radio" id="2" name="satisfaction" value="Không hài lòng"  @if (!Auth::check()) disabled @endif>
                            <label for="2">Không hài lòng</label>
                        </div>
                        <div class="comment_top_item">
                            <input type="radio" id="3" name="satisfaction" value="Bình thường"  @if (!Auth::check()) disabled @endif>
                            <label for="3">Bình thường</label>
                        </div>
                        <div class="comment_top_item">
                            <input type="radio" id="4" name="satisfaction" value="Hài lòng"  @if (!Auth::check()) disabled @endif>
                            <label for="4">Hài lòng</label>
                        </div>
                        <div class="comment_top_item">
                            <input type="radio" id="5" name="satisfaction" value="Rất hài lòng" @if (!Auth::check()) disabled @endif>
                            <label for="5">Rất hài lòng</label>
                        </div>
                    </div>
                    @error('satisfaction')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div>
                        <textarea name="content" id="content" cols="30" rows="5"
                            @if (!Auth::check()) placeholder="*Hãy đăng nhập để đánh giá !"
                            disabled style="border: 1px solid #d9d9d9;" @endif placeholder="Nhập nội dung bình luận !"
                            class="text_input @error('content') border-danger @enderror">{{ old('content') }}</textarea>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="button"
                        @if (!Auth::check()) disabled style="cursor: default;" @endif>GỬI ĐÁNH GIÁ</button>
                </form>
            </div>

            <div class="room-booking">
                <form action="{{ route('client.booking') }}" method="post" enctype="multipart/form-data">
                    <h1>ĐẶT PHÒNG</h1>
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">

                    <p>Họ & Tên</p>
                    <input type="text" name="fullname" value="{{ old('fullname', Auth::check() ? Auth::user()->fullname : '') }}"
                        class="text_input @error('fullname') border-danger @enderror">
                    @error('fullname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <p>Số điện thoại</p>
                    <input type="text" name="phoneNumber" value="{{ old('phoneNumber', Auth::check() ? Auth::user()->phoneNumber : '') }}"
                        class="text_input @error('phoneNumber') border-danger @enderror">
                    @error('phoneNumber')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <p>Ngày nhận</p>
                    <input type="date" name="check_inDate" value="{{ old('check_inDate') }}"
                        class="text_input @error('check_inDate') border-danger @enderror">
                    @error('check_inDate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <p>Ngày trả</p>
                    <input type="date" name="check_outDate" value="{{ old('check_outDate') }}"
                        class="text_input @error('check_outDate') border-danger @enderror">
                    @error('check_outDate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <p>Số người</p>
                    <input type="number" name="amountOfPeople" value="{{ old('amountOfPeople') }}"
                        class="text_input @error('amountOfPeople') border-danger @enderror">
                    @error('amountOfPeople')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    @if (Auth::check())
                        <p>Điểm tích lũy</p>
                        <input type="number" name="point" value="{{ old('point') }}"
                            class="text_input @error('point') border-danger @enderror">
                        @error('point')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <i style="font-size: 1.2rem; display: block; margin-top: 2px;">*Tối đa <b>{{ number_format(Auth::user()->point, 0, ',', '.') }}</b> điểm ( tương đương <b>{{ number_format(Auth::user()->point, 0, ',', '.') }}</b>đ )</i>
                    @endif

                    <button type="submit">GỬI</button>
                </form>
            </div>
        </div>
        <div class="comments">
            <h1>TẤT CẢ ĐÁNH GIÁ({{ $totalCmt }})</h1>
            @if ($totalCmt > 0)
                @foreach ($comments as $cmt)
                    <div class="comments_item">
                        <div class="comments_item_name">
                           <img src="{{ asset($cmt->user->avatar) }}" alt="" class="comments_item_avt">
                            <p>{{ $cmt->user->fullname ? $cmt->user->fullname : $cmt->user->username }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="comments_item_time">{{ $cmt->created_at->format('d-m-Y H:i') }}</div>
                        <div class="comments_item_satisfaction">
                            <span>Mức độ hài lòng: </span> <span>{{ $cmt->satisfaction }}</span>
                        </div>
                        <div class="comments_item_content">{{ $cmt->content }}</div>
                        @if ($cmt->reply)
                        <div class="reply">
                            <p>Phản hồi của chủ phòng</p>
                            <p>{{ $cmt->reply }}</p>
                        </div>
                        @endif
                    </div>
                @endforeach
                {{ $comments->links() }}
            @else
                <div class="no_cmt">
                    <i class="fa-regular fa-message"></i>
                    <p>Chưa có đánh giá !</p>
                </div>
            @endif
        </div>

        <div class="room_other">
            <p>CÓ THỂ BẠN QUAN TÂM</p>
            <div class="room_other_container">
                @foreach ($other_rooms as $other_room)
                    <div class="room_2-item">
                        <div class="room_2-item-img">
                            <img src="{{ asset($other_room->img1) }}" alt="">
                        </div>
                        <div class="room_2-item-content">
                            <h1>{{ $other_room->name }}</h1>
                            <div class="divider"></div>
                            <div class="room_2-item-bot">
                                <span>{{ number_format($other_room->price, 0, ',', '.') }}đ</span>
                                <a href="{{ route('client.room_detail', $other_room->id) }}" class="button">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("room_detail-img");
            let dots = document.getElementsByClassName("demo");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>

@endsection
