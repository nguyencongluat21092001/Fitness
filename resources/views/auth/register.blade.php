@extends('layouts.appSign')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card" style="background:#182d51b0;">
                    <div class="card-header">
                        <h4>Đăng ký</h4>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf

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
                                <input placeholder="Số điện thoại..." id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                                    @error('phone') <span style="color: red">{{$message}}</span> @enderror
                            </div>
                        </div>

                        <div class="row {{!$errors->has('password') ? 'mb-3' : ''}}">
                            <div class="col-md-12">
                                <input placeholder="Nhập mật khẩu..." id="password" type="password" class="form-control" name="password" password">
                                   @error('password') <span style="color: red">{{$message}}</span> @enderror
                            </div>
                        </div>

                        <div class="row {{!$errors->has('password_confirmation') ? 'mb-3' : ''}}">
                            <div class="col-md-12">
                                <input placeholder="Nhập lại mật khẩu..." id="password-confirm" type="password" class="form-control" name="password_confirmation" password>
                            </div>
                        </div>
                        @error('password_confirmation') <span style="color: red">{{$message}}</span> @enderror
                        <div class="row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary" id="btn_register" style="background-color: slategrey">
                                    {{ __('Đăng ký') }}
                                </button>
                                <span class="btn text-white">Bạn đã có tài khoản? <i><a href="{{route('login')}}" style="color:#8b9ac5">Đăng nhập</a></i></span>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
