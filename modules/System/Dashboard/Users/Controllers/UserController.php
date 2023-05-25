<?php

namespace Modules\System\Dashboard\Users\Controllers;

use App\Http\Controllers\Controller;
use Modules\System\Dashboard\Users\Services\UserInfoService;
use Modules\System\Dashboard\Users\Services\UserService;
use Modules\System\Helpers\PaginationHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use str;
use DB;

/**
 *
 * @author Luatnc
 */
class UserController extends Controller
{
    public function __construct(
        userInfoService $userInfoService,
        UserService $userService
    ){
        $this->userInfoService = $userInfoService;
        $this->userService = $userService;
    }

    /**
     * màn hình danh sách người dùng
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('dashboard.users.index');
    }
    /**
     * user_info
     *
     * @return view
     */
    public function indexUserInfo(Request $request)
    {
        $data = $this->userService->where('id',$_SESSION["id"])->first();
        $userInfo = $this->userInfoService->where('user_id',$_SESSION['id'])->first();
        $data['company'] = !empty($userInfo->company)?$userInfo->company:null;
        $data['position'] = !empty($userInfo->position)?$userInfo->position:null;
        $data['date_join'] = !empty($userInfo->date_join)?$userInfo->date_join:null;
        return view('dashboard.users.userInfor.index',compact('data'));
    }
     /**
     * thay đổi màu sắc trang web
     *
     * @return view
     */
    public function editColorView(Request $request)
    {
        $input = $request->all();
        if(!empty($input['is_checkbox'])){
            $checkInfo = $this->userInfoService->where('user_id',$input['id'])->first();
            if($checkInfo){
                $update = $this->userInfoService->where('user_id',$input['id'])->update(['color_view'=> '1']);
            }else{
                $create = $this->userInfoService->create(['id'=>(string) \Str::uuid(),'color_view'=> '1','user_id'=> $input['id']]);
            }
            $_SESSION["color_view"] = 1;
        }else{
            $checkInfo = $this->userInfoService->where('user_id',$input['id'])->first();
            if($checkInfo){
                $update = $this->userInfoService->where('user_id',$input['id'])->update(['color_view'=> '2']);
            }else{
                $create = $this->userInfoService->create(['id'=>(string) \Str::uuid(),'color_view'=> '2','user_id'=> $input['id']]);
            }
            $_SESSION["color_view"] = 2;
        }
        return array('success' => true, 'message' => 'Cập nhật thành công');
    }

    /**
     * Load màn hình thêm mới người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function add(Request $request)
    {
        $input = $request->all();
        $data = $this->userService->addUserDisplay($input);
        return view('Users::User.add', $data);
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
        return view('dashboard.users.edit');
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
        $create = $this->userService->store($input,$_FILES); 
        return $create;
    }
    /**
     * Load màn hình chỉnh sửa thông tin người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $data = $this->userService->editUser($input);
        return view('dashboard.users.edit',compact('data'));
    }

     /**
     * Xóa người dùng
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
                $this->userService->where('id',$id)->delete();
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
        $paginationHelper = new PaginationHelper();
        if($request['role'] == '' || $request['role'] == null){
            unset($request['role']);
        }
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $objResult = $this->userService->filter($param);
        $data['datas'] = $objResult;
        return view("dashboard.users.loadlist", $data)->render();
    }
     /**
     * hiển thị modal đổi mật khẩu
     *
     * @param Request $request
     *
     * @return view
     */
    public function changePass(Request $request)
    {
        $input = $request->all();
        $data['id'] = $input['id'];
        $data['email_acc'] = $input['email'];
        return view('dashboard.users.userInfor.edit',compact('data'));
    }
    /**
     * Cập nhật mật khẩu
     *
     * @param Request $request
     *
     * @return view
     */
    public function updatePass(Request $request)
    {
        $input = $request->all();
        if (Auth::guard('web')->attempt(['email' => $input['email_acc'],'password' => $input['password_old']])) {
            if($input['password_new'] != $input['password_retype_change']){
                return array('success' => false, 'message' => 'Nhập lại mật khẩu không khớp!');
            }
            $passNew = [
                'password'=> Hash::make($input['password_new']),
            ];
            $updatePass = $this->userService->where('id',$input['user_id'])->update($passNew);
            return array('success' => true, 'message' => 'Mật khẩu của bạn đã được thay đổi');
        } else {
            return array('success' => false, 'message' => 'Mật khẩu cũ chưa chính xác!');
        }
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatus(Request $request)
    {
        $input = $request->all();
        $users = $this->userService->where('id', $input['id'])->first();
        if(!empty($users)){
            $users->update(['status' => $input['status']]);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            return array('success' => false, 'message' => 'Không tìm thấy dữ liệu!');
        }
    }
}
