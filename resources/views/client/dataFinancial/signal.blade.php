@extends('client.layouts.index')
@section('body-client')
@include('client.dataFinancial.siderbar_child')
<!-- tra cứu cổ phiếu -->
<section class="container">
    <div class="pt-1 pb-3 d-lg-flex gx-5">
    <div class="col-lg-12">
        <form action="" method="GET" id="frmLoadlist_signal">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="home_index_vnindex" style="background:#ffffff91 !important">
                <!-- Chú giải xếp hạng TA/FA -->
                <div class="home_index_child" style="background:#ffffff91 !important">
                    <div class="col-lg-12" style="padding:10px;">
                        <h class="h4 py-2"><i class="fas fa-search"></i> <span style="font-family: auto;">Tín hiệu mua</span></h>
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
        var baseUrl = '{{ url('') }}';
        var JS_Signal = new JS_Signal(baseUrl, 'client', 'dataFinancial');
        $(document).ready(function($) {
            JS_Signal.loadIndex(baseUrl);
        })
    </script>
@endsection