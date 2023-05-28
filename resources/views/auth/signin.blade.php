@extends('layouts.appSign')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card" style="background:#182d51b0;">
                    <div class="card-header">
                        <h4>Đăng nhập</h4>
                    </div>
                    <div class="card-body">
                        @if(isset($data['message'])) 
                        <div class="col-md-12 text-center">
                            <span style="color: red">{{$data['message']}}</span>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('checkLogin') }}" autocomplete="off">
                            @csrf

                            <div class="row {{!isset($data['email']) ? 'mb-3' : ''}}">
                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control" name="email"
                                        value="{{ old('email') }}" autofocus placeholder="Địa chỉ email...">
                                    @if(isset($data['email'])) <span style="color: red">{{$data['email']}}</span> @endif
                                </div>
                            </div>

                            <div class="row {{!isset($data['password']) ? 'mb-3' : ''}}">
                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control" name="password" placeholder="Mật khẩu">
                                    @if(isset($data['password'])) <span style="color: red">{{$data['password']}}</span> @endif
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" style="background-color: slategrey">
                                        {{ __('Đăng nhập') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #8b9ac5;">
                                            {{ __('Quên mật khẩu?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <span class="text-white">Bạn chưa có tài khoản? <i><a href="{{route('register')}}" style="color:#8b9ac5">Đăng ký ngay</a></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
