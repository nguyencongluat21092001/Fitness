@extends('client.layouts.index')

@section('body-client')
<link rel="stylesheet" href="../clients/css/style.css">

    <div class="container mt-2 mb-2">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card" style="background:#fff;">
                    <div class="wrapper" style="background-image: url('images/bg-registration-form-2.jpg'); display: flex; justify-content: center;">
                        <!-- <div class="inner"> -->
                            <form method="POST" action="{{ route('checkLogin') }}" autocomplete="off">
                                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group" align="center">
                                    <div class="col-md-12 mt-3 mb-3">
                                        <h3 class="text-uppercase" style="font-family: Serif;">Đăng nhập</h3>
                                    </div>
                                </div>
                                <div class="form-wrapper row {{!isset($data['email']) ? 'mb-3' : ''}}">
                                    <label for="">Địa chỉ Email <span class="request_star">*</span></label>
                                    <input id="email" type="email"
                                        class="form-control" name="email"
                                        value="{{ old('email') }}" autofocus placeholder="Địa chỉ email...">
                                    @if(isset($data['email'])) <span style="color: red">{{$data['email']}}</span> @endif
                                </div>
                                <div class="form-wrapper row {{!isset($data['password']) ? 'mb-3' : ''}}">
                                    <label for="">Mật khẩu <span class="request_star">*</span></label>
                                    <input id="password" type="password"
                                        class="form-control" name="password" placeholder="Mật khẩu">
                                    @if(isset($data['password'])) <span style="color: red">{{$data['password']}}</span> @endif
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Tôi chấp nhận Điều khoản sử dụng và Chính sách bảo mật. <span class="request_star">*</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #8b9ac5;">
                                            {{ __('Quên mật khẩu?') }}
                                        </a>
                                    @endif
                                <div class="row mb-0">
                                @if(isset($data['message'])) 
                                <div class="col-md-12 text-center">
                                    <span style="color: red">{{$data['message']}}</span>
                                </div>
                                @endif
                                <div class="col-md-12 mb-3" style="display: flex;justify-content: space-between;">
                                    <button type="submit" class="btn btn-primary" style="background-color: slategrey">
                                        {{ __('Đăng nhập') }}
                                    </button>
                                </div>
                               
                                {{--<div class="col-md-12">
                                    <span class="text-white">Bạn chưa có tài khoản? <i><a href="{{route('register')}}" style="color:#8b9ac5">Đăng ký ngay</a></i></span>
                                </div>--}}
                            </div>
                            </form>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
