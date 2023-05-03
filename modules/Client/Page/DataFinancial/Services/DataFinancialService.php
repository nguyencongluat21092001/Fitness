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

}
