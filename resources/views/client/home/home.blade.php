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
        <div class="banner-wrapper bg-light">
            <!-- <div id="index_banner" class="banner-vertical-center-index container-fluid pt-5"> -->
                <!-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="py-5 row d-flex align-items-center">
                                <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5" style="background: #e4f3ffbf;border-radius: 50px">
                                    <h1 class="banner-heading h1  display-3 mb-0 pb-5 mx-0 px-0 light-350 typo-space-line" style="color:#2c3a4cab">
                                    Xây dựng chiến lược đầu tư
                                    <br>của bạn
                                </h1>
                                    <p class="banner-body text-muted py-3 mx-0 px-0">
                                    Khi mở một tài khoản đầu tư, đôi khi những công ty bình thường có ít người đầu tư lại mang đến cho bạn sự bứt phá kinh ngạc. Tuy nhiên, vẫn theo quy luật chung, bạn cần tìm hiểu họ kỹ lưỡng trước khi đưa ra quyết định.
                                </p>
                                    <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="#" role="button">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="py-5 row d-flex align-items-center">
                                <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5"style="background: #e4f3ffbf;border-radius: 50px">
                                    <h1 class="banner-heading h1  display-3 mb-0 pb-3 mx-0 px-0 light-350" style="color:#2c3a4cab">
                                    Những con sóng lớn cần thời gian để phát triển.
                                    </h1>
                                    <p class="banner-body text-muted py-3">
                                    Anh đúng hay anh sai, điều đó không quan trọng, cái chính là anh kiếm được bao nhiêu khi anh đúng và mất bao nhiêu khi anh sai.
                                    </p>
                                    <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="#" role="button">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="py-5 row d-flex align-items-center">
                                <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5" style="background: #e4f3ffbf;border-radius: 50px">
                                    <h1 class="banner-heading h1  display-3 mb-0 pb-3 mx-0 px-0 light-350" style="color:#2c3a4cab">
                                        Cupidatat non proident, sunt in culpa qui officia
                                    </h1>
                                    <p class="banner-body text-muted py-3">
                                    Cổ phiếu dẫn dắt hàng đầu không phải là công ty lớn nhất hay nhãn hiệu nổi tiếng, dễ nhận biết, mà là công ty có tăng trưởng lợi nhuận quý và hàng năng tốt nhất, ROE, lợi nhuận biên, tăng trưởng doanh số cao nhất và hành động giá tích cực.
                                    </p>
                                    <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="#" role="button">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev text-decoration-none" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                        <i class='bx bx-chevron-left'></i>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next text-decoration-none" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                        <i class='bx bx-chevron-right'></i>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div> -->
            <!-- </div> -->
        </div>
        <!-- End Banner Hero -->

        <!-- Start Team Member -->
        <section class="container">
            <div class="pt-5 pb-3 d-lg-flex  gx-5">
                    <div class="col-lg-4">
                        <form action="" method="POST" id="frmLoadlist_list">
                            <h2 class="h4 py-2 typo-space-line">Chỉ số thị trường</h2>
                            <div class="home_index_vnindex">
                                <div class="home_index_child py-2">
                                    <div class="col-md-6">
                                        <select class="form-control input-sm chzn-select" name="type_code"
                                            id="type_code">
                                            <option value="VNINDEX">VNINDEX</option>
                                            <option value="VPB">VPB</option>
                                            <option value="HNXINDEX">HNXINDEX</option>
                                            <option value="UPINDEX">UPINDEX</option>
                                            <option value="VN30">VN30</option>
                                            <option value="VN30">VN30</option>
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
                                <div class="home_index_child">
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
                                <!-- <div class="home_index_child" style="text-align:center">
                                    <button id="txt_search" name="txt_search" style="background:#2e4970;color:white" type="button" class="btn"><i class="fas fa-search"></i></button>
                                </div> -->
                                <div class="table-responsive">
                                    <!-- Màn hình danh sách -->
                                    <div id="table-container" style="padding-top:10px"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                <div class="col-lg-8 row" style="padding-left:30px">
                    <!-- Start Our Work -->
                    <h2 class="h4 typo-space-line">Bài viết nổi bật</h2>
                    <section class="container py-2">
                        <!-- <div class="row justify-content-center my-5">
                            <div class="filter-btns shadow-md rounded-pill text-center col-auto">
                                <a class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4 active" data-filter=".project" href="#">All</a>
                                <a class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4" data-filter=".000.BV_TN" href="#">000.BV_TN</a>
                                <a class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4" data-filter=".000.BV_TG" href="#">VB thế giới</a>
                                <a class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4" data-filter=".social" href="#">Social Media</a>
                                <a class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4" data-filter=".graphic" href="#">Graphic</a>
                            </div>
                        </div> -->
                        
                        <form action="" method="POST" id="frmLoadlist_blog" style="background:#f8f8f8;border-radius: 1%;">
                             <!-- Màn hình danh sách -->
                                <div class="home_index_child py-2">
                                    <div class="col-md-3">
                                        <select class="form-control input-sm chzn-select" name="category"
                                            id="category">
                                            <option value="">Chon thể loại</option>
                                            <option value="000.BV_TN">000.BV_TN</option>
                                            <option value="000.BV_TG">000.BV_TG</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="padding-left:15px">
                                            <input class="form-control input-sm" type="date" id="fromDate" name="fromDate" 
                                                value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"), date("Y")))?>"  min="2010-01-01" max="2030-12-31">   
                                    </div> 
                                    <i style="padding:10px 20px 0px 20px" class="fas fa-long-arrow-alt-right"></i>
                                    <div class="col-md-3" style=""> 
                                            <input class="form-control input-sm" type="date" id="toDate" name="toDate" 
                                                value="<?php echo (new DateTime())->format('Y-m-d');?>"  min="2010-01-01" max="2030-12-31">  
                                    </div>
                                </div>
                                <div class="home_index_child py-2">
                                    <div class="col-md-8">
                                        <input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm...">
                                    </div>
                                    <div class="col-md-2">
                                        <button id="txt_search" name="txt_search" style="background:#2e4970;color:white" type="button" class="btn"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                             <div id="table-blog-container" style="padding-top:10px"></div>
                        </form>
                    </section>
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
@endsection