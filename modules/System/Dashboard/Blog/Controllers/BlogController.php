<?php

namespace Modules\System\Dashboard\Blog\Controllers;

use App\Http\Controllers\Controller;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Category\Services\CateService;
use Modules\System\Dashboard\Blog\Services\BlogService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
use str;

/**
 * Phân quyền người dùng 
 *
 * @author Luatnc
 */
class BlogController extends Controller
{
    public function __construct(
        CateService $cateService,
        CategoryService $categoryService,
        BlogService $blogService
    ){
        $this->cateService = $cateService;
        $this->categoryService = $categoryService;
        $this->blogService = $blogService;
    }

    /**
     * màn hình danh sách người dùng
     *
     * @return view
     */
    public function index(Request $request)
    {
        $cate = $this->cateService->where('code_cate','DM_BLOG')->first();
        $category = $this->categoryService->select('code_category','name_category')->where('cate',$cate->code_cate)->get()->toArray();
        $data['category'] = $category;
        return view('dashboard.blog.index',compact('data'));
    }
    /**
     * user_info
     *
     * @return view
     */
    // public function indexUserInfo(Request $request)
    // {
    //     $data = $this->userService->where('id',$_SESSION["id"])->first();
    //     $userInfo = $this->userInfoService->where('user_id',$_SESSION['id'])->first();
    //     $data['company'] = !empty($userInfo->company)?$userInfo->company:null;
    //     $data['position'] = !empty($userInfo->position)?$userInfo->position:null;
    //     $data['date_join'] = !empty($userInfo->date_join)?$userInfo->date_join:null;
    //     return view('dashboard.users.userInfor.index',compact('data'));
    // }
    /**
     * Load màn hình thêm mới người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    // public function add(Request $request)
    // {
    //     $input = $request->all();
    //     $data = $this->userService->addUserDisplay($input);
    //     return view('Users::User.add', $data);
    // }
     /**
     * Load màn hình thêm bài viết
     *
     * @param Request $request
     *
     * @return view
     */
    public function createForm(Request $request)
    {
        $input = $request->all();
        // dd($input);
        
        $category = $this->categoryService->where('cate','DM_BLOG')->get()->toArray();
        $data['category'] = $category;
        return view('dashboard.blog.edit',compact('data'));
    }
    /**
     * Thêm thông tin người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function create (Request $request)
    {
        $input = $request->input();
        // dd($input,$_FILES);
        $create = $this->blogService->store($input,$_FILES); 
        return array('success' => true, 'message' => 'Cập nhật thành công');
    }
    /**
     * Load màn hình chỉnh sửa thông tin người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    // public function edit(Request $request)
    // {
    //     $input = $request->all();
    //     $data = $this->userService->editUser($input);
    //     return view('dashboard.users.edit',compact('data'));
    // }

     /**
     * Xóa bài viết
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
                $this->blogService->where('id',$id)->delete();
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
        if($param['category'] == '' || $param['category'] == null){
            unset($param['category']);
        }
        $objResult = $this->blogService->filter($param);
        $data['datas']= $objResult;
        return view("dashboard.blog.loadlist", $data)->render();
    }
}
