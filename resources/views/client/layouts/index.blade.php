<!DOCTYPE html>
<html lang="en">

<head>
    <title>TÀI CHÍNH & ĐẦU TƯ FINTOP</title>
    <meta charset="utf-8">
    <base href="{{ asset('') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../clients/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Load Require CSS -->
    {{-- @yield('css') --}}
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link href="../clients/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font CSS -->
    <link href="../clients/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="../clients/css/templatemo.css">

    <!-- <link rel="stylesheet" href="assets/css/templatemo.css"> -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../clients/css/custom.css">
</head>

<body>
<div class="header-one">
    <div class="date-header">
             Thứ năm, 04/05/2023 02:18:26
    </div>
    <div class="marquee-header">
        <marquee style="padding-top:10px;color:white">
            <span>
            Chúng ta có thể gặp nhiều thất bại nhưng chúng ta không được bị đánh bại – Maya Angelou.
            </span> 
            <span style="padding-left:200px">
            Chúng ta có thể gặp nhiều thất bại nhưng chúng ta không được bị đánh bại – Maya Angelou.1
            </span> 
            <span style="padding-left:200px">
            Chúng ta có thể gặp nhiều thất bại nhưng chúng ta không được bị đánh bại – Maya Angelou.2
            </span> 
            <span style="padding-left:200px">
            Chúng ta có thể gặp nhiều thất bại nhưng chúng ta không được bị đánh bại – Maya Angelou.3
            </span> 
        </marquee>
    </div>
    <div class="user-login-header">
        <!-- <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex" id="navbar-toggler-success"> -->
            <ul class="navbar-nav">
                        <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"style="color:white">{{ __('Đăng nhập') }}</a>
                        </li> 
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"style="color:white">{{ __('Đăng ký') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <span id="navbarDropdown" class="dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img  src="{{url('/file-image/avatar/')}}/{{ Auth::user()->avatar }}" alt="Image" style="border-radius:50%;height: 30px;width: 30px;object-fit: cover;">
                            <span style="color:white">
                            <!-- user -->
                            {{ Auth::user()->name }}
                            </span>
                        </span>
                        <div  class="dropdown-menu dropdown-menu-end"  aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ URL::asset('/system/userInfo/index') }}">
                                    <p>
                                        {{ __('Thông tin cá nhân') }}
                                    </p>
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <p>
                                        {{ __('Đăng xuất') }}
                                    </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
                <!-- Right Side Of Navbar -->
            
            <!-- <div class="navbar align-self-center d-flex"> 
                <a href="#" style="color:#ffcf48"><i class='bx bx-bell bx-sm bx-tada-hover'></i></a>
                </div> -->
        <!-- </div> -->
    </div>
</div>

<nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" style="width: 25%;">
                <!-- <span class="text-dark h4">Purple</span> <span class="text-primary h4">Buzz</span> -->
                <!-- <img src="../" class="navbar-brand-img h-100" alt="main_logo"> -->
                <img class="card-img " src="../clients/img/LogoFinTop_red.png" alt="Card image">
            </a>
            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex mt-3" id="navbar-toggler-success" style="color:white">     
               <h1 style="font-family: auto;color:#ff000091;font-weight: 600;">Tài chính & Đầu tư</h1>          
            </div>
            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex mt-3" id="navbar-toggler-success" style="color:white">                
               <form action="#" method="get">
                    <div class="input-group py-3">
                        <input name="email" type="text" class="form-control rounded-end" placeholder="Tìm kiếm..." aria-label="Tìm kiếm" style="width:350px">
                        <button class="btn text-white btn-lg rounded-start px-lg-4" type="submit" style="background:#22314b"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            
               
        </div>
    </nav>
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow" style="background:#03233e!important"> 
        
        <div class="container d-flex justify-content-between align-items-center">
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex mt-3" id="navbar-toggler-success" style="padding-left:0%">
                <div class=" mx-xl-5 mb-2" style="background: rgba(255, 255, 255, 0.1);border-radius: 50px;">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                        <li class="nav-item ">
                            <a class="nav-link  rounded-pill px-3 " style="color:white" href="index.html">TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill px-3" style="color:white" href="about.html">CHỨNG KHOÁN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill px-3" style="color:white" href="about.html">TÀI CHÍNH</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill px-3" style="color:white" href="about.html">BẤT ĐỘNG SẢN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill px-3" style="color:white" href="about.html">THỊ TRƯỜNG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill px-3" style="color:white" href="about.html">THẾ GIỚI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill px-3" style="color:white" href="work.html">BÀI VIẾT</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link rounded-pill px-3 dropdown-toggle " style="color:white" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>DỊCH VỤ</a>
                            <div  class="dropdown-menu dropdown-menu-end"  aria-labelledby="navbarDropdown" style="background:#c8d9ffd6">
                                <a class="dropdown-item" href="{{ URL::asset('/system/userInfo/index') }}">
                                        <p>
                                            Cẩm nang NĐT
                                        </p>
                                </a>
                                <a class="dropdown-item" href="{{ URL::asset('/system/userInfo/index') }}">
                                        <p>
                                            Dịch vụ mua bán
                                        </p>
                                </a>
                                <a class="dropdown-item" href="{{ URL::asset('/system/userInfo/index') }}">
                                        <p>
                                            Dịch vụ tư vấn
                                        </p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill px-3" style="color:white" href="contact.html">HỖ TRỢ</a>
                        </li>
                    </ul>
                </div>
            </div>
               
        </div>
    </nav>
 
    <div class="menul_small">
            <div class="text-center">
                <span class="menu-center">
                    <a>CHỈ SỐ</a>
                </span>
                <span class="menu-center">
                    <a>THỊ TRƯỜNG</a>
                </span>
                <span class="menu-center">
                    <a>BÀI VIẾT</a>
                </span>
                <span class="menu-center">
                    <a>DỊCH VỤ</a>
                </span>
                <span class="menu-center">
                    <a>HỖ TRỢ</a>
                 </span>
                <span class="menu-center">
                    <a>LIÊN HỆ</a>
                </span>
            </div>
    </div>


    
    <!-- body -->
    @yield('body-client')




     <!-- Start Footer -->
 <footer class="bg-secondary pt-4">
        <div class="container">
            <div class="row py-4">

                <div class="col-lg-3 col-12 align-left">
                    <a class="navbar-brand" href="index.html">
                        <i class='bx bx-buildings bx-sm text-light'></i>
                        <span class="text-light h5">Purple</span> <span class="text-light h5 semi-bold-600">Buzz</span>
                    </a>
                    <p class="text-light my-lg-4 my-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut.
                    </p>
                    <ul class="list-inline footer-icons light-300">
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="http://facebook.com/">
                                <i class='bx bxl-facebook-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.linkedin.com/">
                                <i class='bx bxl-linkedin-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.whatsapp.com/">
                                <i class='bx bxl-whatsapp-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.flickr.com/">
                                <i class='bx bxl-flickr-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.medium.com/">
                                <i class='bx bxl-medium-square bx-md' ></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h3 class="h4 pb-lg-3 text-light light-300">Our Company</h2>
                        <ul class="list-unstyled text-light light-300">
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light" href="index.html">Home</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="about.html">About Us</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="work.html">Work</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i></i><a class="text-decoration-none text-light py-1" href="pricing.html">Price</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="contact.html">Contact</a>
                            </li>
                        </ul>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h2 class="h4 pb-lg-3 text-light light-300">Our Works</h2>
                    <ul class="list-unstyled text-light light-300">
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="#">Branding</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="#">Business</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="#">Marketing</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="#">Social Media</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="#">Digital Solution</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="#">Graphic</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h2 class="h4 pb-lg-3 text-light light-300">For Client</h2>
                    <ul class="list-unstyled text-light light-300">
                        <li class="pb-2">
                            <i class='bx-fw bx bx-phone bx-xs'></i><a class="text-decoration-none text-light py-1" href="tel:010-020-0340">010-020-0340</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bx-mail-send bx-xs'></i><a class="text-decoration-none text-light py-1" href="mailto:info@company.com">info@company.com</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>
    <!-- End Footer -->


    <!-- Bootstrap -->
    <script src="../clients/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery require for isotope -->
    <script src="../clients/js/jquery.min.js"></script>
    <!-- Isotope -->
    <script src="../clients/js/isotope.pkgd.js"></script>
    <!-- Page Script -->
    <script>
        $(window).load(function() {
            // init Isotope
            var $projects = $('.projects').isotope({
                itemSelector: '.project',
                layoutMode: 'fitRows'
            });
            $(".filter-btn").click(function() {
                var data_filter = $(this).attr("data-filter");
                $projects.isotope({
                    filter: data_filter
                });
                $(".filter-btn").removeClass("active");
                $(".filter-btn").removeClass("shadow");
                $(this).addClass("active");
                $(this).addClass("shadow");
                return false;
            });
        });
    </script>
    <!-- Templatemo -->
    <script src="../clients/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../clients/js/custom.js"></script>

</body>

</html>

