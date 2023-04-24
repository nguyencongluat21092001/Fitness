<?php

namespace Modules\System\Dashboard\Category\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Category\Services\CateService;
use DB;

/**
 * Quản trị danh mục
 *
 * @author Luatnc
 */
class CateController extends Controller
{

    public function __construct(
        CateService $CateService
    ){
        $this->CateService = $CateService;
    }

    /**
     * khởi tạo dữ, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('dashboard.category.cate.index');
    }
     /**
     * Load màn hình them thông tin người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function createForm(Request $request)
    {
        $input = $request->all();
        return view('dashboard.category.cate.edit');
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
        $create = $this->CateService->store($input); 
        return array('success' => true, 'message' => 'Cập nhật thành công');
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
        $data = $this->CateService->editCategory($input);
        return view('dashboard.category.cate.edit',compact('data'));
    }

    /**
     * Chỉnh sửa thông tin người dùng
     *
     * @param Request $request
     *
     * @return Array $respone
     */
    public function update(Request $request)
    {
        $input = $request->input();
        $respone = $this->CateService->updateOrCreateCategory($input);
        return $respone;
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
                $this->CateService->where('id',$id)->delete();
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
        $param = $arrInput;
        $objResult = $this->CateService->filter($param);
        $data['datas'] = $objResult;
        return view("dashboard.category.cate.loadlist", $data)->render();
    }
}
