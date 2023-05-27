@extends('client.layouts.index')
@section('body-client')
<style>
    
</style>
<div class="banner-wrapper">
    <section class="container">
        <div class=" pb-3 d-lg-flex gx-5">
        <div class="col-lg-12">
            <form action="" method="POST" id="frmLoadlist_library">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="home_index_vnindex pt-1 pb-2" style="background:#ffffff91 !important;border-radius:0px !important">
                    <!-- Chú giải xếp hạng TA/FA -->
                    <div class="home_index_child" style="background:#ffffffc7 !important">
                        <div class="col-lg-12" style="padding:10px;">
                            <h class=" py-2"><i class="fas fa-search"></i> <span style="font-size:18px;font-family: auto;">CẨM NANG CHO NHÀ ĐẦU TƯ	</span></h>
                            <div class="row form-group pt-2" style="text-align: center;">
                                <div class="col-md-5">
                                    <select class="form-control input-sm chzn-select" name="cate"
                                        id="cate">
                                        <option value=''>-- Chọn loại cẩm nang --</option>
                                        @foreach($data['category'] as $item){
                                            <option value="{{$item['code_category']}}">{{$item['decision']}}</option>
                                        }
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group" style="width:30%;height:10%">
                                    <!-- <span class="input-group-text text-body"><i class="fas fa-search"
                                            aria-hidden="true"></i></span> -->
                                    <input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm...">
                                </div>
                                <button style="width:5%" id="txt_search" name="txt_search" type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>

                            </div>
                            <div class="table-responsive py-2 pt-3">
                                <!-- Màn hình danh sách -->
                                <div id="table-container-library"></div>
                            </div>
                        </div>
                    </div>
                    <!-- biểu đồ FireAnt -->
                    <div class="home_index_child " style="background:#ffffffc7 !important">
                        <div class="col-lg-12" style="padding:10px;">
                           1111111111
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<div class="modal" id="videomodal" role="dialog"></div>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\JS_Library.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = '{{ url('') }}';
    var JS_Library = new JS_Library(baseUrl, 'client', 'library');
    $(document).ready(function($) {
        JS_Library.loadIndex(baseUrl);
    })
</script>
@endsection