@extends('client.layouts.index')
@section('body-client')
<!-- tra cứu cổ phiếu -->

<section class="container">
    <div class=" pb-3 d-lg-flex gx-5">
    <div class="col-lg-12">
        <form action="" method="GET" id="frmLoadlist_recommendations">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="home_index_vnindex pt-1 pb-3" style="background:#ffffff91 !important;border-radius:0px !important">
                <!-- Chú giải xếp hạng TA/FA -->
                <div class="home_index_child" style="background:#ffffffe6 !important;display:block;">
                    <div class="col-lg-12" style="padding:10px;">
                    <h1 class="h5 "> I. KHUYẾN NGHỊ VIP</h1>
                        <!-- <h class="h4 py-2"> <span style="font-family: auto;">Khuyến nghị vip</span></h> -->
                        <div class="table-responsive py-2">
                            <!-- Màn hình danh sách -->
                            <div id="table-container-recommendations"></div>
                        </div>
                        <!-- <h class="h5 py-2">- <span style="font-family: auto;">Chú giải xếp hạng TA/FA</span> : </h> <i style="color:#3ac500" class="far fa-eye"></i> -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="modal" id="editmodal_fireAnt" role="dialog"></div>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\DataFinancial\JS_Recommendations.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_System_Security.js') }}"></script>

    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = "{{ url('') }}";
        var JS_Recommendations = new JS_Recommendations(baseUrl, 'client', 'datafinancial');
        $(document).ready(function($) {
            JS_Recommendations.loadIndex(baseUrl);
        })
        // var JS_System_Security = new JS_System_Security();
        //     $(document).ready(function($) {
        //         JS_System_Security.security();
        //     })
    </script>
@endsection