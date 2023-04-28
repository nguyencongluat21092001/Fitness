<?php

namespace Modules\System\Dashboard\Home\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\Api\Services\Admin\PositionService;
use Modules\System\Dashboard\Home\Services\HomeService;
use Illuminate\Support\Facades\Http;
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
        $param = [
            'code'=> $arrInput['type_code'],
            'startDate'=> $arrInput['fromDate'],
            'endDate'=> $arrInput['toDate'],
            'limit'=> $arrInput['limit'],
        ];
        $response = Http::withBody(json_encode($param),'application/json')->get('10.20.3.170:7500/api/list-coin-code/');
        $response = $response->getBody()->getContents();
        $response = json_decode($response,true);
        $data['datas'] = $response;
        // dd($data);
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
        $response = Http::get('10.20.3.170:7500/api/list-top-coin');
        $response = $response->getBody()->getContents();
        $response = json_decode($response,true);
        $data['datas'] = $response;
        // dd($data);
        return view("dashboard.home.loadlist-tap1", $data);
    }
}
