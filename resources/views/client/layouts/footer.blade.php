<footer>
    <div class="footer_top">
        <div class="footer_top_container">
            <div class="footer_top_left">
                <a href="{{ route('client.index') }}" class="logo">
                    DIAMOND Resorts
                </a>
                <p>
                    Đến với Khu nghỉ dưỡng Diamond, quý khách sẽ được trải nghiệm dịch vụ Spa cao cấp, trung tâm thể
                    hình
                    hiện đại và các hoạt động giải trí trên biển.
                </p>
                <div class="footer_top_left_icon">
                    <a href="" class="FB">
                        <i class="fa-brands fa-facebook-f"></i>
                        <p class="FB_placehoder">Follow on Facebook</p>
                    </a>
                    <a href="" class="insta">
                        <i class="fa-brands fa-instagram"></i>
                        <p class="insta_placehoder">Follow on Instagram</p>
                    </a>
                    <a href="" class="pinterest">
                        <i class="fa-brands fa-pinterest"></i>
                        <p class="pinterest_placehoder">Follow on Pinterest</p>
                    </a>
                    <a href="" class="twiter">
                        <i class="fa-brands fa-twitter"></i>
                        <p class="twiter_placehoder">Follow on Twiter</p>
                    </a>
                </div>
            </div>
            <div class="footer_top_contact">
                <h2>LIÊN HỆ</h2>
                <ul>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Hà Nội</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-square-phone"></i>
                        <span>0376365516</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope-open-text"></i>
                        <span>phucvanle472002@gmail.com</span>
                    </li>
                    <li>
                        <i class="fa-brands fa-square-instagram"></i>
                        <span>phucvanle.02</span>
                    </li>
                </ul>
            </div>
            <div class="footer_top_link">
                <h2>LIÊN KẾT</h2>
                <div class="footer_top_link_container">
                    <a href="{{ route('client.index') }}">Trang chủ</a>
                    <a href="{{ route('client.introduce') }}">Giới thiệu</a>
                    <a href="{{ route('client.rooms') }}">Phòng</a>
                    <a href="{{ route('client.news') }}">Tin tức</a>
                    <a href="{{ route('client.contact') }}">Liên hệ</a>
                </div>
            </div>

            <div class="footer_top_right">
                <h2>HÌNH ẢNH</h2>
                <div class="footer_top_right_img">
                    <img src="{{ asset('images/footer-img-1.jpg') }}" alt="">
                    <img src="{{ asset('images/footer-img-2.jpg') }}" alt="">
                    <img src="{{ asset('images/footer-img-3.jpg') }}" alt="">
                    <img src="{{ asset('images/footer-img-4.jpg') }}" alt="">
                    <img src="{{ asset('images/footer-img-5.jpg') }}" alt="">
                    <img src="{{ asset('images/footer-img-6.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="footer_bot">
        <i class="fa-regular fa-heart"></i>
        Designer by
        <a href="https://www.facebook.com/vanphuc.4702">Phúc Văn Lê </a>
        <i class="fa-regular fa-heart"></i>
    </div>
</footer>

