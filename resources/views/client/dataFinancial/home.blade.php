@extends('client.layouts.index')
@section('body-client')
<!-- tra cứu cổ phiếu -->
<div class="banner-wrapper">
    <section class="container">
        <div class=" pb-3 d-lg-flex gx-5">
        <div class="col-lg-12">
            <form action="" method="POST" id="frmLoadlist_data">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="home_index_vnindex pt-1 pb-2" style="background:#ffffff91 !important;border-radius:0px !important">
                    <!-- Chú giải xếp hạng TA/FA -->
                    <div class="home_index_child" style="background:#ffffff91 !important">
                        <div class="col-lg-12" style="padding:10px;">
                            <h class=" py-2"><i class="fas fa-search"></i> <span style="font-size:16px;font-family: auto;">Tra cứu cổ phiếu</span></h>
                            <div class="table-responsive py-2">
                                <!-- Màn hình danh sách -->
                                <div id="table-container-data"></div>
                            </div>
                            <h class="py-2">- <span style="font-family: auto;">Chú giải xếp hạng TA/FA</span> : </h> <i onclick="JS_DataFinancial.noteTaFa()" style="color:#3ac500" class="far fa-eye"></i>
                        </div>
                    </div>
                    <!-- biểu đồ FireAnt -->
                    <div class="home_index_child " style="background:#ffffff91 !important">
                        <div class="col-lg-12" style="padding:10px;">
                            <h class=" py-2"><i class="far fa-chart-bar"></i>. <span style="font-size:16px;font-family: auto;" > Biểu đồ</span> </h> <br>
                            <p>Nguồn theo: fireant</p>
                            <iframe style="width:100%" height="620" src="https://fireant.vn/dashboard" 
                                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- tra cứu cổ phiếu -->
    <!-- <section class="container">
        <div class="pt-1 pb-3 d-lg-flex gx-5">
        <div class="col-lg-12">
            <form action="" method="POST" id="frmLoadlist_data">
                <div class="home_index_child" style="background:#ffffff91 !important">
                    <div class="col-lg-12" style="padding:10px">
                        <h2 class="h5 py-2">Ghi chú tra cứu </h2>
                        <img  style="width:100%;" src="../clients/img/noteDataFintop.png" alt="Card image">
                    </div>
                </div>
            </form>
        </div>
    </section> -->
</div>
<div class="modal" id="editmodal_fireAnt" role="dialog"></div>
<div class="modal" id="editmodal_noteTaFa" role="dialog"></div>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\DataFinancial\JS_DataFinancial.js') }}"></script>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = "{{ url('') }}";
        var JS_DataFinancial = new JS_DataFinancial(baseUrl, 'client', 'dataFinancial');
        $(document).ready(function($) {
            JS_DataFinancial.loadIndex(baseUrl);
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
@endsection