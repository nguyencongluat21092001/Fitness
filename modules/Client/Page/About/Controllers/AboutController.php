<?php

namespace Modules\Client\Page\About\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Category\Services\CateService;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class AboutController extends Controller
{

    public function __construct(
        CategoryService $categoryService
    ){
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
        $categories = $this->categoryService->where('cate','DM_BLOG')->where('code_category', 'BAO_CAO_THTT')->get();
        // dd($categories);
        $data['categories'] = $categories;
        return view('client.about.home',$data);
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
        $objResult = $this->aboutService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("client.about.dataFintop", $data)->render();
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
        $result = $this->aboutService->where('code_cp',$arrInput['code_cp'])->first();
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
        return view('client.about.fireAntChart');
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
        return view('client.about.noteTaFa');
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
        return view('client.about.signal');
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
        $result['datas'] = $this->aboutService->where('status','1')->get();
        return view('client.about.loadlist-signal',$result);
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
        return view('client.about.recommendations.index');
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
            return view('client.about.recommendations.loadlist',$result);
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
        return view('client.about.categoryfintop.index');
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
        return view('client.about.categoryfintop.loadlist_vip',$result);
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
        return view('client.about.categoryfintop.loadlist',$result);
    }
    
}
