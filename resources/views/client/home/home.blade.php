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
    .tv-lightweight-charts{
      width: 100%;
      padding-right: var(--bs-gutter-x, 0.5rem) !important;
      padding-left: var(--bs-gutter-x,0.5rem)!important;
      margin-right: auto!important;
      margin-left: auto!important;
    }
    .card{
      background:#ffffff26 !important;
    }

</style>

<!-- top cổ phiếu biến động -->
<section class="container">
    <div class="table-responsive">
        <!-- Màn hình danh sách top chỉ số tài chính-->
        <div id="table-container-loadListTop"></div>
    </div>
</section>
      <!-- Start Banner Hero -->
    <div class="banner-wrapper">
        <div class="table-responsive">
            <!-- Màn hình danh sách top chỉ số tài chính-->
            <div id="table-container-loadListTop"></div>
        </div>
        <!-- top cổ phiếu biến động -->
        <section class="container">
            <div class="table-responsive">
                <!-- Màn hình danh sách top chỉ số tài chính-->
                <div id="table-container-loadListTop"></div>
            </div>
        </section>
        <!-- tra cứu cổ phiếu -->
        <section class="container" style="background:#ffffff8a">
            <div class="pt-3 pb-3 d-lg-flex gx-5">
                    <div class="col-lg-4">
                        <form action="" method="POST" id="frmLoadlist_list">
                            <div class="home_index_vnindex">
                            <h2 class="h4 py-2"> <span style="padding-left:5%">Chỉ số thị trường</span> </h2>
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
                        <div class="card mb-4 pt-3">
                            <form action="" method="POST" id="frmLoadlist_Bank">
                                <div class="home_index_vnindex">
                                <h2 class="h4 py-2 "><span style="padding-left:5%">Chứng khoán ngân hàng</span> </h2>
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
                        <form action="" method="POST" id="frmLoadlist_blog" style="background:#ffffffe8;border-radius: 0.25em;">
                                <!-- Màn hình danh sách -->
                                <h2 class="h4 py-2"><span style="padding-left:2%">Bài viết nổi bật</span> </h2>

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
    </div>
    <!-- End Recent Work -->
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\JS_Home.js') }}"></script>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = '{{ url('') }}';
        var JS_Home = new JS_Home(baseUrl, 'client', 'home');
        $(document).ready(function($) {
            JS_Home.loadIndex(baseUrl);
        })
    </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


<script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_System_Security.js') }}"></script>
<script>
      var JS_System_Security = new JS_System_Security();
          $(document).ready(function($) {
                 JS_System_Security.security();
      })
</script>

@endsection