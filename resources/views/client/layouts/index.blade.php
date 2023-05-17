<!DOCTYPE html>
<html lang="en">

<head>
    <title>TÀI CHÍNH & ĐẦU TƯ FINTOP</title>
    <meta charset="utf-8">
    <base href="{{ asset('') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../clients/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../clients/img/LogoFinTop_red.png">
    <!-- Load Require CSS -->
    {{-- @yield('css') --}}
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link href="../clients/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::asset('assets\js\NclLibrary.js') }}"></script>
    <!-- Font CSS -->
    <link href="../clients/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="../clients/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../clients/css/custom.css">
    <script src="https://unpkg.com/lightweight-charts@3.4.0/dist/lightweight-charts.standalone.production.js"></script>
    
</head>
<style>
    body{
        background-image: url("../clients/img/image_nui.jpeg");
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        background-position: 40% -200px;
        background-attachment: fixed;
    }
    .bgs{
        /* background-image: url("../clients/img/background2.jpg") !important; */
        width:100%;
        background:#700e13;

          /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .bgft{
        /* background-image: url("../clients/img/sequel-background-1.png") !important; */
        width:100%;
          /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<body>
    <div class="header-one " >
        <div class="container header-one">
        <div class="date-header">
              <span id="time"></span>
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
                <ul class="navbar-nav pt-1">
                            <!-- Authentication Links -->
                    @guest
                    <div style="display:flex">
                            <div>
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}"style="color:white">{{ __('Đăng nhập') }}</a>
                                    </li> 
                                @endif
                        </div>
                        <div style="padding-left:10px">
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}"style="color:white">{{ __('Đăng ký') }}</a>
                                    </li>
                                @endif
                        </div>
                    </div>
                    @else
                        <li class="nav-item dropdown">
                            <span id="navbarDropdown" class="dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img  src="{{url('/file-image/avatar/')}}/{{ Auth::user()->avatar }}" alt="Image" style="border-radius:50%;height: 30px;width: 30px;object-fit: cover;">
                                <span style="color:white">
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
    </div>
    <!-- bg-white -->
    <div class="bgs">
        <nav id="main_nav" class="navbar navbar-expand-lg navbar-light shadow">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand h1" style="width: 12%;margin-left:10%">
                    <!-- <span class="text-dark h4">Purple</span> <span class="text-primary h4">Buzz</span> -->
                    <!-- <img src="../" class="navbar-brand-img h-100" alt="main_logo"> -->
                    <img class="card-img " style="height:70%" src="../clients/img/LogoFinTop_red.png" alt="Card image">
                </a>
                
                <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex mt-3" id="navbar-toggler-success" style="color:white:margin:auto">     
                     <h1 style="font-family: auto;font-weight: 600; animation: lights 5s 750ms linear infinite;font-size: 70px;margin-left:10%">Tài chính & Đầu tư</h1>          
                </div>
                <!-- <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex mt-3" id="navbar-toggler-success" style="color:white">                 -->
                <!-- <form action="#" method="get">
                        <div class="input-group pt-4">
                            <input name="email" type="text" class="form-control" placeholder="Tìm kiếm..." aria-label="Tìm kiếm" style="width:350px;border-radius:50px">
                            <button class="btn text-white btn-lg rounded-start px-lg-4" type="submit" style="background:#22314b"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div> -->
                
                
            </div>
        </nav>
       
       
    </div>
    <nav id="main_nav" class=" navbar-expand-lg navbar-light shadow" style="background:#0000008a"> 
        <div class="container d-flex justify-content-between align-items-center">
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <div class="align-self-center collapse navbar-collapse flex-fill text-center  d-lg-flex mt-3 align-items-center" id="navbar-toggler-success"> -->
                <div class="" style="border-radius: 50px;margin:auto">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                        <li class="nav-item ">
                            <a class="nav-link link-home   px-3 " style="color:white" href="{{ URL::asset('/client/home/index') }}"><i class="fa-solid fa-house-chimney"></i><i class="fas fa-home"></i> TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" style="color:white" href="about.html"><i class="fas fa-globe-asia"></i> GIỚI THIỆU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" style="color:white" href="work.html"><i class="far fa-newspaper"></i> ĐẶC QUYỀN HỘI VIÊN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-datafinancial  px-3" style="color:white" href="{{ URL::asset('/client/dataFinancial/index') }}"><i class="fas fa-coins"></i> DỮ LIỆU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" style="color:white" href="about.html"><i class="fas fa-hand-holding-usd"></i> PHÂN TÍCH</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" style="color:white" href="about.html"><i class="fas fa-book-medical"></i> THƯ VIỆN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill px-3" style="color:white" href="work.html"><i class="far fa-question-circle"></i> HƯỚNG DẪN</a>
                        </li>
                    </ul>
                </div>
            <!-- </div> -->
        </div>
    </nav>
    @yield('body-client')
    <!-- Start Footer -->
    <footer class="bgft pt-4" style="background:#121d29bf">
        <div class="container" >
            <div class="row py-4">
                <div style="pamadding-left:2%">
                    <h2 class="h4 text-light light-300"><img class="card-img " src="../clients/img/LogoFinTop_red.png" alt="Card image" style="width:4%;"> 
                     <span style="color:#ff0000d1"><b style="font-family: auto;color:#ff000091;font-weight: 600;animation: lights 10s 750ms linear infinite;">Công ty TNHH Đầu tư & Phát triển FinTop</b></span> 
                </div>
            </h2>

                <div class="col-lg-5 col-md-4 my-sm-0 mt-2"style="padding-top:20px;padding-left:5%">
                    <a class="navbar-brand" href="index.html">
                        <h3 class="h5 text-light light-300"><i class="fas fa-address-book"></i> Liên hệ</h3>
                    </a>
                    <!-- <p class="text-light my-lg-4 my-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut.
                    </p> -->
                    <ul class="list-unstyled text-light light-300" style="padding-left:10px;">
                        <li class="pb-2">
                        <i class="fas fa-phone-volume"></i><a class="text-decoration-none pt-2 text-light py-1" href="tel:086.234.8886"> 086.234.8886</a>
                        </li>
                        <li class="pb-2">
                            <i class="fas fa-envelope"></i><a class="text-decoration-none pt-2 text-light py-1" href="mailto:FinTop.DVKH@gmail.com"> FinTop.DVKH@gmail.com</a>
                        </li>
                        <li class="pb-2">
                            <i class="fas fa-laptop-house"></i><a class="text-decoration-none pt-2 text-light py-1" href="mailto:FinTop.DVKH@gmail.com"> Trụ sở Hà Nội: 121/26 Thái Hà, P. Trung Liệt, Q. Đống Đa, Hà Nội</a>
                        </li>
                        <li class="pb-2">
                        <i class="fas fa-house-user"></i><a class="text-decoration-none pt-2 text-light py-1" href="mailto:FinTop.DVKH@gmail.com"> Văn phòng HCM:  383 Võ Văn Tần, P. 5, Q. 3, TP. Hồ Chí Minh</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 my-sm-0 mt-2"style="padding-top:20px;padding-left:5%">
                    <a class="navbar-brand" href="index.html">
                        <h2 class="h5 text-light light-300"><i class="fas fa-handshake"></i> Đồng hành</h2>
                    </a>
                    <ul class="list-unstyled text-light light-300" style="padding-left:10px;">
                        <li class="pb-2">
                        <i class="fab fa-facebook-f"></i><a class="text-decoration-none pt-2 text-light py-1" href="tel:086.234.8886"> Dữ liệu chứng khoán FinTop.Data</a>
                        </li>
                        <li class="pb-2">
                            <i class="fab fa-youtube"></i><a class="text-decoration-none pt-2 text-light py-1" href="https://www.youtube.com/@taichinhdautufintop"> Tài chính & Đầu tư FinTop</a>
                        </li>
                        <li class="pb-2">
                            <i class="fas fa-hand-point-right"></i><a class="text-decoration-none pt-2 text-light py-1" href="https://www.youtube.com/@taichinhdautufintop"> Tham gia cộng đồng FinTop </a>
                        </li>
                    </ul>
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
                <div class="col-lg-3 col-md-4 my-sm-0 mt-2"style="padding-top:20px;padding-left:5%">
                    <h2 class="h5 pb-lg-3 text-light light-300"><i class="fas fa-cloud-download-alt"></i> Tải App</h2>
                    <ul class="list-unstyled text-light light-300" style="padding-left:10px;">
                        
                        <li class="pb-2">
                            <i class="fab fa-app-store-ios"></i><a class="text-decoration-none text-light py-1" href="tel:086.234.8886"> App Store </a>
                        </li>
                        <li class="pb-2">
                        <i class="fab fa-google-play"></i><a class="text-decoration-none text-light py-1" href="mailto:info@company.com"> Google Play</a>
                        </li>
                        <li class="pb-2">
                        <i class="fas fa-qrcode"></i><a class="text-decoration-none text-light py-1" href="mailto:info@company.com"> QR ví momo</a>
                        </li>
                        <li class="pb-2" style="padding-left:20px;">
                            <a class="text-decoration-none text-light py-1" href="tel:086.234.8886"> <img class="card-img " src="../clients/img/qrluatnc.jpg" alt="Card image" style="width:30%">  </a>
                        </li>
                    </ul>
                </div>
                <div class="w-100 py-1" style="background: #fcfcfc0f;">
                    <div class="container">
                        <div class="row pt-2">
                            <div class="col-lg-6 col-sm-12">
                                <p class="text-lg-start text-center text-light light-300">
                                Bản quyền @2023 , Công ty TNHH Đầu tư & Phát triển FinTop
                                </p>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <p class="text-lg-end text-center text-light light-300">
                                    Phát triển bởi <a rel="sponsored" class="text-decoration-none text-light" href="https://templatemo.com/" target="_blank"><strong>nguyencongluat092001@gmail.com</strong></a>
                                </p>
                            </div>
                        </div>
                    </div>
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
    <script type="text/javascript" charset="utf-8">
        let a;
        let time;
        var date = new Date().toLocaleDateString()
        var dayvn = new Date();
        // Lấy số thứ tự của ngày hiện tại
        var current_day = dayvn.getDay();
        // Biến lưu tên của thứ
        var day_name = '';
 
        // Lấy tên thứ của ngày hiện tại
        switch (current_day) {
        case 0:
            day_name = "Chủ nhật";
            break;
        case 1:
            day_name = "Thứ hai";
            break;
        case 2:
            day_name = "Thứ ba";
            break;
        case 3:
            day_name = "Thứ tư";
            break;
        case 4:
            day_name = "Thứ năm";
            break;
        case 5:
            day_name = "Thứ sau";
            break;
        case 6:
            day_name = "Thứ bảy";
        }
        setInterval(() => {
        a = new Date();
        time = day_name + ', ngày ' +date + ' '+ a.getHours() + ':' + a.getMinutes() + ':' + a.getSeconds();
        document.getElementById('time').innerHTML = time;
        }, 1000);
    </script>
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css"/>
    <script src="../assets/js/sweetalert2.min.js"></script>
    <!-- Templatemo -->
    <script src="../clients/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../clients/js/custom.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
</body>
</html>

