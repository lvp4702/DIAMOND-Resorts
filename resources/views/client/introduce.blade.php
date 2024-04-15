@extends('client.layouts.app')

@section('title', 'Giới thiệu')

@section('content')
    <div class="introduce_1">
        <img src="{{ asset('images/introduce-1.jpg') }}" alt="">
        <h1>GIỚI THIỆU</h1>
    </div>

    <div class="introduce_2">
        <div class="introduce_2-container">
            <div class="introduce_2-img intro-img">
                <img src="{{ asset('images/introduce-2.jpg') }}" alt="">
            </div>
            <div class="introduce_2-content intro-content">
                <h1>GIỚI THIỆU <span>DIAMOND RESORT</span></h1>
                <p>Bắt đầu hoạt động từ tháng 5 năm 2004, Diamond Resort, Hà Nội tạo nên sự khác biệt trên nhiều
                    phương diện. Đây là khu nghĩ dưỡng duy nhất tại Việt Nam cung cấp chương trình “Tất cả trong một", Tiệc
                    phô
                    mai và rượu đãi khách miễn phí, Các bài hát vui tươi, sôi động do hai ban nhạc của khu nghỉ dưỡng trình
                    bày
                    và chương trình Dạo bộ Làng Chài và Chợ Mũi Né hàng ngày. Khác với các khu nghỉ dưỡng khác dọc theo bờ
                    biển
                    Phan Thiết, Diamond Resort đủ điều kiện để giúp bạn tận hưởng những phút giây thư giãn thoải mái, lấy
                    lại
                    năng lượng sau khoảng thời gian làm việc vất vả.
                </p>
                <p>
                    Diamond Resort là một bức tranh hoàn mỹ của nghệ thuật kiến trúc và xây dựng. Ngay cạnh bãi biển là hồ
                    bơi rộng lớn, được bao bọc bởi hàng dừa xanh mượt. Xung quanh các ngôi nhà, biệt thự là khu vườn nhiệt
                    đới
                    với nhiều loài thảo mộc đặc trưng của khu vực. Văn hóa cổ Champa cũng được thể hiện trong hầu hết các
                    kiến
                    trúc xây dựng nơi đây, từ các ngôi nhà cho đến khu vực tiền sảnh. Khách check in sẽ được thưởng thức âm
                    nhạc
                    Champa độc đáo do chính ban nhạc Champa địa phương trình diễn.
                </p>
                <p>
                    Bạn sẽ dễ dàng cảm nhận được sự hiếu khách, nụ cười than thiện cũng như cung cách phục vụ chuyên nghiệp
                    của
                    các nhân viên nơi đây.
                </p>
                <br>
                <a href="{{ route('client.contact') }}" class="button2">LIÊN HỆ</a>
            </div>
        </div>
    </div>

    <div class="introduce_3">
        <h1><span>DỊCH VỤ </span>CHÍNH</h1>
        <div class="introduce_3-content">
            <div class="introduce_3-list intro-content">
                <div class="introduce_3-list-item">
                    <i class="fa-solid fa-caret-right"></i>
                    <span>Miễn phí Wifi</span>
                </div>
                <div class="introduce_3-list-item">
                    <i class="fa-solid fa-caret-right"></i>
                    <span>Spa & Massage</span>
                </div>
                <div class="introduce_3-list-item">
                    <i class="fa-solid fa-caret-right"></i>
                    <span>Nhà hàng</span>
                </div>
                <div class="introduce_3-list-item">
                    <i class="fa-solid fa-caret-right"></i>
                    <span>Bar & Gym</span>
                </div>
                <div class="introduce_3-list-item">
                    <i class="fa-solid fa-caret-right"></i>
                    <span>Hồ bơi ngoài trời</span>
                </div>
                <div class="introduce_3-list-item">
                    <i class="fa-solid fa-caret-right"></i>
                    <span>Thuê xe hơi</span>
                </div>
            </div>
            <div class="introduce_3-content-img intro-img">
                <div class="introduce_3-img fade">
                    <img src="{{ asset('images/introduce-3.jpg') }}" alt="">
                </div>
                <div class="introduce_3-img fade">
                    <img src="{{ asset('images/introduce-2.jpg') }}" alt="">
                </div>
                <div class="introduce_3-img fade">
                    <img src="{{ asset('images/introduce-1.jpg') }}" alt="">
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
    </div>

    <div class="introduce_4">
        <div class="introduce_4-container">
            <div class="introduce_4-slide fade">
                <div class="introduce_4-image">
                    <img src="{{ asset('images/introduce_4.1.jpg') }}" alt="">
                </div>
                <div class="introduce_4-text">
                    <i class="fa-regular fa-comment"></i>
                    <p>
                        Bạn sẽ dễ dàng cảm nhận được sự hiểu khách, nụ cười than thiện cũng như cung cách phục vụ chuyên
                        nghiệp của các nhân viên nơi đây. Bạn sẽ dễ dàng cảm nhận được sự hiếu khách, nụ cười than thiện
                        cũng như cung cách phục vụ chuyên nghiệp của các nhân viên nơi đây.
                    </p>
                    <h2>Khách hàng</h2>
                </div>
            </div>
            <div class="introduce_4-slide fade">
                <div class="introduce_4-image">
                    <img src="{{ asset('images/introduce_4.2.jpg') }}" alt="">
                </div>
                <div class="introduce_4-text">
                    <i class="fa-regular fa-comment"></i>
                    <p>
                        Bạn sẽ dễ dàng cảm nhận được sự hiểu khách, nụ cười than thiện cũng như cung cách phục vụ chuyên
                        nghiệp của các nhân viên nơi đây. Bạn sẽ dễ dàng cảm nhận được sự hiếu khách, nụ cười than thiện
                        cũng như cung cách phục vụ chuyên nghiệp của các nhân viên nơi đây.
                    </p>
                    <h2>Khách hàng</h2>
                </div>
            </div>
            <div class="introduce_4-slide fade">
                <div class="introduce_4-image">
                    <img src="{{ asset('images/introduce_4.3.jpg') }}" alt="">
                </div>
                <div class="introduce_4-text">
                    <i class="fa-regular fa-comment"></i>
                    <p>
                        Bạn sẽ dễ dàng cảm nhận được sự hiểu khách, nụ cười than thiện cũng như cung cách phục vụ chuyên
                        nghiệp của các nhân viên nơi đây. Bạn sẽ dễ dàng cảm nhận được sự hiếu khách, nụ cười than thiện
                        cũng như cung cách phục vụ chuyên nghiệp của các nhân viên nơi đây.
                    </p>
                    <h2>Khách hàng</h2>
                </div>
            </div>
            <div class="introduce_4-dot-list">
                <span class="introduce_4-dot"></span>
                <span class="introduce_4-dot"></span>
                <span class="introduce_4-dot"></span>
            </div>
        </div>
    </div>
    <script>
        var slideIndex = 0;
        showSlides();
        showSlides2();

        function showSlides() {
            var slides = document.getElementsByClassName("introduce_4-slide");
            var dots = document.getElementsByClassName("introduce_4-dot");
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" introduce_4-active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " introduce_4-active";
            setTimeout(showSlides, 4000);
        }

        function plusSlides(n) {
            showSlides2(slideIndex += n);
        }

        function showSlides2() {
            var i;
            var slides = document.getElementsByClassName("introduce_3-img");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            // setTimeout(showSlides2, 3000); // Thời gian chuyển slide
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const intro_imgs = document.querySelectorAll('.intro-img');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('bigToSmall');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            });

            intro_imgs.forEach(intro_img => {
                observer.observe(intro_img);
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const intro_content = document.querySelectorAll('.intro-content');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('smallToBig');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            });

            intro_content.forEach(intro_content => {
                observer.observe(intro_content);
            });
        });
    </script>
@endsection
