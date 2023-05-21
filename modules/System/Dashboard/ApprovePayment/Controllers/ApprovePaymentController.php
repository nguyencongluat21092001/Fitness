<?php

namespace Modules\System\Dashboard\ApprovePayment\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\ApprovePayment\Services\ApprovePaymentService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Users\Services\UserService;

class ApprovePaymentController extends Controller
{
    public function __construct(
        ApprovePaymentService $approvePaymentService,
        CategoryService $categoryService,
        UserService $userService
    ){
        $this->approvePaymentService = $approvePaymentService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
    }
    /**
     * Trang đích
     */
    public function index(Request $request)
    {
        return view('dashboard.approvePayment.index');
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        $input = $request->input();
        $data = array();
        $input['sort'] = 'order';
        // $input['sortType'] = 1;
        $objResult = $this->approvePaymentService->filter($input);
        foreach($objResult as $key => $value){
            $users = $this->userService->where('phone', $value->user_id_introduce)
                          ->orWhere('email', $value->user_id_introduce)->first();
            $objResult[$key]->user_name = isset($users->name) ? $users->name : '';
        }
        $data['datas'] = $objResult;
        return view('dashboard.approvePayment.loadList', $data)->render();
    }
    /**
     * Form thêm
     */
    public function create(Request $request)
    {
        $data['roles'] = $this->categoryService->where('cate', 'DM_VIP')->orderBy('order')->get();
        $data['order'] = $this->approvePaymentService->select('id')->count() + 1;
        return view('dashboard.approvePayment.add', $data);
    }
    /**
     * Form sửa
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $approvePayment = $this->approvePaymentService->where('id', $input['id'])->first();
        $data['users'] = $this->userService->where('role', $approvePayment->role_client)->get();
        $data['datas'] = $approvePayment;
        $data['roles'] = $this->categoryService->where('cate', 'DM_VIP')->orderBy('order')->get();
        $data['order'] = $this->approvePaymentService->select('id')->count() + 1;
        return view('dashboard.approvePayment.add', $data);
    }
    /**
     * Thêm hoặc Cập nhật
     */
    public function update(Request $request)
    {
        $input = $request->input();
        $create = $this->approvePaymentService->store($input); 
        return $create;
    }
    /**
     * Xoá
     */
    public function delete(Request $request)
    {
        $input = $request->input();
        $arrId = explode(',', $input['listitem']);
        foreach($arrId as $id){
            $this->approvePaymentService->where('id', $id)->delete();
        }
        return array('success' => true, 'message' => 'Xóa thành công!');
    }
    /**
     * Cập nhật thông tin màn hình index
     */
    public function updateApprovePayment(Request $request)
    {
        $input = $request->all();
        $data = $this->approvePaymentService->_updateApprovePayment($input, $input['id']);
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatusApprovePayment(Request $request)
    {
        $input = $request->all();
        $list = $this->approvePaymentService->where('id', $input['id']);
        if(!empty($list->first())){
            $list->update(['status' => $input['status']]);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            return array('success' => false, 'message' => 'Không tìm thấy dữ liệu!');
        }
    }
    /**
     * Lấy thông tin người dùng theo loại VIP
     */
    public function getUserVIP(Request $request)
    {
        $input = $request->all();
        $html = '';
        if(isset($input['role_client'])){
            $users = $this->userService->where('role', $input['role_client'])->where('status', 1)->get();
            $html .= '<option>--Chọn khách hàng--</option>';
            foreach($users as $user){
                $html .= '<option value="'.$user->id.'">'.$user->name.'</option>';
            }
        }
        return $html;
    }
}