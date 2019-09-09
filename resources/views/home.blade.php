<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeMarch">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Page Title -->
    <title>Robot-rfx.com | Hệ thống robot giao dịch ngoại hối</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('assets/image/logo.png') }}" type="image/x-icon" />
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link id="theme" rel="stylesheet" href="{{ asset('assets/css/color/color-1.css') }}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('assets/vendor/backward/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/backward/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target=".primary-nav">

<!-- Start Site Header -->
<header class="site-header">
    <div class="header-wrap">
        <div class="container">
            <div class="site-branding">
                <!-- For Image Logo -->
                <a href="/" class="custom-logo-link">
                    <img src="{{ asset('assets/image/logo.png') }}" alt="" class="custom-logo">
                </a>
                <!-- For Site Title -->
                <!-- <span class="site-title">
                <a href="index.html">Stray</a>
                </span> -->
            </div>
            <nav class="primary-nav">
                <ul class="primary-nav-list">
                    <li class="menu-item menu"><a href="#home" class="nav-link">TRANG CHỦ</a>
                    </li>
                    <li class="menu-item"><a href="#about" class="nav-link">CHÚNG TÔI</a></li>
                    <li class="menu-item"><a href="#service" class="nav-link">ROBOT</a></li>
                    <li class="menu-item"><a href="#team" class="nav-link">ĐỘI NGŨ</a></li>
                    <li class="menu-item"><a href="#contact" class="nav-link">HỖ TRỢ</a></li>
                </ul>
            </nav>
        </div>
    </div><!-- .header-wrap -->
</header>
<!-- End Site Header -->

<!-- Start Hero Swiper Slider Section -->
<section class="hero swiper-slider-1" id="home">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slide-inner" data-swiper-parallax="45%">
                    <div class="gradient-overlay"></div>
                    <div class="swiper-bg-img"><img src="{{ asset('assets/img/hero-bg-02.jpg') }}" alt=""></div>
                    <div class="container">
                        <div class="slider-text">
                            <h1>ĐỪNG MONG ĐÍCH ĐẾN SẼ THAY ĐỔI NẾU</h1>
                            <h2> bạn không thay đổi con đường </h2>
                            @guest
                            <div class="but-group">
                                <a href="/login" class="tm-btn"><span> Đăng Nhập</span></a>
                                <a href="/register" class="tm-btn tm-btn-black"><span>Đăng ký</span></a>
                            </div>
                            @else
                            <div class="but-group">
                                <a href="/profile" class="tm-btn"><span>Hồ sơ</span></a>
                                <a href="{{ route('logout') }}" class="tm-btn" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><span>{{ __('Đăng xuất') }}</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div><!-- .swiper-slide -->

        </div><!-- .swiper-wrapper -->
        <div class="swiper-controler">
            <div class="swiper-arrow">
                <div class="swiper-arrow-left"><i class="fa fa-caret-left"></i></div>
                <div class="swiper-arrow-right"><i class="fa fa-caret-right"></i></div>
            </div>
            <!-- Pagination -->
            <div class="expanded-timeline">
                <div class="swiper-slide-count"><span></span><span></span></div>
            </div>
        </div><!-- .swiper-controler -->
    </div>
</section>
<!-- End Hero Swiper Slider Section -->

<!-- Start About Us Section -->
<section class="about-us section" id="about">
    <div class="container">
        <div class="section-head text-center">
            <h2>RFX LÀ GÌ</h2>
            <div class="section-divider">
                <div class="left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                <span></span>
                <div class="right wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
            </div>
            <p>Chương trình giao dịch ngoại hối tự động bằng phần mềm Robot, với đội ngũ những con người giỏi,
                kinh nghiệm, lương tâm và tràn đầy nhiệt huyết trong lĩnh vực công nghệ thông tin, ngoại hối (Forex) cũng như thị trường tài chính.</p>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="about-company">
                    <h3>Robot giao dịch ngoại hối</h3>
                    <p>Là phần mền được viết bởi những người có kinh nghiệm về CNTT, về thị trường CFD cũng như thị trường tài chính, tích hợp vào thiết bị giao dịch (MT4) đầu cuối của khách hàng. Với chiến lược thuận theo thị trường: Tăng mua – Giảm bán. Kết hợp nghiên cứu tất cả các thông số, chỉ số của một sàn giao dịch để loại bỏ các rủi ro cho robot.</p>

                    <a href="#price" class="tm-btn"><span>XEM THÊM</span></a>
                </div>
            </div><!-- .col -->
            <div class="col-lg-4">
                <!-- For Vimeo Video -->
                <div class="about-video js-video-button" data-video-id='63636954' data-channel="vimeo">
                    <img src="assets/img/about-video-bg.jpg" alt="">
                    <i class="video-icon icofont icofont-play-alt-3"></i>
                </div>
                <!-- For Youtube Video -->
                <!-- <div class="about-video js-video-button" data-video-id='nImFZRtGeAQ'>
                    <img src="assets/img/about-video-bg.jpg" alt="">
                    <i class="video-icon"></i>
                </div> -->
                <div class="about-slider owl-carousel">
                    <img src="assets/img/about-slider-01.jpg" alt="" class="about-single-slid">
                    <img src="assets/img/about-slider-02.jpg" alt="" class="about-single-slid">
                    <img src="assets/img/about-slider-03.jpg" alt="" class="about-single-slid">
                </div>
            </div><!-- .col -->
        </div>
    </div>
