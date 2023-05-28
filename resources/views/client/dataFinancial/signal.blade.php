@extends('client.layouts.index')
@section('body-client')
<!-- tra cứu cổ phiếu -->
<section class="container">
    <div class=" pb-3 d-lg-flex gx-5">
    <div class="col-lg-12">
        <form action="" method="GET" id="frmLoadlist_signal">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="home_index_vnindex pt-1 pb-3" style="background:#ffffff91 !important;border-radius:0px !important">
                <!-- Chú giải xếp hạng TA/FA -->
                <div class="home_index_child" style="background:#ffffffe0 !important;">
                    <div class="col-lg-12" style="padding:10px;">
                        <h1 class="h5 "> I. TÍN HIỆU MUA</h1>
                        <div class="table-responsive py-2">
                            <!-- Màn hình danh sách -->
                            <div id="table-container-signal"></div>
                        </div>
                        <h class="h5 py-2">- <span style="font-family: auto;">Chú giải xếp hạng TA/FA</span> : </h> <i style="color:#3ac500" class="far fa-eye"></i>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="modal" id="editmodal_fireAnt" role="dialog"></div>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\DataFinancial\JS_Signal.js') }}"></script>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = "{{ url('') }}";
        var JS_Signal = new JS_Signal(baseUrl, 'client', 'datafinancial');
        $(document).ready(function($) {
            JS_Signal.loadIndex(baseUrl);
        })
    </script>
@endsection