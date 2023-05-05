<?php

namespace Modules\System\Dashboard\DataFinancial\Controllers;

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
        $getCategory = $this->categoryService->where('cate','DM_DATA_CK')->get()->toArray();
        $data['category'] = $getCategory;
        return view('dashboard.datafinancial.index',compact('data'));
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
        if($arrInput['code_category'] == null || $arrInput['code_category'] == ''){
            unset($arrInput['code_category']);
        }
        if($arrInput['act'] == null || $arrInput['act'] == ''){
            unset($arrInput['act']);
        }
        $data = array();
        $param = $arrInput;
        $objResult = $this->DataFinancialService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.datafinancial.loadlist", $data)->render();
    }
    /**
     * Load màn hình them thông tin
     *
     * @param Request $request
     *
     * @return view
     */
    public function changeUpdate(Request $request)
    {
        $input = $request->all();
        $getCategory = $this->categoryService->where('cate','DM_DATA_CK')->get()->toArray();
        $data['category'] = $getCategory;
        if($input['id'] != null || $input['id'] != ''){
            $dataFinacial = $this->DataFinancialService->where('id',$input['id'])->get();
            $data['datas'] = $dataFinacial;
        }
        return view('dashboard.datafinancial.changeEdit',compact('data'));
    }
    /**
     * them thông tin
     *
     * @param Request $request
     *
     * @return view
     */
    public function create (Request $request)
    {
        $input = $request->input();
        $create = $this->DataFinancialService->store($input); 
        return array('success' => true, 'message' => 'Cập nhật thành công');
    }

     /**
     * Xóa
     *
     * @param Request $request
     *
     * @return Array
     */
    public function delete(Request $request)
    {
        $input = $request->all();
        $listids = trim($input['listitem'], ",");
        $ids = explode(",", $listids);
        foreach ($ids as $id) {
            if ($id) {
                $this->DataFinancialService->where('id',$id)->delete();
            }
        }
        return array('success' => true, 'message' => 'Xóa thành công');
    }
    /**
     * 
     */
    // updateDataFinancial
    
    /**
     * Cập nhật dữ liệu màn hình index
     */
    public function updateDataFinancial(Request $request)
    {
        $arrInput = $request->all();
        $data = $this->DataFinancialService->_updateDataFinancial($arrInput, $arrInput['id']);
        return $data;
    }
}
