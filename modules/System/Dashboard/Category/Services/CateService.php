<?php

namespace Modules\System\Dashboard\Category\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Category\Repositories\CateRepository;
use Str;

class CateService extends Service
{

    public function __construct(
        CateRepository $CateRepository
        )
    {
        parent::__construct();
        $this->CateRepository = $CateRepository;
        parent::__construct();
    }

    public function repository()
    {
        return CateRepository::class;
    }

    public function store($input){
        if($input['id'] != ''){
            $arrData = [
                'name'=>$input['name'],
                'code_cate'=>$input['code_cate'],
                'decision'=>$input['decision'],
                'current_status'=>$input['is_checkbox_status']
            ];
            $create = $this->CateRepository->where('id',$input['id'])->update($arrData);
        }else{
            $arrData = [
                'id'=>(string)Str::uuid(),
                'name'=>$input['name'],
                'code_cate'=>$input['code_cate'],
                'decision'=>$input['decision'],
                'current_status'=>$input['is_checkbox_status']
            ];
            $create = $this->CateRepository->create($arrData);
        }
        
        return $create;
    }
    public function loadList($arrInput){
        $data = array();
        $param = $arrInput;
        $objResult = $this->repository->filter($param);
        $data['datas'] = $objResult;
        // dd($data);
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return $create;
    }
    public function editCategory($arrInput){
        $getCategoryInfor = $this->repository->where('id',$arrInput['chk_item_id'])->first()->toArray();
        return $getCategoryInfor;
    }

}
