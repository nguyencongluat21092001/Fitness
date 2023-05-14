<?php

namespace Modules\Client\Page\DataFinancial\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\System\Dashboard\DataFinancial\Services\DataFinancialService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use DB;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class DataFinancialController extends Controller
{

    public function __construct(
        DataFinancialService $DataFinancialService,
        CategoryService $categoryService
    ){
        $this->DataFinancialService = $DataFinancialService;
        $this->categoryService = $categoryService;
    }

    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function index(Request $request)
    {
        // dd('1');
        $getCategory = $this->categoryService->where('cate','DM_DATA_CK')->get()->toArray();
        $data['category'] = $getCategory;
        return view('client.datafinancial.home',compact('data'));
    }
    /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadData(Request $request)
    { 
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $objResult = $this->DataFinancialService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("client.datafinancial.dataFintop", $data)->render();
    }
     /**
     * tra cứu cổ phiếu
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function searchDataCP(Request $request)
    { 
        $arrInput = $request->input();
        $result = $this->DataFinancialService->where('code_cp',$arrInput['code_cp'])->first();
        if(!isset($result)){
            $data=[
                'status' => 2,
                'message' => 'Không tồn tại mã cổ phiếu '.$arrInput['code_cp'].'!',
            ];
            return response()->json($data);
        }
        $getCategory = $this->categoryService->where('code_category',$result->code_category)->first();
        $data = [
            'id'=>$arrInput['id'],
            'code_cp'=>$result->code_cp,
            'exchange'=>$result->exchange,
            'code_category'=>isset($getCategory->name_category)?$getCategory->name_category:'',
            'ratings_TA'=>$result->ratings_TA,
            'identify_trend'=>$result->identify_trend,
            'act'=>$result->act,
            'trading_price_range'=>$result->trading_price_range,
            'stop_loss_price_zone'=>$result->stop_loss_price_zone,
            'ratings_FA'=>$result->ratings_FA,
            'url_link'=>$result->url_link,
            'status'=>$result->status,
            'created_at'=>$result->created_at,
            'updated_at'=>$result->updated_at
        ];
        return response()->json($data);
    }
    /**
     * them thông tin
     *
     * @param Request $request
     *
     * @return view
     */
    public function fireAntChart (Request $request)
    {
        $input = $request->input();
        return view('client.datafinancial.fireAntChart');
    }
     /**
     * index tín hiệu mua
     *
     * @param Request $request
     *
     * @return view
     */
    public function signalIndex (Request $request)
    {
        return view('client.datafinancial.signal');
    }
     /**
     * danh sách tín hiệu mua
     *
     * @param Request $request
     *
     * @return view
     */
    public function loadList_signal (Request $request)
    {
        $arrInput = $request->input();
        $result['datas'] = $this->DataFinancialService->where('status','on')->get();
        // dd($result);
        return view('client.datafinancial.loadlist-signal',$result);
    }
}
