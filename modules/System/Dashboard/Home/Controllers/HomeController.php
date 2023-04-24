<?php

namespace Modules\System\Dashboard\Home\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\Api\Services\Admin\PositionService;
use Modules\System\Dashboard\Home\Services\HomeService;
use DB;

/**
 * Phân quyền người dùng 
 *
 * @author Luatnc
 */
class HomeController extends Controller
{

    public function __construct(
        HomeService $homeService
    ){
        $this->homeService = $homeService;
    }

    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('dashboard.home.index');
    }
     /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadList(Request $request)
    { 
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $objResult = $this->homeService->filter($param);
        $data['datas'] = $objResult;
        // dd($data);
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.home.loadlist", $data);
    }
    /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListTap1(Request $request)
    { 
        // dd(222);
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $objResult = $this->homeService->filter($param);
        $data['datas'] = $objResult;
        // dd($data);
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.home.loadlist-tap1", $data);
    }
}
