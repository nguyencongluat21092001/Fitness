<?php

namespace Modules\System\Dashboard\Recommended\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Recommended\Services\RecommendedService;

/**
 * Quản trị danh mục
 *
 * @author Luatnc
 */
class RecommendedController extends Controller
{

    public function __construct(
        RecommendedService $recommendedService,
        CategoryService $categoryService
    ){
        $this->recommendedService = $recommendedService;
        $this->categoryService = $categoryService;
    }

    /**
     * khởi tạo dữ, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('dashboard.recommended.recommended.index');
    }
     /**
     * Load màn hình them thông tin người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function add(Request $request)
    {
        $input = $request->all();
        $getCategory = $this->categoryService->where('cate','DM_DATA_CK')->get();
        $data['category'] = $getCategory;
        return view('dashboard.recommended.recommended.edit', $data);
    }
    /**
     * them danh mục
     *
     * @param Request $request
     *
     * @return view
     */
    public function create (Request $request)
    {
        $input = $request->input();
        $create = $this->recommendedService->store($input); 
        return $create;
    }
    /**
     * Load màn hình chỉnh sửa thông tin danh mục
     *
     * @param Request $request
     *
     * @return view
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $cates = $this->recommendedService->where('id', $input['id'])->first();
        if(empty($cates)){
            return array('success' => false, 'message' => 'Không tồn tại đối tượng!');
        }
        $getCategory = $this->categoryService->where('cate','DM_DATA_CK')->get();
        $data['category'] = $getCategory;
        $data['datas'] = $this->recommendedService->where('id', $input['id'])->first();
        return view('dashboard.recommended.recommended.edit', $data);
    }

     /**
     * Xóa danh mục
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
                $this->recommendedService->where('id',$id)->delete();
            }
        }
        return array('success' => true, 'message' => 'Xóa thành công');
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
        $objResult = $this->recommendedService->filter($arrInput);
        $data['datas'] = $objResult;
        return view("dashboard.recommended.recommended.loadList", $data)->render();
    }
    /**
     * Cập nhật thông tin màn hình index
     */
    public function updateColumn(Request $request)
    {
        $arrInput = $request->all();
        $data = $this->recommendedService->_updateColumn($arrInput, $arrInput['id']);
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatusCate(Request $request)
    {
        $arrInput = $request->all();
        $cate = $this->recommendedService->where('id', $arrInput['id']);
        if(!empty($cate->first())){
            $this->categoryService->where('cate', $cate->first()->code)->update(['status' => $arrInput['status']]);
            $cate->update(['status' => $arrInput['status']]);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            return array('success' => false, 'message' => 'Không tìm thấy dữ liệu!');
        }
    }
}
