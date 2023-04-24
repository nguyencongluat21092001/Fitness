<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\System\Dashboard\Users\Models\UserInfoModel;
use Illuminate\Support\Facades\Gate;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        Auth::viaRequest('costom-token', function (Request $request) {
            $token = $request->bearerToken();
            // ...
        });
        return view('home');
    }
     /**
     * 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editTest($userInfo_id)
    {
        $userInfo = UserInfoModel::find($userInfo_id);
        // if(Gate::allows('edit-comment',$userInfo)){
        //     // dd($userInfo);
        //     return 'Bạn có quyền ';
        // }else{
        //     return 'Bạn không có quyền';
        // }

    }
}
