<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../clients/img/LogoFinTop_red.png">
    <title>
        HỆ THỐNG DỊCH VỤ
    </title>
    <!--     Fonts and icons     -->
    <base href="{{ asset('') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link href="../assets/css/dashboard.css?v=2.0.4" rel="stylesheet" />
    <!-- message aler (Thông báo) -->
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css"/>
    <script src="../assets/js/sweetalert2.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <link rel="stylesheet" href="../assets/chosen/chosen.min.css">
    <link rel="stylesheet" href="../assets/datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../assets/css/toast.min.css">
    @yield('css')

    <script src="../assets/js/croppie.js"></script>
    <script rel="stylesheet" src="../assets/css/croppie.css"></script>
    <script src="../assets/js/croppie.min.js"></script>
    <script type="text/jscript" src="../assets/js/CoreTable.js"></script>
    <script type="text/javascript" src="{{ URL::asset('assets\js\NclLibrary.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_System_Security.js') }}"></script>

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

</head>
 @if ($_SESSION['role'] != 'USERS') 
    @if ($_SESSION['color_view'] == 1)
        <body class="g-sidenav-show dark-version">
    @else
        <body class="g-sidenav-show bg-white">
    @endif
    <div id="imageLoading">
            <div class="loader_bg">
                <div class="loader"><img src="../assets/images/loading.gif" alt="#" /></div>
            </div>
        </div>
        
    <!-- <div class="min-height-300 bg-primary position-absolute w-100"></div> -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps " id="sidenav-main" style="background:#1d2440 !important">
        <div class="sidenav-header">
        <i class="fas fa-times cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <!-- target="_blank" -->
        <a class="navbar-brand m-0" href="{{url('/client/home/index')}}">
            <img src="../clients\img\LogoFinTop_red.png" class="navbar-brand-imgh-120" alt="main_logo" style="width:80%;padding-left:20%">
            <span class="ms-1 font-weight-bold"></span>
        </a>
        </div>
        <hr class="horizontal dark mt-7">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main" >
            <ul class="navbar-nav">
                <!-- sidebar -->
                @if(isset($_SESSION['sidebar']))
                    @foreach($_SESSION['sidebar'] as $value)
                        <li class="nav-item">
                            <a style="color:white" class="{{$value['a']}}" href="{{ URL::asset($value['href']) }}">
                                <i class="{{$value['icon']}}"></i>
                                <span class="nav-link-text ms-1" >{{$value['name']}}</span>
                            </a>
                        </li>
                    @endforeach
                @endif
                    <!-- <li class="nav-item">
                        <a style="color:white" class="nav-link " href="../pages/billing.html">
                            <i class="fas fa-user-cog"></i>
                            <span class="nav-link-text ms-1">Quản trị mã khuyến mại </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a style="color:white" class="nav-link " href="../pages/virtual-reality.html">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="nav-link-text ms-1">Quản trị doanh thu</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a style="color:white" class="nav-link " href="../pages/rtl.html">
                            <i class="fas fa-hand-holding-usd"></i>
                            <span class="nav-link-text ms-1">Báo cáo</span>
                        </a>
                    </li> -->
            </ul>
        </div>
    </aside>
    <!-- style="background-color:#2a3352f0; padding:40px" -->
    <main class="main-content position-relative border-radius-lg "  >
            <!-- Content -->

            <div id="app">
            <!-- style="background-color: #11112c5e; border-radius: 5px;" -->
                <nav class="navbar navbar-expand-md shadow-sm" >
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">

                            </ul>
                            <span style="width:60%">
                            <marquee>
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
                            </span>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <!-- <span id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <img  src="{{url('/file-image/avatar/')}}/{{ Auth::user()->avatar }}" alt="Image" style="border-radius:50%;height: 30px;width: 30px;object-fit: cover;">
                                            </span>    -->
                                        <span id="navbarDropdown" class="dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <span>
                                            {{ $_SESSION['name'] }}
                                            </span>
                                        </span>


                                        <div class="dropdown-menu dropdown-menu-end"  aria-labelledby="navbarDropdown">
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
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="javascript:;" class=" text-black p-0">
                                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown pe-2 d-flex align-items-center">
                                <a href="javascript:;" class=" text-black p-0" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell cursor-pointer"></i>
                                </a>
                                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                    aria-labelledby="dropdownMenuButton">
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New message</span> from Laur
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        13 minutes ago
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="../assets/img/small-logos/logo-spotify.svg"
                                                        class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New album</span> by Travis Scott
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        1 day
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                    <svg width="12px" height="12px" viewBox="0 0 43 36"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>credit-card</title>
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <g transform="translate(-2169.000000, -745.000000)"
                                                                fill="#FFFFFF" fill-rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(453.000000, 454.000000)">
                                                                        <path class="color-background"
                                                                            d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                            opacity="0.593633743"></path>
                                                                        <path class="color-background"
                                                                            d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        Payment successfully completed
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        2 days
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </nav>

                <main class="py-4" >
                    @yield('content')
                </main>
            </div>
            @yield('body')
        </main>
        <div class="fixed-plugin">
            <!-- <a class="fixed-plugin-button text-dark position-fixed px-4 py-3" style="background:#ffffff4a">
                <i class="fas fa-phone animate-charcter"></i>
            </a> -->
            <a class="fixed-plugin-button text-dark position-fixed px-4 py-2"style="background:#ffffff4a !important ;font-size: 2rem !important">
                <i class="fas fa-phone fa-2xl animate-charcter"></i>
            </a>
            <div class="card shadow-lg">
                <div class="card-header pb-0 pt-3 ">
                    <div class="float-start">
                        <h5 class="mt-3 mb-0">Giao diện phần mềm</h5>
                        <p>Chọn giao diện phù hợp với bạn.</p>
                    </div>
                    <div class="float-end mt-4">
                        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                    <!-- End Toggle Button -->
                </div>
                <hr class="horizontal dark my-1">
                <div class="card-body pt-sm-3 pt-0 overflow-auto">
                    <!-- Sidebar Backgrounds -->
                    <div>
                        <h6 class="mb-0">Màu sắc menu quản trị</h6>
                    </div>
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="badge-colors my-2 text-start">
                            <span class="badge filter bg-gradient-primary active" data-color="primary"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-dark" data-color="dark"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-info" data-color="info"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-success" data-color="success"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-warning" data-color="warning"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-danger" data-color="danger"
                                onclick="sidebarColor(this)"></span>
                        </div>
                    </a>
                    <!-- Sidenav Type -->
                    <div class="mt-3">
                        <h6 class="mb-0">Màu sắc menu</h6>
                        <!-- <p class="text-sm">Choose between 2 different sidenav types.</p> -->
                    </div>
                    <div class="d-flex">
                        <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white"
                            onclick="sidebarType(this)">Trắng</button>
                        <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default"
                            onclick="sidebarType(this)">Xanh than</button>
                    </div>
                    <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                    <!-- Navbar Fixed -->
                    <div class="d-flex my-3">
                        <h6 class="mb-0">Thanh điều hướng</h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                                onclick="navbarFixed(this)">
                        </div>
                    </div>
                    <hr class="horizontal dark my-sm-4">
                    <!-- <div class="mt-2 mb-5 d-flex">
                        <h6 class="mb-0">Ngày / Đêm</h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                                onchange="Js_Main.darkMode(1)">
                        </div>

                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                                onchange="Js_Main.darkMode(2)">
                        </div>
                    </div> -->
                    </div>
                </div>
            </div>
        </div>
    <!--   Core JS Files   -->
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript" src="{{ URL::asset('..\assets\js\Js_Main.js') }}"></script>
        @if($_SESSION["color_view"] == 1)
        <script type="text/javascript">
            var Js_Main = new Js_Main(this);
            jQuery(document).ready(function ($) {
                Js_Main.darkMode(1);
            })
        </script>
        @else 
        <script type="text/javascript">
            var Js_Main = new Js_Main(this);
            jQuery(document).ready(function ($) {
                Js_Main.darkMode(2);
            })
            </script>

        @endif
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        // var JS_System_Security = new JS_System_Security();
        //     $(document).ready(function($) {
        //         JS_System_Security.security();
        //     })
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    {{--<script src="../assets/js/dashboard.min.js?v=2.0.4"></script>--}}
    <!-- <script src="../assets/js/argon-dashboard.js"></script> -->
    <script type="text/jscript" src="../assets/chosen/chosen.min.js"></script>
    <script type="text/jscript" src="../assets/datepicker/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>
    <script type="text/jscript" src="../assets/js/toast.min.js"></script>
    <script>
        setTimeout(() => {
            $('#imageLoading').addClass("loader_bg_of");
        }, 2000)
    </script>
    @yield('js')
    @endif
</body>
</html>
