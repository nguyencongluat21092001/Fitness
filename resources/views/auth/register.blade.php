@extends('client.layouts.index')

@section('body-client')
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
<div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card" style="background:#fff;">
                    <div class="card-header">
                        <h4>Đăng ký tài khoản
                            @if(isset($data['user_introduce']))
                            qua gới thiệu từ nhân viên: 
                            @endif
                            @if(isset($data['user_introduce_name']))
                            {{$data['user_introduce_name']}}
                            @endif
                        </h4>
                    </div>
                    <div class="card-body">
                    <form id="frmSend_Otp" method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_introduce" value="{{isset($data['user_introduce']) ? $data['user_introduce'] : ''}}">
                        <div class="row {{!$errors->has('name') ? 'mb-3' : ''}}">
                            <div class="col-md-12">
                                <input placeholder="Nhập tên..." id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>                    
                                @error('name') <span style="color: red">{{$message}}</span> @enderror
                            </div>
                        </div>

                        <div class="row {{!$errors->has('email') ? 'mb-3' : ''}}">
                            <div class="col-md-12">
                                <input placeholder="Nhập địa chỉ email..." id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    @error('email') <span style="color: red">{{$message}}</span> @enderror
                            </div>
                        </div>

                        <div class="row {{!$errors->has('phone') ? 'mb-3' : ''}}">
                            <div class="col-md-12">
                                <input onchange="JS_Register.getFonmPhone()" placeholder="Số điện thoại..." id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                                    @error('phone') <span style="color: red">{{$message}}</span> @enderror
                            </div>
                        </div>

                        <div class="row {{!$errors->has('password') ? 'mb-3' : ''}}">
                            <div class="col-md-12">
                                <input placeholder="Nhập mật khẩu..." id="password" type="password" class="form-control" name="password" password>
                                   @error('password') <span style="color: red">{{$message}}</span> @enderror
                            </div>
                        </div>

                        <div class="row {{!$errors->has('password_confirmation') ? 'mb-3' : ''}}">
                            <div class="col-md-12">
                                <input placeholder="Nhập lại mật khẩu..." id="password-confirm" type="password" class="form-control" name="password_confirmation" password>
                            </div>
                        </div>
                        @error('password_confirmation') <span style="color: red">{{$message}}</span> @enderror
                        <!-- <div id="show_Otp" class="row mb-0 hidden"> -->
                            <div class="col-md-12 " style="display:flex">
                                <button type="button" onclick="JS_Register.getOtp()" class="btn btn-primary" id="btn_register" style="background-color: #ffae17">
                                    {{ __('Lấy OTP SMS') }}
                                </button>
                                <div class="col-md-10" style="padding-left:5px">
                                     <input placeholder="Nhập mã OTP..." id="otp" type="text" class="form-control" name="otp" value="{{ old('otp') }}">
                                </div>
                            </div>
                            @error('otp') <span style="color: red">{{$message}}</span> @enderror
                            @error('user_introduce') <span style="color: red">{{$message}}</span> @enderror
                        <!-- </div> -->
                        <div class="row mb-0 mt-1">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary" id="btn_register" style="background-color: slategrey">
                                    {{ __('Đăng ký') }}
                                </button>
                                {{--
                                <span class="btn text-white">Bạn đã có tài khoản? <i><a href="{{route('login')}}" style="color:#8b9ac5">Đăng nhập</a></i></span>
                                --}}
                            </div>
                        </div>
                    </form>
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
