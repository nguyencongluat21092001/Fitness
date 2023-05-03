<?php

namespace Modules\Client\Page\Home\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\Client\Page\Home\Services\HomeService;
use Modules\System\Dashboard\Blog\Services\BlogService;
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
        HomeService $homeService,
        BlogService $blogService
    ){
        $this->blogService = $blogService;
        $this->homeService = $homeService;
    }

    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('client.home.home');
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
        $response = Http::withBody(json_encode($param),'application/json')->get('172.20.10.2:7500/api/list-coin-code/');
        $response = $response->getBody()->getContents();
        $response = json_decode($response,true);
        $data['datas'] = $response;
        return view("client.home.loadlist", $data);
    }
    /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListBlog(Request $request)
    { 
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        if($param['category'] == '' || $param['category'] == null){
            unset($param['category']);
        }
        $objResult = $this->blogService->filter($param);
        $data['datas']= $objResult;
        return view("client.home.loadlist-blog", $data);
    }
    public function realTimeData(Request $request)
    { 
        $arrInput = $request->input();
        $param = [
            'code'=> 'VNINDEX',
            'startDate'=> '2020-01-01',
            'endDate'=> '2023-04-28',
            'limit'=> '500',
        ];
        $response = Http::withBody(json_encode($param),'application/json')->get('172.20.10.2:7500/api/list-coin-code/');
        $response = $response->getBody()->getContents();
        $response = json_decode($response,true);
        foreach($response as $value){
            $data[] = [
                'time'=> substr($value['date'], 0, 10) ,
                'open'=> $value['priceOpen'],
                'high'=> $value['priceHigh'],
                'low'=> $value['priceLow'],
                'close'=> $value['priceClose'],
            ];
        }
        // dd($data);

        return response()->json($data);
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
        $response = Http::get('192.168.1.5:7500/api/list-top-coin');
        $response = $response->getBody()->getContents();
        $response = json_decode($response,true);
        $data['datas'] = $response;
        // dd($data);
        return view("dashboard.home.loadlist-tap1", $data);
    }
}
