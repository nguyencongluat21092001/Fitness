<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Ncl\Library;
use Modules\System\Dashboard\Users\Services\UserService;
use Modules\System\Dashboard\Users\Services\UserInfoService;


class LoginController extends Controller
{
    public function __construct(
        UserInfoService $userInfoService,
        UserService $userService
        )
    {
        $this->userInfoService = $userInfoService;
        $this->userService = $userService;
        // parent::__construct();
    }
    public function checkLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if($email == '' || $email == null){
            $data['message'] = "Email không được để trống";
            return view('auth.signin',compact('data'));
        }
        if($password == '' || $password == null){
            $data['message'] = "Mật khẩu không được để trống";
            return view('auth.signin',compact('data'));
        }
        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $getUsers = $this->userService->where('email',$user->email)->first();
            $getInfo = $this->userInfoService->where('user_id',$user->id)->first();
            $_SESSION["role"] = $user->role;
            $_SESSION["id"]   = $getUsers->id;
            $_SESSION["email"]   = $user->email;
            $_SESSION["color_view"] = !empty($getInfo->color_view)?$getInfo->color_view:2;
            // menu sidebar
            $sideBarConfig = config('SidebarSystem');
            $sideBar = $this->checkPermision($sideBarConfig , $user->role);
            $_SESSION["sidebar"] = $sideBar;
            // kiem tra quyen nguoi dung
            if ($user->role == 'ADMIN' || $user->role == 'MANAGE' || $user->role == 'STAFF') {
                Auth::guard('web')->login($user);
                return redirect('system/home/index');
            } else if ($user->role == 'USERS') {
                Auth::guard('web')->login($user);
                return view('client.home.home');
            }
        } else {
            $data['class'] = 'form-control error';
            $data['message'] = "Sai tên đăng nhập hoặc mật khẩu!";
            return view('auth.signin',compact('data'));
        }
    }
    
    public function logout (Request $request)
    {
        session_unset();
        Auth::guard('web')->logout();
        return view('auth.signin');
    }
    public function showLoginForm  (Request $request)
    {
        return view('auth.signin');
    }
    // check quyền hiển thị menu
    private function checkPermision($menu,$role){
        foreach ($menu as $key => $value) {
            if ($key == $role) {
                $menu = $value;
                return  $menu;
            }
        }
   }
}
