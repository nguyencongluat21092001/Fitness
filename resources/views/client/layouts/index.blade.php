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
    <!-- Font CSS -->
    <link href="../clients/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="../clients/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../clients/css/custom.css">
    <link rel="stylesheet" href="../assets/chosen/chosen.min.css">
    <script src="https://unpkg.com/lightweight-charts@3.4.0/dist/lightweight-charts.standalone.production.js"></script>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
</head>
<style>
    b,span,strong{
        font-size:14px;
    }
    body{
        background-image: url("../clients/img/bgctys.jpg");
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
        background:#731b1bde !important;
          /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    #menuClient{
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
    }
    .menuClient{
        display: none;
    }
    @media (min-width: 992px){
        #menuClient{
            display: block;
        }
        .header-logo{
            margin-left:10%;
        }
        #navbar-toggler-success{
            display: block;
        }
    }
    .navbar-toggler.border-0:focus{
        outline: none;
        box-shadow: none;
    }
</style>
<script src="../clients/js/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('assets\js\NclLibrary.js') }}"></script>

<script type="text/javascript">
        $('.button').click(function() {
            $('.menu .items span').toggleClass('active');
            $('.menu .button').toggleClass('active');
        });

        $(document).ready(function() {
            // $('#textbox1').val(this.checked);
            $('#checkbox1').change(function() {
                if (this.checked) {
                    $('#pDetails').removeClass("hidden");
                    $('#pDetails').addClass("transform");
                } else {
                    $('#pDetails').removeClass("transform");
                    $('#pDetails').addClass("hidden");
                }

            });
        });
    </script>
<body style="position: relative;">
    <div class="header-one ">
        <div class="container header-one">
        <div class="date-header">
              <span id="time"></span>
        </div>
        <div class="marquee-header">
            <marquee style="color:white">
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
                    <div style="display:flex;">
                            <div>
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}"style="color:white;padding:0px"><span>{{ __('Đăng nhập') }}</span> </a>
                                    </li> 
                                @endif
                        </div>
                        <div style="padding-left:10px">
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}"style="color:white;padding:0px"><span>{{ __('Đăng ký') }}</span> </a>
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
                                {{ isset($_SESSION['name'])?$_SESSION['name']:'' }}
                                </span>
                            </span>
                            <div  class="dropdown-menu dropdown-menu-end"  aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ URL::asset('/client/infor/index') }}">
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
        <nav id="main_nav" class="navbar navbar-expand-lg  shadow" style="padding:0px !important">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand h1 header-logo" style="width: 7%;">
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon text-white"><i class="fa fa-bars"></i></span>
                    </button>
                    <!-- <span class="text-dark h4">Purple</span> <span class="text-primary h4">Buzz</span> -->
                    <!-- <img src="../" class="navbar-brand-img h-100" alt="main_logo"> -->
                    <img class="card-img " src="../clients/img/LogoFinTop_red.png" alt="Card image">
                </a>
                
                <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex mt-3" id="navbar-toggler-success" style="color:white;margin:auto">     
                     <!-- <h1 style="font-family: auto;font-weight: 600; animation: lights 5s 750ms linear infinite;font-size: 70px;margin-left:10%">Tài Chính & Đầu Tư</h1>           -->
                     <h1 style="font-family: auto;font-weight: 500;color:#fff079;font-size: 65px;margin-left:12%">Tài Chính & Đầu Tư</h1>          

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
    <nav id="menuClient" class=" navbar-expand-lg  shadow" style="background:#0000008a"> 
        <div class="container d-flex justify-content-between align-items-center">
            <div class="align-self-center collapse navbar-collapse flex-fill text-center  d-lg-flex align-items-center" id="navbar-toggler-success">
                @include('client.layouts.menu')
            </div>
        </div>
    </nav>
    @yield('body-client')
    {{-- chat --}}
    @if(auth::check())
    @include('client.layouts.chat')
    @endif
    {{-- end-chat --}}
    <!-- Start Footer -->
    @include('client.layouts.footer')
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
    <script type="text/jscript" src="../assets/chosen/chosen.min.js"></script>
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css"/>
    <script src="../assets/js/sweetalert2.min.js"></script>
    <!-- Templatemo -->
    <script src="../clients/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../clients/js/custom.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script type="text/javascript">
        var pusher = new Pusher("{{ env('PUSHER_APP_KEY', '0141c9557203d59309b9') }}", {
            encrypted: true,
            cluster: "ap1"
        });
        var channel = pusher.subscribe('NotificationEvent');
        channel.bind('send-message', function(data) {
            console.log(data);
            var newNotificationHtml = `<div class="card-body">
            <div class="d-flex flex-row justify-content-start mb-4 avatarMessage">
            <img src="https://vcdn.subiz-cdn.com/widget-v4/public/assets/img/default_avatar.5b74dc1.png" alt="avatar 1" style="width: 30px; height: 100%;">
            <div style="padding-left:5px">
            <div class="p-3 ms-3" style="border-radius: 15px; background-color: #e1ebe6;width:100%">
            <p style="font-size:14px;font-family:auto" class="small mb-0"></p>
            <h5>${data.title}</h5>
            <span>Giá mua: ${data.price_buy}</span><br>
            <span>Mục tiêu: ${data.target}</span><br>
            <span>Dừng lỗ: ${data.stop_loss}</span><br>
            <span>Thời gian: `+ formatDate(data.created_at) +`</span><br>
            <p></p>
            </div>
            </div>
            </div>
            <div id="messages-content"></div>
            </div>`;

            $('.testsss').prepend(newNotificationHtml);
            $("#alertNotifi").attr('class', 'form-control alertNotifi');
            $("#alertNotifi").html('Bạn có ' + data.count + ' thông báo mới');
            $("#alertNotifi").removeAttr('hidden');
            $("#icon-bell").addClass('animate');
        });
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear(),
                hour = d.getHours(),
                minute = d.getMinutes(),
                second = d.getSeconds();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return hour + ':' + minute + ':' + second + ' ' + day + '-' + day + '-' + day;
        }
        function readNotification(){
            var baseUrl = "{{ url('') }}";
            var url = baseUrl + '/client/readNotification';
            $.ajax({
                url: url,
                type: "GET",
                success: function(){
                    $("#alertNotifi").html('');
                    $("#alertNotifi").removeAttr('class');
                    $("#icon-bell").removeClass('animate');
                }
            });
        }
    </script>
</body>
</html>