</section>
<!-- End About Us Section -->

<div class="height-100"></div>

<!-- Start Service Section -->
<section class="service-section section" id="service">
    <div class="container">
        <div class="section-head text-center">
            <h2>RFX CÓ GÌ?</h2>
            <div class="section-divider">
                <div class="left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                <span></span>
                <div class="right wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
            </div>
            <p>Chúng tôi tự hào là đơn vị hỗ trợ và cung cấp dịch vụ tốt nhất hiện nay</p>
        </div>
        <div class="services">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#one">
                        <i class="icofont icofont-architecture-alt"></i><span> SỨ MỆNH</span>
                        <div class="active-bar"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#two">
                        <i class="icofont icofont-laptop-alt"></i><span>TẦM NHÌN</span>
                        <div class="active-bar"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#three">
                        <i class="icofont icofont-idea"></i><span>GIÁ TRỊ</span>
                        <div class="active-bar"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#four">
                        <i class="icofont icofont-woman-bird"></i><span>  ỔN ĐỊNH</span>
                        <div class="active-bar"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#five">
                        <i class="icofont icofont-support"></i><span> HỖ TRỢ 24/7</span>
                        <div class="active-bar"></div>
                    </a>
                </li>
            </ul><!-- .nav-tabs -->
            <!-- Tab panes -->
            <div class="tab-content">
                <div id="one" class="container tab-pane fade">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="service-text">
                                <h3> Sứ mệnh của chúng tối là</h3>
                                <p>Giới thiệu Robot giao dịch ngoại hối đến với cộng đồng,
                                    để cùng nhau tìm kiếm thêm thu nhập từ thị trường CFD, Ngoại hối.</p>
                                <a href="#price" class="tm-btn"><span> Xem thêm</span></a>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-7">
                            <div class="service-img"><img src="assets/img/service/digital-marketing.png" alt=""></div>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .tab-pane -->
                <div id="two" class="container tab-pane fade">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="service-text">
                                <h3>Môt tập thể có tầm nhìn chiến lược</h3>
                                <p>LGiúp đỡ những người kém thế trong xã hội, nhất là những người khuyết tật có thể có thu nhập từ số vốn nhỏ nhất.
                                    Với quan điểm giao dịch CFD là một nghề như bao nghề khác.</p>
                                <a href="#price" class="tm-btn"><span>xem thêm</span></a>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-7">
                            <div class="service-img"><img src="assets/img/service/web-development.png" alt=""></div>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .tab-pane -->
                <div id="three" class="container tab-pane fade show active">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="service-text">
                                <h3>Chúng tôi cam kết</h3>
                                <p> Mang lại giá trị cao về vật chất bằng một tập thể Đạo đức trách nhiệm,
                                    minh bạch và chất lượng..</p>
                                <a href="#price" class="tm-btn"><span> Xem thêm</span></a>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-7">
                            <div class="service-img"><img src="assets/img/service/consultancy.png" alt=""></div>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .tab-pane -->
                <div id="four" class="container tab-pane fade">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="service-text">
                                <h3> Sự ổn định là điểm mạnh</h3>
                                <p> RFX  là đơn vị mang lại sự ổn định hoạt động cho các robot, đảm bảo sự hoạt động liên tục và linh hoạt .</p>
                                <a href="#price" class="tm-btn"><span>Read More</span></a>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-7">
                            <div class="service-img"><img src="assets/img/service/cloud-services.png" alt=""></div>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .tab-pane -->
                <div id="five" class="container tab-pane fade">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="service-text">
                                <h3> Hỗ trợ Nhiệt tình và trách nhiệm</h3>
                                <p> Với đội ngũ hơn 50 người chung tôi cam kết mang lại sự hài lòng tận tình hưỡng dẫn, cài đặt hoàn thiện nhất, hỗ trợ mọi thời điểm, rút tiền nhanh chóng và tiện lợi.</p>
                                <a href="#price" class="tm-btn"><span>Xem thêm</span></a>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-7">
                            <div class="service-img"><img src="assets/img/service/support-service.png" alt=""></div>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .tab-pane -->
            </div>
        </div>
    </div>
