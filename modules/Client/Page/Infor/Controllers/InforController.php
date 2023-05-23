<?php

namespace Modules\Client\Page\infor\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;
use Modules\System\Dashboard\Users\Services\UserInfoService;

/**
 * thông tinnguowif dùng
 *
 * @author Luatnc
 */
class InforController extends Controller
{

    public function __construct(
        UserInfoService $userInfoService
    ){
        $this->userInfoService = $userInfoService;
    }

    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        $users = \Auth::user();
        $user_infor = $this->userInfoService->where('user_id', $users->id)->first();
        $users['user_infor'] = $user_infor;
        $data['datas'] = $users;
        return view('client.Infor.index', $data);
    }

     /**
     * load màn hình danh sách lấy chỉ số thị trường
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadList(Request $request)
    { 
        $arrInput = $request->input();
        $data = $this->homeService->loadList($arrInput);
        return view("client.Introduce.loadlist", $data);
    }
}
