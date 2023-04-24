@extends('dashboard.layouts.index')
@section('body')
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_Category.js') }}"></script>
    {{-- <link  href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" /> --}}
    <div class="container-fluid">
        <div class="row">
            <form action="" method="POST" id="frmCategory_index">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="breadcrumb-input-fix d-sm-flex align-items-center justify-content-between">
                    <ol class="">
                        <!-- <li class="breadcrumb-item"><a href="">Danh sách thể loại </a></li>
                        <li class="breadcrumb-item active">Thể loại</li> -->
                        <a href="{{ URL::asset('/system/category/index') }}">
                            <button class="btn btn-success btn-sm shadow-sm" id="" type="button"data-toggle="tooltip"
                            data-original-title="Thêm danh mục"><i class="fas fa-book-medical"></i> Danh mục</button>
                        </a>
                        &nbsp;
                        <a href="{{ URL::asset('/system/category/indexCategory') }}">
                            <button class="btn btn-light btn-sm shadow-sm" id="" type="button"data-toggle="tooltip"
                            data-original-title="Thêm danh mục"><i class="fas fa-list-alt"></i> Thể loại</button>
                        </a>
                    </ol>
                    @if(Auth::user()->role == 1)
                    <div class="breadcrumb-input-right">
                        <button class="btn btn-success btn-sm shadow-sm" id="btn_add" type="button"data-toggle="tooltip"
                            data-original-title="Thêm danh mục"><i class="fas fa-user-plus"></i></button>
                        <button class="btn btn-warning btn-sm shadow-sm" id="btn_edit" type="button"data-toggle="tooltip"
                            data-original-title="SỬa danh mục"><i class="fas fa-user-edit"></i></button>
                        <button class="btn btn-danger btn-sm shadow-sm" id="btn_delete" type="button"data-toggle="tooltip"
                            data-original-title="Xóa người dùng"><i class="fas fa-user-times"></i></button>
                    </div>
                    @endif
                </div>
                <section class="content-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row form-group" style="text-align: center;">
                                <!-- <div class="col-md-2">
                                    <select class="form-control input-sm chzn-select" name="role"
                                        id="role">
                                        <option value=''>-- Nhóm danh mục --</option>
                                        <option value="1">Tài chính</option>
                                        <option value="2">Khách hàng</option>
                                        <option value="2">Dịch vụ</option>
                                        <option value="2">Khuyến mại</option>
                                    </select>
                                </div> -->
                                <div class="input-group" style="width:40%;height:10%">
                                    <span class="input-group-text text-body"><i class="fas fa-search"
                                            aria-hidden="true"></i></span>
                                    <input id="search" name="search" type="text" class="form-control" placeholder="Từ khóa tìm kiếm...">
                                </div>
                                <button style="width:8%" id="txt_search" name="txt_search" type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
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
    <div class="modal " id="addfile" role="dialog"></div>

    <div id="dialogconfirm"></div>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = '{{ url('') }}';
        var JS_Category = new JS_Category(baseUrl, 'system', 'category');
        jQuery(document).ready(function($) {
            JS_Category.loadIndex(baseUrl);
        })
    </script>
@endsection