</section>
<!-- End Service Section -->

<div class="height-100"></div>

<!-- Start Team Section -->
<section class="team section" id="team">
    <div class="container">
        <div class="section-head text-center">
            <h2> ĐỘI NGŨ CHÚNG TÔI</h2>
            <div class="section-divider">
                <div class="left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                <span></span>
                <div class="right wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
            </div>
            <p>Những con người đại diện cho tập thể RFX lớn mạnh </p>
        </div>
    </div>
    <div class="member-carousel owl-carousel ex">
        <div class="member">
            <div class="member-overlay"></div>
            <div class="member-gradient"></div>
            <div class="member-img">
                <img src="assets/img/member-01.png" alt="">
            </div><!-- .member-img -->
            <div class="member-hover">
                <div class="member-meta">
                    <h3>NGUYỄN VĂN PHÚ</h3>
                    <p>CEO RFX</p>
                </div>
                <div class="member-social-btn">
                    <a href="#"><i class="fa fa-facebook-square"></i></a>
                    <a href="#"><i class="fa fa-google-plus-square"></i></a>
                    <a href="#"><i class="fa fa-twitter-square"></i></a>
                    <a href="#"><i class="fa fa-linkedin-square"></i></a>
                    <a href="#"><i class="fa fa-skype"></i></a>
                </div>
            </div>
        </div><!-- .member -->
        <div class="member">
            <div class="member-overlay"></div>
            <div class="member-gradient"></div>
            <div class="member-img">
                <img src="assets/img/member-02.png" alt="">
            </div><!-- .member-img -->
            <div class="member-hover">
                <div class="member-meta">
                    <h3>TS. TRẦN MẠNH HUY</h3>
                    <p>Tác giả robot</p>
                </div>
                <div class="member-social-btn">
                    <a href="#"><i class="fa fa-facebook-square"></i></a>
                    <a href="#"><i class="fa fa-google-plus-square"></i></a>
                    <a href="#"><i class="fa fa-twitter-square"></i></a>
                    <a href="#"><i class="fa fa-linkedin-square"></i></a>
                    <a href="#"><i class="fa fa-skype"></i></a>
                </div>
            </div>
        </div><!-- .member -->
        <div class="member">
            <div class="member-overlay"></div>
            <div class="member-gradient"></div>
            <div class="member-img">
                <img src="assets/img/member-03.png" alt="">
            </div><!-- .member-img -->
            <div class="member-hover">
                <div class="member-meta">
                    <h3>LƯU THỊ HOÀNG MAI</h3>
                    <p>Phát triển thị trường</p>
                </div>
                <div class="member-social-btn">
                    <a href="#"><i class="fa fa-facebook-square"></i></a>
                    <a href="#"><i class="fa fa-google-plus-square"></i></a>
                    <a href="#"><i class="fa fa-twitter-square"></i></a>
                    <a href="#"><i class="fa fa-linkedin-square"></i></a>
                    <a href="#"><i class="fa fa-skype"></i></a>
                </div>
            </div>
        </div><!-- .member -->


    </div>
</section>
<!-- End Team Section -->

