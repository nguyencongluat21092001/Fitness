<?php

namespace Modules\System\Dashboard\DataFinancial\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\DataFinancial\Repositories\DataFinancialRepository;
use Str;

class DataFinancialService extends Service
{

    public function __construct(
        DataFinancialRepository $DataFinancialRepository
        )
    {
        $this->DataFinancialRepository = $DataFinancialRepository;
        parent::__construct();
    }

    public function repository()
    {
        return DataFinancialRepository::class;
    }

    public function store($input){
        if($input['id'] != ''){
            $arrData = [
                "user_id" => $_SESSION['id'],
                "code_cp" => $input['code_cp'],
                "exchange" => $input['exchange'],
                "code_category" => !empty($input['code_category'])?$input['code_category']:'',
                "ratings_TA" => $input['ratings_TA'],
                "identify_trend" =>$input['identify_trend'],
                "act" =>!empty($input['act'])?$input['act']:'',
                "trading_price_range" =>$input['trading_price_range'],
                "stop_loss_price_zone" =>$input['stop_loss_price_zone'],
                "ratings_FA" =>$input['ratings_FA'],
                "url_link" =>!empty($input['url_link'])?$input['url_link']:'test_link',
                "status" =>!empty($input['status'])?$input['status']:1,
                "created_at" => date("Y/m/d H:i:s"),
                "updated_at" => date("Y/m/d H:i:s")
            ];
            $create = $this->DataFinancialRepository->where('id',$input['id'])->update($arrData);
        }else{
            $arrData = [
                'id'=>(string)Str::uuid(),
                "user_id" => $_SESSION['id'],
                "code_cp" => $input['code_cp'],
                "exchange" =>$input['exchange'],
                "code_category" => $input['code_category'],
                "ratings_TA" => $input['ratings_TA'],
                "identify_trend" =>$input['identify_trend'],
                "act" =>$input['act'],
                "trading_price_range" =>$input['trading_price_range'],
                "stop_loss_price_zone" =>$input['stop_loss_price_zone'],
                "ratings_FA" =>$input['ratings_FA'],
                "url_link" =>!empty($input['url_link'])?$input['url_link']:'test_link',
                "status" =>!empty($input['status'])?$input['status']:1,
                "created_at" => date("Y/m/d H:i:s"),
                "updated_at" => date("Y/m/d H:i:s")
            ];
            $create = $this->DataFinancialRepository->create($arrData);
        }
        
        return $create;
    }
    public function edit($arrInput){
        $getUserInfor = $this->repository->where('id',$arrInput['chk_item_id'])->first()->toArray();
        return $getUserInfor;
    }
    
    /**
     * Cập nhật và thêm mới màn index
     */
    public function _updateDataFinancial($input, $id)
    {
        if(isset($input['order']) && !empty($input['order'])){
            $this->updateOrder($input);
        }
        $dataFinancialSingle = $this->repository->where('id', $id)->first();
        $dataFinancials = $this->repository->select('*')->where('code_category', $input['code_category'])->get();
        
        $code_cp = isset($dataFinancialSingle->code_cp) ? $dataFinancialSingle->code_cp : '';
        $exchange = isset($dataFinancialSingle->exchange) ? $dataFinancialSingle->exchange : '';
        $code_category = isset($dataFinancialSingle->code_category) ? $dataFinancialSingle->code_category : '';
        $ratings_TA = isset($dataFinancialSingle->ratings_TA) ? $dataFinancialSingle->ratings_TA : '';
        $identify_trend = isset($dataFinancialSingle->identify_trend) ? $dataFinancialSingle->identify_trend : '';
        $act = isset($dataFinancialSingle->act) ? $dataFinancialSingle->act : '';
        $trading_price_range = isset($dataFinancialSingle->trading_price_range) ? $dataFinancialSingle->trading_price_range : '';
        $stop_loss_price_zone = isset($dataFinancialSingle->stop_loss_price_zone) ? $dataFinancialSingle->stop_loss_price_zone : '';
        $ratings_FA = isset($dataFinancialSingle->ratings_FA) ? $dataFinancialSingle->ratings_FA : '';
        $url_link = isset($dataFinancialSingle->url_link) ? $dataFinancialSingle->url_link : '';
        $order = isset($dataFinancialSingle) && !empty($dataFinancialSingle->order) ? $dataFinancialSingle->order : count($dataFinancials) + 1;
        // $status = isset($dataFinancialSingle->status) ? $dataFinancialSingle->status : '';
        $param = [
            'user_id' => $_SESSION['id'],
            'code_cp' => isset($input['code_cp']) ? $input['code_cp'] : $code_cp,
            'exchange' => isset($input['exchange']) ? $input['exchange'] : $exchange,
            'code_category' => isset($input['code_category']) ? $input['code_category'] : $code_category,
            'ratings_TA' => isset($input['ratings_TA']) ? $input['ratings_TA'] : $ratings_TA,
            'identify_trend' => isset($input['identify_trend']) ? $input['identify_trend'] : $identify_trend,
            'act' => isset($input['act']) ? $input['act'] : $act,
            'trading_price_range' => isset($input['trading_price_range']) ? $input['trading_price_range'] : $trading_price_range,
            'stop_loss_price_zone' => isset($input['stop_loss_price_zone']) ? $input['stop_loss_price_zone'] : $stop_loss_price_zone,
            'ratings_FA' => isset($input['ratings_FA']) ? $input['ratings_FA'] : $ratings_FA,
            'url_link' => isset($input['url_link']) ? $input['url_link'] : $url_link,
            'order' => isset($input['order']) ? $input['order'] : $order,
            // 'status' => isset($input['status']) ? $input['status'] : $status,
        ];
        foreach($dataFinancials as $value){
            if(isset($input['code_cp']) && $input['code_cp'] === $value->code_cp){
                return array('success' => false, 'message' => 'Mã đối tượng đã tồn tại!');
            }
        }
        if(isset($dataFinancialSingle) && !empty($dataFinancialSingle)){
            $param['updated_at'] = date('Y-m-d H:i:s');
            $this->repository->where('id',$id)->update($param);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            $param['status'] = 1;
            $param['id'] = $id;
            $param['created_at'] = date('Y-m-d H:i:s');
            $this->repository->insert($param);
            return array('success' => true, 'message' => 'Thêm mới thành công!');
        }
    }

    /**
     * Cập nhật thứ tự
     */
    public function updateOrder($input)
    {
        $dataFinancial = $this->repository->where('id', $input['id'])->first();
        $code_category = !empty($dataFinancial) ? $dataFinancial->code_category : $input['code_category'];
        $query = $this->repository->select('*')->where('order', '>=', $input['order'])->where('code_category', $code_category)->orderBy('order');
        if(isset($input['id'])){
            $query = $query->where('id', '<>', $input['id']);
        }
        $order = $query->get();
        if(!empty($order)){
            $i = $input['order'];
            foreach($order as $value){
                $i++;
                $this->repository->where('id', $value->id)->update(['order' => $i]);
            }

        }
    }

}
