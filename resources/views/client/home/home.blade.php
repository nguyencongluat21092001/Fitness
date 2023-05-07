@extends('client.layouts.index')
@section('body-client')
<style>
    header
    {
      font-family: 'Lobster', cursive;
      text-align: center;
      font-size: 25px;  
    }

    #info
    {
      font-size: 18px;
      color: #555;
      text-align: center;
      margin-bottom: 25px;
    }

    a{
      color: #074E8C;
    }

    .scrollbar
    {
      margin-left: 30px;
      /* float: left; */
      height: 400px;
      /* width: 65px; */
      /* background: #F5F5F5; */
      overflow-y: scroll;
      margin-bottom: 25px;
    }

    .force-overflow
    {
      min-height: 400px;
    }

    #wrapper
    {
      text-align: center;
      width: 500px;
      margin: auto;
    }

    /*
    *  STYLE 2
    */

    #style-2::-webkit-scrollbar-track
    {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      border-radius: 10px;
      background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar
    {
      width: 12px;
      background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar-thumb
    {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
      background-color: #D62929;
    }
</style>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\JS_Home.js') }}"></script>
        <!-- Start Banner Hero -->
        <div class="banner-wrapper">
        <section class="container">
            <div class="table-responsive">
                <!-- Màn hình danh sách top chỉ số tài chính-->
                <div id="table-container-loadListTop"></div>
            </div>
        </section>
       
        <section class="container">
            <div class="row mt-4">
                <div class="col-lg-7 mb-lg-0 mb-4">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Biểu đồ thị trường</h6>
                        <p class="text-sm mb-0">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">Tháng 5</span> năm 2023
                        </p>
                        </div>
                        <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner border-radius-lg h-100">
                        <div class="carousel-item h-100 active" style="background-image: url('./assets/img/carousel-1.jpg');
                        background-size: cover;">
                        <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                            <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                            <i class="ni ni-camera-compact text-dark opacity-10"></i>
                            </div>
                            <h5 class="text-white mb-1">Get started with Argon</h5>
                            <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                        </div>
                        </div>
                        <div class="carousel-item h-100" style="background-image: url('./assets/img/carousel-2.jpg');
                        background-size: cover;">
                        <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                            <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                            <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                            </div>
                            <h5 class="text-white mb-1">Faster way to create web pages</h5>
                            <p>That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
                        </div>
                        </div>
                        <div class="carousel-item h-100" style="background-image: url('./assets/img/carousel-3.jpg');
                        background-size: cover;">
                        <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                            <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                            <i class="ni ni-trophy text-dark opacity-10"></i>
                            </div>
                            <h5 class="text-white mb-1">Share with us your design tips!</h5>
                            <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
        <!-- Start Team Member -->
        <section class="container">
            <div class="pt-5 pb-3 d-lg-flex gx-5">
                    <div class="col-lg-4">
                        <form action="" method="POST" id="frmLoadlist_list">
                            <h2 class="h4 py-2 typo-space-line">Chỉ số thị trường</h2>
                            <div class="home_index_vnindex">
                                <div class="home_index_child py-2">
                                    <div class="col-md-6">
                                        <select class="form-control input-sm chzn-select" name="type_code"
                                            id="type_code">
                                            <option value="VNINDEX">VNINDEX</option>
                                            <option value="HNX30">HNX30</option>
                                            <option value="HNXINDEX">HNXINDEX</option>
                                            <option value="UPINDEX">UPINDEX</option>
                                            <option value="VN30">VN30</option>
                                            <option value="VN100">VN100</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6" style="padding-left:10px">
                                        <select class="form-control input-sm chzn-select" name="limit"
                                            id="limit">
                                            <option value="10">Hiển thị 10</option>
                                            <option value="30">Hiển thị 30</option>
                                            <option value="50">Hiển thị 50</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="home_index_child" style="display:none">
                                    <div class="col-md-5">
                                            <input class="form-control input-sm" type="date" id="fromDate" name="fromDate" 
                                                value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"), date("Y")))?>"  min="2010-01-01" max="2030-12-31">   
                                    </div> 
                                    <i style="padding:10px 20px 0px 20px" class="fas fa-long-arrow-alt-right"></i>
                                    <div class="col-md-5"> 
                                            <input class="form-control input-sm" type="date" id="toDate" name="toDate" 
                                                value="<?php echo (new DateTime())->format('Y-m-d');?>"  min="2010-01-01" max="2030-12-31">  
                                    </div>
                                </div>
                                <div class="home_index_child" style="display:none">
                                    <button id="txt_search" name="txt_search" style="background:#2e4970;color:white" type="button" class="btn"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="table-responsive">
                                    <!-- Màn hình danh sách -->
                                    <div id="table-container"></div>
                                </div>
                            </div>
                        </form>
                        <div class="card mb-4">
                            <form action="" method="POST" id="frmLoadlist_Bank">
                                <h2 class="h4 py-2 typo-space-line">Chứng khoán ngân hàng</h2>
                                <div class="home_index_vnindex">
                                    <div class="home_index_child py-2">
                                        <div class="col-md-6">
                                            <select class="form-control input-sm chzn-select" name="type_code"
                                                id="type_code">
                                                @foreach($codeBank as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="home_index_child" style="display:none">
                                        <div class="col-md-5">
                                                <input class="form-control input-sm" type="date" id="fromDate" name="fromDate" 
                                                    value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"), date("Y")))?>"  min="2010-01-01" max="2030-12-31">   
                                        </div> 
                                        <i style="padding:10px 20px 0px 20px" class="fas fa-long-arrow-alt-right"></i>
                                        <div class="col-md-5"> 
                                                <input class="form-control input-sm" type="date" id="toDate" name="toDate" 
                                                    value="<?php echo (new DateTime())->format('Y-m-d');?>"  min="2010-01-01" max="2030-12-31">  
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <!-- Màn hình danh sách cổ phiếu ngân hàng -->
                                        <div id="table-container-bank"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8" style="padding-left:10px">
                        <!-- Start Our Work -->
                        <h2 class="h4 typo-space-line py-2">Bài viết nổi bật</h2>
                        <form action="" method="POST" id="frmLoadlist_blog" style="background:#e2e5e7de;border-radius: 0.25em;">
                                <!-- Màn hình danh sách -->
                                <div class="home_index_child py-2">
                                    <div class="col-md-3">
                                        <select class="form-control input-sm chzn-select" name="category"
                                            id="category">
                                            <option value=''>-- Chọn thể loại --</option>
                                            @foreach($category as $item){
                                                <option value="{{$item['code_category']}}">{{$item['name_category']}}</option>
                                            }
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- <div class="col-md-3" style="padding-left:15px">
                                            <input class="form-control input-sm" type="date" id="fromDate" name="fromDate" 
                                                value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"), date("Y")))?>"  min="2010-01-01" max="2030-12-31">   
                                    </div> 
                                    <div class="col-md-3" style=""> 
                                            <input class="form-control input-sm" type="date" id="toDate" name="toDate" 
                                                value="<?php echo (new DateTime())->format('Y-m-d');?>"  min="2010-01-01" max="2030-12-31">  
                                    </div> -->
                                </div>
                                <div id="table-blog-container"></div>
                        </form>
                        <!-- End Our Work -->
                    </div>
            </div>
        </section>
        <!-- End Team Member -->
        <!-- Start Service -->
        <section class="service-wrapper py-3">
            <div class="service-tag py-5 bg-secondary">
                <div class="col-md-12">
                    <ul class="nav d-flex justify-content-center">
                        <li class="nav-item mx-lg-4">
                            <a class="filter-btn nav-link btn-outline-primary active shadow rounded-pill text-light px-4 light-300" href="#" data-filter=".project">All</a>
                        </li>
                        <li class="nav-item mx-lg-4">
                            <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="#" data-filter=".graphic">Graphics</a>
                        </li>
                        <li class="filter-btn nav-item mx-lg-4">
                            <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="#" data-filter=".ui">UI/UX</a>
                        </li>
                        <li class="nav-item mx-lg-4">
                            <a class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300" href="#" data-filter=".branding">Branding</a>
                        </li>
                    </ul>
                </div>
            </div>

        </section>

        <section class="container overflow-hidden py-5">
            <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3 projects">

                <!-- Start Recent Work -->
                <div class="col-xl-3 col-md-4 col-sm-6 project ui branding">
                    <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                        <img class="service card-img" src="../clients/img/services-01.jpg" alt="Card image">
                        <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                            <div class="service-work-content text-left text-light">
                                <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">UI/UX design</span>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                            </div>
                        </div>
                    </a>
                </div><!-- End Recent Work -->

                <!-- Start Recent Work -->
                <div class="col-xl-3 col-md-4 col-sm-6 project ui graphic">
                    <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                        <img class="card-img" src="../clients/img/services-02.jpg" alt="Card image">
                        <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                            <div class="service-work-content text-left text-light">
                                <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">Social Media</span>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                            </div>
                        </div>
                    </a>
                </div><!-- End Recent Work -->

                <!-- Start Recent Work -->
                <div class="col-xl-3 col-md-4 col-sm-6 project branding">
                    <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                        <img class="card-img" src="../clients/img/services-03.jpg" alt="Card image">
                        <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                            <div class="service-work-content text-left text-light">
                                <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">Marketing</span>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                            </div>
                        </div>
                    </a>
                </div><!-- End Recent Work -->

                <!-- Start Recent Work -->
                <div class="col-xl-3 col-md-4 col-sm-6 project ui graphic">
                    <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                        <img class="card-img" src="../clients/img/services-04.jpg" alt="Card image">
                        <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                            <div class="service-work-content text-left text-light">
                                <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">Graphic</span>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                            </div>
                        </div>
                    </a>
                </div><!-- End Recent Work -->

                <!-- Start Recent Work -->
                <div class="col-xl-3 col-md-4 col-sm-6 project ui graphic">
                    <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                        <img class="card-img" src="../clients/img/services-05.jpg" alt="Card image">
                        <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                            <div class="service-work-content text-left text-light">
                                <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">Digtal Marketing</span>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                            </div>
                        </div>
                    </a>
                </div><!-- End Recent Work -->

                <!-- Start Recent Work -->
                <div class="col-xl-3 col-md-4 col-sm-6 project branding">
                    <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                        <img class="card-img" src="../clients/img/services-06.jpg" alt="Card image">
                        <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                            <div class="service-work-content text-left text-light">
                                <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">Market Research</span>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                            </div>
                        </div>
                    </a>
                </div><!-- End Recent Work -->

                <!-- Start Recent Work -->
                <div class="col-xl-3 col-md-4 col-sm-6 project branding">
                    <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                        <img class="card-img" src="../clients/img/services-07.jpg" alt="Card image">
                        <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                            <div class="service-work-content text-left text-light">
                                <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">Business</span>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                            </div>
                        </div>
                    </a>
                </div><!-- End Recent Work -->

                <!-- Start Recent Work -->
                <div class="col-xl-3 col-md-4 col-sm-6 project ui graphic branding">
                    <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                        <img class="card-img" src="../clients/img/services-08.jpg" alt="Card image">
                        <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                            <div class="service-work-content text-left text-light">
                                <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">Branding</span>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                            </div>
                        </div>
                    </a>
                </div><!-- End Recent Work -->

            </div>
        </section>
        <!-- End Service -->
        <!-- Start View Work -->
        <section class="bg-secondary">
            <div class="container py-5">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-2 col-12 text-light align-items-center">
                        <i class='display-1 bx bxs-box bx-lg'></i>
                    </div>
                    <div class="col-lg-7 col-12 text-light pt-2">
                        <h3 class="h4 light-300">Great transformations successful</h3>
                        <p class="light-300">Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                    <div class="col-lg-3 col-12 pt-4">
                        <a href="#" class="btn btn-primary rounded-pill btn-block shadow px-4 py-2">View Our Work</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End View Work -->

        <!-- Start Recent Work -->
        <section class="py-5 mb-5">
            <div class="container">
                <div class="recent-work-header row text-center pb-5">
                    <h2 class="col-md-6 m-auto h2 semi-bold-600 py-5">Recent Works</h2>
                </div>
                <div class="row gy-5 g-lg-5 mb-4">

                    <!-- Start Recent Work -->
                    <div class="col-md-4 mb-3">
                        <a href="#" class="recent-work card border-0 shadow-lg overflow-hidden">
                            <img class="recent-work-img card-img" src="../clients/img/recent-work-01.jpg" alt="Card image">
                            <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                    <h3 class="card-title light-300">Social Media</h3>
                                    <p class="card-text">Ullamco laboris nisi ut aliquip ex</p>
                                </div>
                            </div>
                        </a>
                    </div><!-- End Recent Work -->

                    <!-- Start Recent Work -->
                    <div class="col-md-4 mb-3">
                        <a href="#" class="recent-work card border-0 shadow-lg overflow-hidden">
                            <img class="recent-work-img card-img" src="../clients/img/recent-work-02.jpg" alt="Card image">
                            <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                    <h3 class="card-title light-300">Web Marketing</h3>
                                    <p class="card-text">Psum officia anim id est laborum.</p>
                                </div>
                            </div>
                        </a>
                    </div><!-- End Recent Work -->

                    <!-- Start Recent Work -->
                    <div class="col-md-4 mb-3">
                        <a href="#" class="recent-work card border-0 shadow-lg overflow-hidden">
                            <img class="recent-work-img card-img" src="../clients/img/recent-work-03.jpg" alt="Card image">
                            <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                    <h3 class="card-title light-300">R & D</h3>
                                    <p class="card-text">Sum dolor sit consencutur</p>
                                </div>
                            </div>
                        </a>
                    </div><!-- End Recent Work -->

                    <!-- Start Recent Work -->
                    <div class="col-md-4 mb-3">
                        <a href="#" class="recent-work card border-0 shadow-lg overflow-hidden">
                            <img class="recent-work-img card-img" src="../clients/img/recent-work-04.jpg" alt="Card image">
                            <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                    <h3 class="card-title light-300">Public Relation</h3>
                                    <p class="card-text">Lorem ipsum dolor sit amet</p>
                                </div>
                            </div>
                        </a>
                    </div><!-- End Recent Work -->

                    <!-- Start Recent Work -->
                    <div class="col-md-4 mb-3">
                        <a href="#" class="recent-work card border-0 shadow-lg overflow-hidden">
                            <img class="recent-work-img card-img" src="../clients/img/recent-work-05.jpg" alt="Card image">
                            <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                    <h3 class="card-title light-300">Branding</h3>
                                    <p class="card-text">Put enim ad minim veniam</p>
                                </div>
                            </div>
                        </a>
                    </div><!-- End Recent Work -->

                    <!-- Start Recent Work -->
                    <div class="col-md-4 mb-3">
                        <a href="#" class="recent-work card border-0 shadow-lg overflow-hidden">
                            <img class="recent-work-img card-img" src="../clients/img/recent-work-06.jpg" alt="Card image">
                            <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                    <h3 class="card-title light-300">Creative Design</h3>
                                    <p class="card-text">Mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </a>
                    </div><!-- End Recent Work -->

                </div>
            </div>
        </section>
    <!-- End Recent Work -->
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = '{{ url('') }}';
        var JS_Home = new JS_Home(baseUrl, 'client', 'home');
        $(document).ready(function($) {
            JS_Home.loadIndex(baseUrl);
        })
    </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

     <script>
        console.log(222);
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9","10","11", "12", "13", "14", "15", "16", "17", "18", "19"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
@endsection