<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\System\Dashboard\Users\Models\AuthenticationOTPModel;
use Modules\System\Dashboard\Users\Models\UserModel;
use Modules\System\Dashboard\Users\Models\UserInfoModel;
use Illuminate\Support\Facades\Auth;
use Str;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator =  Validator::make(
            $data,
            [
                'name' => 'required',
                'email' => ['required','email','regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/','unique:users'],
                'phone' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation'=> 'required',
                // 'otp'=>'required || exists:auth_otp,otp',
            ],
            [
                'name.required' => 'Tên không được để trống!',
                'email.required' => 'Email không được để trống!',
                'email.email' => 'Email không đúng định dạng!',
                'email.regex' => 'Email không đúng định dạng!',
                'email.unique' => 'Email đã tồn tại!',
                'phone.required' => 'Số điện thoại không được để trống!',
                'password.required' => 'Mật khẩu không được để trống!',
                'password_confirmation.confirmed' => 'Mật khẩu xác định không khớp',
                'password_confirmation.required' => 'Nhập lại mật khẩu không được để trống',
                // 'otp.required' => 'Mã OTP không được để trống!',
                // 'otp.exists' => 'Mã OTP không hợp lệ!',
            ]);
            return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     */
    protected function create(array $data)
    {
       
        return User::create([
            'id' => (string)Str::uuid(),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'USERS',
        ]);
    }
}