<!-- Start Contact Form -->
<section class="contact-wrap section" id="contact">
    <div class="container">
        <div class="section-head text-center">
            <h2>LIÊN HỆ</h2>
            <div class="section-divider">
                <div class="left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
                <span></span>
                <div class="right wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
            </div>
            <p>Thông tin liên hệ hỗ trợ người dùng 24/7</p>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-info">
                    <h3 class="contact-head">THÔNG TIN LIÊN HỆ</h3>
                    <p>Chương trình giao dịch ngoại hối tự động bằng phần mềm Robot, với đội ngũ những con người giỏi,
                        kinh nghiệm, lương tâm và tràn đầy nhiệt huyết trong lĩnh vực công nghệ thông tin, ngoại hối (Forex) cũng như thị trường tài chính.</p>
                </div>
            </div><!-- .col -->
            <div class="col-lg-4">
                <div class="contact-info">
                    <h3 class="contact-head">ĐỊA CHỈ TRỤ SỞ</h3>
                    <ul>
                        <li><i class="icofont icofont-location-arrow"></i> 590/2/35 phan văn trị, p7, gò vấp, Tp Hồ Chí Minh</li>
                        <li><i class="icofont icofont-phone"></i> +84913.846.127</li>
                        <li><i class="icofont icofont-email"></i> <a href="mailto:cngovap@gmail.com">cngovap@gmail.com</a></li>
                    </ul>
                </div>
            </div><!-- .col -->
            <div class="col-lg-4">
                <div class="contact-info">
                    <h3 class="contact-head"> THÔNG TIN NGÂN  HÀNG</h3>
                    <ul>
                        <li><i class="icofont icofont-location-arrow"></i> 590/2/35 phan văn trị, p7, gò vấp, Tp Hồ Chí Minh</li>
                        <li><i class="icofont icofont-phone"></i> +84913.846.127</li>
                        <li><i class="icofont icofont-email"></i> <a href="mailto:cngovap@gmail.com">cngovap@gmail.com</a></li>
                    </ul>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        <div class="cf-msg"></div>
        <form action="assets/php/mail.php" class="row contact-form" method="post"  id="cf">
            <div class="col-lg-6">
                <div class="tm-form-field">
                    <input type="text" id="name" name="name" required>
                    <span class="bar"></span>
                    <label>TÊN ĐẦY ĐỦ</label>
                </div>
                <div class="tm-form-field">
                    <input type="text" id="email" name="email" required>
                    <span class="bar"></span>
                    <label> ĐỊA CHỈ EMAIL</label>
                </div>
                <div class="tm-form-field">
                    <input type="text" id="subject" name="subject" required>
                    <span class="bar"></span>
                    <label> HOÀN TẤT</label>
                </div>
            </div><!-- .col -->
            <div class="col-lg-6">
                <div class="tm-form-field">
                    <textarea cols="30" rows="10" id="msg" name="msg" required></textarea>
                    <span class="bar"></span>
                    <label>Nôi dung</label>
                </div>
                <button class="cont-submit btn-contact submit-btn tm-btn" type="submit" id="submit" name="submit">
                    <span> Gửi</span>
                    <i class="sp-btn"></i>
                </button>
            </div><!-- .col -->
        </form><!-- .row -->
    </div>
</section>
<!-- End Contact Form -->

<!-- Start Site Footer -->
<footer class="site-footer">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="footer-widget">
                        <div class="footer-about-widget">
                            <img src="assets/img/logo.png" alt="">
                            <p>Cảnh Báo Chung về Rủi Ro:
                                CFD là sản phẩm có đòn bẩy. Giao dịch CFD có mức rủi ro cao do đó có thể không thích hợp đối với tất cả các nhà đầu tư. </p>
                        </div>
                    </div><!-- .footer-widget -->
                </div><!-- .col -->

                <div class="col-md-4">
                    <div class="footer-widget">
                        <h2 class="footer-widget-title"> Mạng xã Hội </h2>
                        <div class="instagram-widget">
                            <a href=""><img src="assets/img/instagram-img-01.jpg" alt=""></a>
                            <a href=""><img src="assets/img/instagram-img-02.jpg" alt=""></a>
                            <a href=""><img src="assets/img/instagram-img-03.jpg" alt=""></a>
                            <a href=""><img src="assets/img/instagram-img-04.jpg" alt=""></a>
                            <a href=""><img src="assets/img/instagram-img-05.jpg" alt=""></a>
                            <a href=""><img src="assets/img/instagram-img-06.jpg" alt=""></a>
                        </div>
                    </div><!-- .footer-widget -->
                </div><!-- .col -->
            </div>
        </div>
    </div>
    <div class="bottom-footer text-center">
        <div class="container">
            <div class="copy-right">Copyright © 2019 Robot-rfx.com. All Rights Reserved. Designed by TĐQ</div>
        </div>
    </div>
</footer>
<!-- End Site Footer -->


<!-- Scripts -->
<script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBgwgIuDRkO7HlxvpWN-vPePnGVWss5r5g"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>