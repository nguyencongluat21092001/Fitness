<?php

namespace Modules\System\Dashboard\Signal\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Signal\Services\SignalService;

class SignalController extends Controller
{
    public function __construct(
        SignalService $signalService
    ){
        $this->signalService = $signalService;
    }
    /**
     * Trang đích
     */
    public function index(Request $request)
    {
        return view('dashboard.signal.index');
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        $input = $request->input();
        $data = array();
        $input['sort'] = 'order';
        $input['sortType'] = 1;
        $objResult = $this->signalService->filter($input);
        $data['datas'] = $objResult;
        return view('dashboard.signal.loadList', $data)->render();
    }
    /**
     * Form thêm
     */
    public function create(Request $request)
    {
        $input = $request->all();
        $data['order'] = $this->signalService->select('id')->count() + 1;
        return view('dashboard.signal.add', $data);
    }
    /**
     * Form sửa
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $signals = $this->signalService->where('id', $input['id'])->first();
        $data['datas'] = $signals;
        $data['order'] = $this->signalService->select('id')->count() + 1;
        return view('dashboard.signal.add', $data);
    }
    /**
     * Thêm hoặc Cập nhật
     */
    public function update(Request $request)
    {
        $input = $request->input();
        $create = $this->signalService->store($input); 
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
            $this->signalService->where('id', $id)->delete();
        }
        return array('success' => true, 'message' => 'Xóa thành công!');
    }
    /**
     * Cập nhật thông tin màn hình index
     */
    public function updateSignal(Request $request)
    {
        $input = $request->all();
        $data = $this->signalService->_updateSignal($input, $input['id']);
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatusSignal(Request $request)
    {
        $input = $request->all();
        $list = $this->signalService->where('id', $input['id']);
        if(!empty($list->first())){
            $list->update(['status' => $input['status']]);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            return array('success' => false, 'message' => 'Không tìm thấy dữ liệu!');
        }
    }
}