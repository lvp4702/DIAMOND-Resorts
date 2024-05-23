@extends('client.layouts.app')

@section('title', 'DIAMOND Resorts')

@section('content')
    <div class="home_1">
        @foreach ($slides as $slide)
            <div class="home_1-slide fade">
                <img src="{{ $slide->image }}" alt="">
            </div>
        @endforeach
        <div class="home_1-slide-dot-list">
            @for ($i = 0; $i < count($slides); $i++)
                <span class="home_1-slide-dot"></span>
            @endfor
        </div>
    </div>

    <div class="home_2">
        <div class="home_2-content">
            <div class="home_2-content-top">
                <h1><span>DỊCH VỤ</span> HẤP DẪN</h1>
                <p>Đến với khu nghỉ dưỡng DIAMOND Resorts, quý khách sẽ được trải nghiệm dịch vụ Spa cao cấp, <br>
                    trung tâm thể hình hiện đại và các hoạt động giải trí trên biển</p>
            </div>
            <div class="home_2-content-bot">
                <div class="home_2-content-bot-item home_2-item">
                    <img src="https://chefjob.vn/wp-content/uploads/2020/06/biet-cach-kiem-soat-nhiet-do.jpg"
                        alt="">
                    <p>Nhà hàng</p>
                </div>
                <div class="home_2-content-bot-item home_2-item">
                    <img src="https://maihanspa.com/ino_upload/source/XU%C3%82N/5-kinh-nghiem-quan-trong-nhat-giup-ban-lua-chon-spa-cham-soc-sac-dep.jpg"
                        alt="">
                    <p>Spa & Massage</p>
                </div>
                <div class="home_2-content-bot-item home_2-item">
                    <img src="https://trongtai.vn/wp-content/uploads/2021/11/nhay-du-tren-bien-da-nang.jpg" alt="">
                    <p>Dù lượn</p>
                </div>
            </div>
        </div>
    </div>

    <div class="home_3">
        <div class="home_3-content">
            <div class="home_3-top">
                <div class="home_3-top-left">
                    <h1><span>PHÒNG NGHỈ</span> HIỆN ĐẠI</h1>
                    <p>Dưới đây là một số phòng <b style="font-size: 1.6rem;">hot nhất</b> hiện tại</p>
                </div>
                <div class="home_3-top-right">
                    <a href="{{ route('client.rooms') }}" class="button">XEM TẤT CẢ</a>
                </div>
            </div>
            <div class="home_3-bot">
                {{-- <div class="room_2-list"> --}}
                @foreach ($rooms as $room)
                    <div class="room_2-item room">
                        <div class="room_2-item-img">
                            <img src="{{ $room->img1 }}" alt="">
                        </div>
                        <div class="room_2-item-content">
                            <h1>{{ $room->name }}</h1>
                            <div class="divider"></div>
                            <div class="room_2-item-bot">
                                <span>{{ number_format($room->price, 0, ',', '.') }}đ</span>
                                <a href="{{ route('client.room_detail', $room->id) }}" class="button">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- </div> --}}
            </div>
        </div>
    </div>

    <div class="home_4">
        <div class="home_4-top">
            <div class="home_4-top-content">
                <h1>THIÊN ĐƯỜNG NGHỈ DƯỠNG</h1>
                <div class="home_4-top-content-text">
                    <p>Quý khách sẽ được ngắm ánh bình minh và chiều hoàng hôn trên bãi biển của khu nghỉ dưỡng và tận hưởng
                        những tiện nghi sang trọng </p>
                    <p>bậc nhất tai đây. Đến với khu nghĩ dưỡng DIAMOND, quý khách sẽ được trải nghiệm dịch vụ Spa cao cấp,
                        trung tâm thể hình </p>
                    <p>hiện đại và các hoạt động giải trí trên biển.</p>
                </div>
            </div>
            <img src="{{ asset('images/home-4-img.png') }}" alt="">
        </div>
        <div class="home_4-bot">
            <div class="home_4-bot-item">
                <h1>712+</h1>
                <p>Khách mới</p>
            </div>
            <div class="home_4-bot-item">
                <h1>254+</h1>
                <p>Khách quốc tế</p>
            </div>
            <div class="home_4-bot-item">
                <h1>430+</h1>
                <p>Đánh giá 5 sao</p>
            </div>
            <div class="home_4-bot-item">
                <h1>50+</h1>
                <p>Nhân viên phục vụ</p>
            </div>
        </div>
    </div>

    <div class="home_5">
        <div class="home_5-content">
            <div class="home_5-left">
                <div class="home_5-left-title">
                    <h1><span>TIN TỨC</span> MỚI NHẤT</h1>
                </div>
                <div class="home_5-left-list">
                    @foreach ($latestNews as $item)
                        <div class="home_5-left-list-item ">
                            <a href="{{ route('client.news_detail', $item->id) }}" class="home_5-left-list-item-link">
                                <img src="{{ $item->img1 }}" alt="">
                                <div class="home_5-left-list-item-name">{{ $item->title }}</div>
                                <div class="home_5-left-list-item-date">{{ $item->created_at->format('d') }} tháng {{ $item->created_at->format('m')}}, {{ $item->created_at->format('Y') }}</div>
                                <div class="divider"></div>
                                <div class="home_5-left-list-item-content">{!! $item->content !!}</div>
                            </a>
                            <a href="{{ route('client.news_detail', $item->id) }}" class="button2 home_5-left-list-item-btn">ĐỌC THÊM</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="home_5-right">
                <div class="home_5-right-title">
                    <h1><span>SỰ KIỆN</span> NỔI BẬT</h1>
                </div>
                <div class="home_5-right-list">
                    @foreach ($skienNoiBat as $item)
                        <div class="home_5-right-list-item">
                            <a href="{{ route('client.news_detail', $item->id) }}" class="home_5-right-list-item-link">
                                <div class="home_5-right-list-item-img">
                                    <img src="{{ $item->img1 }}" alt="">
                                </div>
                                <div class="home_5-right-list-item-content">
                                    <p>{!! $item->content !!}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



    {{-- home 1 --}}
    <script>
        var slideIndex = 0;
        showSlides()

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("home_1-slide");
            var dots = document.getElementsByClassName("home_1-slide-dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1;
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].classList.remove("home_1-active");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].classList.add("home_1-active");
            setTimeout(showSlides, 3000); // Thời gian chuyển slide
        }
    </script>

    {{-- home 2 --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const home_2_items = document.querySelectorAll('.home_2-item');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('topToBot');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            });

            home_2_items.forEach(home_2_item => {
                observer.observe(home_2_item);
            });
        });
    </script>

    {{-- home 3 --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const rooms = document.querySelectorAll('.room');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('rotate');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            });

            rooms.forEach(room => {
                observer.observe(room);
            });
        });
    </script>

    {{-- home 5 --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const rooms = document.querySelectorAll('.home_5-left');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('leftToRight-2');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            });

            rooms.forEach(room => {
                observer.observe(room);
            });
        });
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const rooms = document.querySelectorAll('.home_5-right');

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('botToTop-2');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        });

        rooms.forEach(room => {
            observer.observe(room);
        });
    });
</script>

@endsection
