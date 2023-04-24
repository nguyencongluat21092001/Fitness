<?php

namespace Modules\System\Dashboard\Category\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Category\Repositories\CategoryRepository;
use Str;

class CategoryService extends Service
{

    public function __construct(
        CategoryRepository $CategoryRepository
        )
    {
        parent::__construct();
        $this->CategoryRepository = $CategoryRepository;
    }

    public function repository()
    {
        return CategoryRepository::class;
    }

    public function store($input){
        if($input['id'] != ''){
            $arrData = [
                'cate'=> $input['cate'] ,
                'name_category'=> $input['name_category'] ,
                'code_category'=> $input['code_category'] ,
                'decision'=> $input['decision'] ,
                'current_status'=> !empty($input['is_checkbox_status'])?$input['is_checkbox_status']:null ,
            ];
            // dd($arrData);
            $create = $this->CategoryRepository->where('id',$input['id'])->update($arrData);
        }else{
            $arrData = [
                'id'=>(string)Str::uuid(),
                'cate'=> $input['cate'] ,
                'name_category'=> $input['name_category'] ,
                'code_category'=> $input['code_category'] ,
                'decision'=> $input['decision'] ,
                'current_status'=> !empty($input['is_checkbox_status'])?$input['is_checkbox_status']:null ,
            ];
            $create = $this->CategoryRepository->create($arrData);
        }
        
        return $create;
    }
    public function editCategory($arrInput){
        $getCategoryInfor = $this->repository->where('id',$arrInput['chk_item_id'])->first()->toArray();
        return $getCategoryInfor;
    }

}
