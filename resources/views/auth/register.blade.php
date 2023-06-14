@extends('client.layouts.index')

@section('body-client')
<link rel="stylesheet" href="../clients/css/style.css">

<style>
    .hidden{
        display:none;
    }
    .show{
        display:block;
    }
    .swal2-title {
        font-family:'Montserrat', sans-serif;
        font-size:20px;
        color:#690000;
    }
</style>
<div class="container mt-2 mb-2">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card" style="background:#fff;">
                    <div class="card-body">
                        <div class="wrapper" style="background-image: url('images/bg-registration-form-2.jpg');">
                            <div class="inner">
                                <form id="frmSend_Otp" method="POST" action="{{ route('register') }}" autocomplete="off">
                                @csrf
                                    <h3>Đăng ký tài khoản
                                    <div>
                                    <span>
                                    @if(isset($data['user_introduce']))
                                    Giới thiệu từ nhân viên: 
                                    @endif
                                    @if(isset($data['user_introduce_name']))
                                    {{$data['user_introduce_name']}}
                                    @endif
                                    </span>
                                </div>
                                <div id="iss"></div>
                                    </h3>
                                    <div class="form-group">
                                        <div class="form-wrapper">
                                            <label for="" >Họ và tên <span class="request_star">*</span></label>
                                            <input placeholder="Nhập tên..." id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>                    
                                            @error('name') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-wrapper">
                                            <label for="">Số điện thoại <span class="request_star">*</span></label>
                                            <input onchange="JS_Register.getFonmPhone()" placeholder="Số điện thoại..." id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                                            @error('phone') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-wrapper">
                                        <label for="">Địa chỉ Email <span class="request_star">*</span></label>
                                        <input placeholder="Nhập địa chỉ email..." id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        @error('email') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="form-wrapper">
                                            <label for="">Mật khẩu <span class="request_star">*</span></label>
                                            <input placeholder="Nhập mật khẩu..." id="password" type="password" class="form-control" name="password" password>
                                             @error('password') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-wrapper">
                                            <label for="">Nhập lại mật khẩu <span class="request_star">*</span></label>
                                            <input placeholder="Nhập lại mật khẩu..." id="password-confirm" type="password" class="form-control" name="password_confirmation" password>
                                            @error('password_confirmation') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-wrapper">
                                        <label for="">Xác thực OTP SMS <span class="request_star">*</span></label>
                                        <div class="col-md-12 " style="display:flex">
                                            <div class="col-md-3">
                                                <button type="button" onclick="JS_Register.getOtp()" class=" btn-primary" id="btn_register" style="background-color: #ffae17">
                                                    {{ __('Lấy OTP SMS') }}
                                                </button>
                                            </div>
                                            <div class="col-md-9" style="padding-left:15px">
                                                <input placeholder="Nhập mã OTP..." id="otp" type="text" class="form-control" name="otp" value="{{ old('otp') }}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @error('otp') <span style="color: red">{{$message}}</span> @enderror
                                    <div class="form-wrapper">
                                        <label for="">Mã nhân viên giới thiệu</label>
                                        <input onchange="JS_Register.getUser()" placeholder="Mã nhân viên giới thiệu..." id="code_introduce" type="text" class="form-control" name="code_introduce" value="{{isset($data['user_introduce_id']) ? $data['user_introduce_id'] : ''}}">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Tôi chấp nhận Điều khoản sử dụng và Chính sách bảo mật. <span class="request_star">*</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pt-3">
                                        <button type="submit" class=" btn-primary" id="btn_register" style="background-color: slategrey">
                                            {{ __('Đăng ký') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
    </div>
  <link rel="stylesheet" href="../assets/css/sweetalert2.min.css"/>
    <div class="modal" id="model_otp" style="" role="dialog"></div>
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_Register.js') }}"></script>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = '{{ url('') }}';
        var JS_Register = new JS_Register(baseUrl, 'register','send-otp');
        $(document).ready(function($) {
            JS_Register.loadIndex(baseUrl);
        })
    </script>
@endsection
