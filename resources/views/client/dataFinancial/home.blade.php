@extends('client.layouts.index')
@section('body-client')
<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

<nav id="main_nav" class=" navbar-expand-lg navbar-light shadow" style="background:#8d1313"> 
    <div class="container d-flex justify-content-between align-items-center link-datafinancial">
        <!-- <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <!-- <div class="align-self-center collapse navbar-collapse flex-fill text-center  d-lg-flex align-items-center" id="navbar-toggler-success"> -->
        <div class="" id="navbar-toggler-success">
            <div class="" style="border-radius:50%;margin:auto">
                <ul class=" navbar-nav d-flex justify-content-between mx-xl-5 text-dark">
                    <li class="nav-item link-home">
                        <a class="nav-link  px-3 " style="color:white" href="index.html"><i class="fa-solid fa-house-chimney"></i>Tra cứu cổ phiếu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  px-3" style="color:white" href="about.html"> Tín hiệu mua</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  px-3" style="color:white" href="about.html"> Khuyến nghị VIP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  px-3" style="color:white" href="about.html"> Danh mục FinTop</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- tra cứu cổ phiếu -->
<section class="container">
    <div class="pt-1 pb-3 d-lg-flex gx-5">
    <div class="col-lg-12">
        <form action="" method="POST" id="frmLoadlist_data">
            <h2 class="h4 py-2 typo-space-line">Biểu đồ nến</h2>
            <div class="home_index_vnindex">
                <div class="home_index_child py-2">
                    <div class="col-md-2">
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
                    <div class="col-md-4" style="padding-left:10px">

                    </div>
                    <div class="col-md-2" style="padding-left:10px">
                        <select class="form-control input-sm chzn-select" name="limit"
                            id="limit">
                            <option value="10">Hiển thị 10</option>
                            <option value="30">Hiển thị 30</option>
                            <option value="50">Hiển thị 50</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <!-- Màn hình danh sách -->
                        <div id="table-container-data"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\JS_DataFinancial.js') }}"></script>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = '{{ url('') }}';
        var JS_DataFinancial = new JS_DataFinancial(baseUrl, 'client', 'dataFinancial');
        $(document).ready(function($) {
            JS_DataFinancial.loadIndex(baseUrl);
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
@endsection