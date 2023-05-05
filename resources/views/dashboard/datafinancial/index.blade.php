@extends('dashboard.layouts.index')
@section('body')
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_DataFinancial.js') }}"></script>
    <div class="container-fluid">
        <div class="row">
            <form action="" method="POST" id="frmDataFinancial_index">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <!-- <div class="breadcrumb-input-fix d-sm-flex align-items-center justify-content-between">
                    <button class="btn btn-success btn-sm shadow-sm" id="" type="button"data-toggle="tooltip"
                    data-original-title="Thêm danh mục"><i class="fas fa-book-medical"></i> Cẩm nang</button>
                </div> -->
                <section class="content-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row form-group">
                            <div class="col-md-3">
                            <button class="btn btn-success shadow-sm" id="btn_add" type="button"data-toggle="tooltip"
                            data-original-title="Thêm cổ phiếu"><i class="fas fa-plus"></i></button>
                            <!-- <button class="btn btn-warning shadow-sm" id="btn_edit" type="button"data-toggle="tooltip"
                                data-original-title="SỬa người dùng"><i class="fas fa-user-edit"></i></button> -->
                            <button class="btn btn-danger shadow-sm" id="btn_delete" type="button"data-toggle="tooltip"
                            data-original-title="Xóa cổ phiếu"><i class="fas fa-trash-alt"></i></button>
                            </div>
                                <div class="col-md-2">
                                    <select class="form-control input-sm chzn-select" name="code_category"
                                        id="code_category">
                                        <option value=''>-- Chọn nhóm ngành HĐKD --</option>
                                        @foreach($data['category'] as $item){
                                            <option value="{{$item['code_category']}}">{{$item['name_category']}}</option>
                                        }
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control input-sm chzn-select" name="act"
                                        id="act">
                                        <option selected value=''>-- Chọn hành động --</option>
                                        <option value="MUA">Mua</option>
                                        <option value="CANH_MUA_DAN">Canh mua dần</option>
                                    </select>
                                </div>
                                <div class="input-group" style="width:30%;height:10%">
                                    <!-- <span class="input-group-text text-body"><i class="fas fa-search"
                                            aria-hidden="true"></i></span> -->
                                    <input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm theo mã CP, người đảm nhận...">
                                </div>
                                <button style="width:5%" id="txt_search" name="txt_search" type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>

                            </div>
                            <!-- Màn hình danh sách -->
                            <div class="row" id="table-container" style="padding-top:10px"></div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <div class="modal fade" id="editmodal" role="dialog"></div>
    <div class="modal" id="changeUpdateModal" role="dialog"></div>

    <div class="modal" id="videomodal" role="dialog"></div>
    <div class="modal " id="addfile" role="dialog"></div>

    <div id="dialogconfirm"></div>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = "{{ url('') }}";
        var JS_DataFinancial = new JS_DataFinancial(baseUrl, 'system', 'datafinancial');
        $(document).ready(function($) {
            JS_DataFinancial.loadIndex(baseUrl);
        })
    </script>
@endsection
