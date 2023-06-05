@extends('client.layouts.index')
@section('body-client')
<section class="container">
    <div class=" pb-3 d-lg-flex gx-5">
    <div class="col-lg-12">
        <form action="" method="GET" id="frmLoadlist_signal">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="home_index_vnindex pt-1 pb-3" style="background:#ffffff91 !important;border-radius:0px !important">
                <!-- phần giới thiệu FIn top -->
                <div class="home_index_child" style="background:#ffffff91 !important;">
                    <div class="col-lg-12" style="padding:10px;">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex align-items-center">
                                        <form id="frmView"  role="form" action="" method="POST">
                                            <input type="hidden" name="id" id="id" value="">
                                            <div class="mt-2 d-flex">
                                                <h6 class="mb-0">Chế độ tối</h6></h6>
                                                <div class="form-check form-switch" id="btn_checkbox">
                                                </div>
                                            </div>
                                        </form>
                                    <!-- </div> -->
                                        <button class="btn btn-primary btn-sm ms-auto">Cập nhật</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-uppercase text-sm">Thông tin người dùng</p>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <p for="example-text-input" class="form-control-label">Tên</p>
                                            <input class="form-control" type="text" value="{{isset($datas->name) ? $datas->name : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <p for="example-text-input" class="form-control-label">Địa chỉ Email</p>
                                            <input class="form-control" type="email" value="{{isset($datas->email) ? $datas->email : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <p for="example-text-input" class="form-control-label">Ngày sinh</p>
                                            <input class="form-control" type="date" value="{{isset($datas->dateBirth) ? $datas->dateBirth : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <p for="example-text-input" class="form-control-label">Số điện thoại</p>
                                            <input class="form-control" type="text" value="{{isset($datas->phone) ? $datas->phone : ''}}">
                                            </div>
                                        </div>
                                        </div>
                                        <hr class="horizontal dark">
                                        <p class="text-uppercase text-sm">Thông tin liên lạc</p>
                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <p for="example-text-input" class="form-control-label">Địa chỉ</p>
                                            <input class="form-control" type="text" value="{{isset($datas->address) ? $datas->address : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <p for="example-text-input" class="form-control-label">Công ty</p>
                                            <input class="form-control" type="text" value="{{isset($datas->user_infor->company) ? $datas->user_infor->company : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <p for="example-text-input" class="form-control-label">Chức vụ</p>
                                            <input class="form-control" type="text" value="{{isset($datas->user_infor->position) ? $datas->user_infor->position : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <p for="example-text-input" class="form-control-label">Gia nhập ngày</p>
                                            <input class="form-control" type="date" value="{{isset($datas->user_infor->date_join) ? $datas->user_infor->date_join : ''}}">
                                            </div>
                                        </div>
                                        </div>
                                        <!-- <hr class="horizontal dark">
                                        <p class="text-uppercase text-sm">About me</p>
                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">About me</label>
                                            <input class="form-control" type="text" value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.">
                                            </div>
                                        </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-profile">
                                    <!-- <img src="../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top"> -->
                                    <div class=" justify-content-center" style="--bs-gutter-x: 1.5rem;
                                                                                    --bs-gutter-y: 0;
                                                                                    display: flex;
                                                                                    flex-wrap: wrap;
                                                                                    margin-top: calc(var(--bs-gutter-y) * -1);
                                                                                    margin-right: none !important;
                                                                                    margin-left: calc(var(--bs-gutter-x)/ -2);">
                                    <div class="col-4 col-lg-4 order-lg-2">
                                        <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                        <a href="javascript:;">
                                            <img src="{{url('file-image/avatar')}}/{{$datas->avatar}}" style="height: 150px;width: 150px;object-fit: cover;border-radius:50%">
                                        </a>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                                    <div class="d-flex justify-content-between">
                                        <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                                        <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
                                        <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                                        <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
                                    </div>
                                    </div>
                                    <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col">
                                        <div class="d-flex justify-content-center">
                                            <div class="d-grid text-center">
                                            <span class="text-lg font-weight-bolder">22</span>
                                            <span class="text-sm opacity-8">Friends</span>
                                            </div>
                                            <div class="d-grid text-center mx-4">
                                            <span class="text-lg font-weight-bolder">10</span>
                                            <span class="text-sm opacity-8">Photos</span>
                                            </div>
                                            <div class="d-grid text-center">
                                            <span class="text-lg font-weight-bolder">89</span>
                                            <span class="text-sm opacity-8">Comments</span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <h5>
                                        {{isset($datas->name) ? $datas->name : ''}}
                                        </h5>
                                        <div>
                                        <i class="ni location_pin mr-2"></i>{{isset($datas->phone) ? $datas->phone : ''}}
                                        </div>
                                        <div>
                                        <i class="ni location_pin mr-2"></i>{{isset($datas->email) ? $datas->email : ''}}
                                        </div>
                                        <div class="h6 font-weight-300">
                                        <i class="ni location_pin mr-2"></i>{{isset($datas->address) ? $datas->address : ''}}
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="../clients/js/jquery.min.js"></script>
@endsection