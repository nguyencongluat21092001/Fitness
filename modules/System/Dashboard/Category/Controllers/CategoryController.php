<?php

namespace Modules\System\Dashboard\Category\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Category\Services\CateService;
use DB;

/**
 * Quản trị danh mục
 *
 * @author Luatnc
 */
class CategoryController extends Controller
{

    public function __construct(
        CateService $CateService,
        CategoryService $CategoryService
    ){
        $this->CateService = $CateService;
        $this->CategoryService = $CategoryService;
    }
    
     /**
     * khởi tạo dữ, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function indexCategory(Request $request)
    {
        $getCate = $this->CateService->where('current_status','1')->get()->toArray();
        $data['cate'] = $getCate;
        return view('dashboard.category.category.indexCategory',compact('data'));
    }
    /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListCategory(Request $request)
    {
        $arrInput = $request->input();
        if($arrInput['cate'] == null || $arrInput['cate'] == ''){
            unset($arrInput['cate']);
        }
        $data = array();
        $param = $arrInput;
        $objResult = $this->CategoryService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        // $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.category.category.loadlistCategory", $data)->render();
    }
     /**
     * hiển thị modal update + create thể loại
     *
     * @param Request $request
     *
     * @return view
     */
    public function createFormCategory(Request $request)
    {
        $input = $request->all();
        $getCate = $this->CateService->where('current_status','1')->get()->toArray();
        $data['cate'] = $getCate;
        return view('dashboard.category.category.edit',compact('data'));
    }
    /**
     * thêm + update thông tin thể loại
     *
     * @param Request $request
     *
     * @return view
     */
    public function createCategory (Request $request)
    {
        $input = $request->input();
        $create = $this->CategoryService->store($input); 
        return array('success' => true, 'message' => 'Cập nhật thành công');
    }
    /**
     * Load màn hình chỉnh sửa thông tin thể loại
     *
     * @param Request $request
     *
     * @return view
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $data['detail'] = $this->CategoryService->editCategory($input);
        $data['cate'] = $this->CateService->where('current_status','1')->get()->toArray();
        // dd($data);
        return view('dashboard.category.category.edit',compact('data'));
    }


     /**
     * Xóa thể loại
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
                $this->CategoryService->where('id',$id)->delete();
            }
        }
        return array('success' => true, 'message' => 'Xóa thành công');
    }
}
