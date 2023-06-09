<?php

namespace Modules\Client\Page\DataFinancial\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\System\Dashboard\DataFinancial\Services\DataFinancialService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Signal\Services\SignalService;
use Modules\System\Dashboard\Effective\Services\EffectiveService;
use Modules\System\Dashboard\Recommended\Services\RecommendedService;
use DB;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class DataFinancialController extends Controller
{

    public function __construct(
        RecommendedService $recommendedService,
        EffectiveService $effectiveService,
        SignalService $SignalService,
        DataFinancialService $DataFinancialService,
        CategoryService $categoryService
    ){
        $this->recommendedService = $recommendedService;
        $this->effectiveService = $effectiveService;
        $this->SignalService = $SignalService;
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
        return view('client.dataFinancial.home',compact('data'));
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
        return view("client.dataFinancial.dataFintop", $data)->render();
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
        return view('client.dataFinancial.fireAntChart');
    }
     /**
     * hiển thị ghi chú
     *
     * @param Request $request
     *
     * @return view
     */
    public function noteTaFa (Request $request)
    {
        $input = $request->input();
        return view('client.dataFinancial.noteTaFa');
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
        return view('client.dataFinancial.signal');
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
        $result['datas'] = $this->DataFinancialService->where('status','1')->get();
        return view('client.dataFinancial.loadlist-signal',$result);
    }
     /**
     * Khuyến nghị vip
     *
     * @param Request $request
     *
     * @return view
     */
    public function recommendationsIndex (Request $request)
    {
        return view('client.dataFinancial.recommendations.index');
    }
     /**
     * list khuyến nghị vip
     *
     * @param Request $request
     *
     * @return view
     */
    public function loadList_recommendations (Request $request)
    {
        $arrInput = $request->input();
        if(isset($arrInput['type']) && $arrInput['type'] == 'box'){
            $result['datas'] = $this->SignalService->where('status','1')->orderBy('created_at','desc')->take(3)->get();
            return view('client.layouts.loadListBox',$result);
        }else{
            $result['datas'] = $this->SignalService->where('status','1')->get();
            return view('client.dataFinancial.recommendations.loadlist',$result);
        }
    }

      /**
     * Danh mục Fintop
     *
     * @param Request $request
     *
     * @return view
     */
    public function categoryFintopIndex (Request $request)
    {
        return view('client.dataFinancial.categoryfintop.index');
    }
     /**
     * list Danh mục FinTop vip
     *
     * @param Request $request
     *
     * @return view
     */
    public function loadList_categoryFintop_vip (Request $request)
    {
        $arrInput = $request->input();
        $result['datas'] = $this->recommendedService->where('status','!=','')->get();
        foreach($result['datas'] as $item){
            $ta = explode(',',$item['price_range']);
            $data[] = [
                "code_cp" => $item['code_cp'],
                "code_category" => $item['code_category'],
                "percent_of_assets" => $item['percent_of_assets'],
                "price" => $item['price'],

                "ta1" => !empty($ta[0])?$ta[0]:'',
                "ta2" => !empty($ta[1])?$ta[1]:'',
                "ta3" => !empty($ta[2])?$ta[2]:'',

                "current_price" => $item['current_price'],
                "profit_and_loss" => $item['profit_and_loss'],
                "act" => $item['act'],
                "stop_loss" => $item['stop_loss'],
                "closing_percentage" => $item['closing_percentage'],
                "note" => $item['note'],
                "status" => $item['status'],
                "created_at" => $item['created_at'],
                "updated_at" => $item['updated_at'],
            ];
        }
        return view('client.dataFinancial.categoryfintop.loadlist_vip',$result);
    }
     /**
     * list Danh mục FinTop basic
     *
     * @param Request $request
     *
     * @return view
     */
    public function loadList_categoryFintop_basic (Request $request)
    {
        $arrInput = $request->input();
        $result['datas'] = $this->effectiveService->where('status','!=','')->get();
        return view('client.dataFinancial.categoryfintop.loadlist',$result);
    }
    
}
