<?php

namespace Modules\System\Dashboard\Blog\Services;

use Modules\Base\Service;
use Modules\System\Dashboard\Blog\Repositories\BlogRepository;
use Modules\System\Dashboard\Blog\Services\BlogDetailService;
use Modules\System\Dashboard\Blog\Services\BlogImagesService;
use Illuminate\Support\Facades\Hash;
use Modules\Base\Library;
use DB;
use Str;

class BlogService extends Service
{
    private $baseDis;
    public function __construct(
        BlogImagesService $blogImagesService,
        BlogDetailService $blogDetailService,
        BlogRepository $blogRepository
        )
    {
        parent::__construct();
        $this->blogImagesService = $blogImagesService;
        $this->blogDetailService = $blogDetailService;
        $this->blogRepository = $blogRepository;
        $this->baseDis = public_path("file-image-client\blogs") . "\\";
    }

    public function repository()
    {
        return BlogRepository::class;
    }
     /**
     * cập nhật bài viết
     */
    public function store($input,$file){
        $random = Library::_get_randon_number();
        $code_blog = date("Y") . '_' . date("m") . '_' . date("d") . "_" . date("H") . date("i") . date("u") . $random;
        DB::beginTransaction();
        // try{
            $image_old = null;
            if($input['id'] != ''){
                $user = $this->UserRepository->where('id',$input['id'])->first();
                $image_old = $user->avatar;
            }
            if(isset($file) && $file != []){
                $arrFile = $this->uploadFile($input,$file,$image_old);
            }
            // array data users
            $arrBlog = [
                'user_id' => $_SESSION['id'],
                'code_blog' => $code_blog,
                'code_category' => $input['code_category'],
                'status' => $input['is_checkbox_status'],
                'created_at' => date("Y/m/d"),
                'updated_at' => date("Y/m/d")
            ];
            $arrBlogDetails = [
                'title'=>$input['title'],
                'decision'=>$input['decision'],
                'rate'=> 5
            ];
            // dd($arrBlog,$arrBlogDetails);
            if($input['id'] != ''){

            }else{
                //Create Blog
                $arrBlog['id']= (string)Str::uuid();
                $createBlog = $this->create($arrBlog);
                //Create Blog details
                $arrBlogDetails['id']= (string)Str::uuid();
                $arrBlogDetails['code_blog'] = $code_blog;
                $createBlogDetails = $this->blogDetailService->create($arrBlogDetails);
                // create image Blog
                if(!empty($arrFile) && $arrFile != []){
                    $i = 1;
                    foreach($arrFile as $imageValue){
                        $imageNew = trim($imageValue, "!~!");
                        $name = explode("!~!", $imageNew);
                        $arrImages = [
                            'id'=> (string)Str::uuid(),
                            'code_blog'=> $code_blog,
                            'name'=> $name[1],
                            'name_image'=> $imageValue,
                            'order_image'=> $i,
                            'created_at' => date("Y/m/d"),
                            'updated_at' => date("Y/m/d")
                        ];
                        $createImage = $this->blogImagesService->create($arrImages);
                        $i++;
                    }
                }
            }
            DB::commit();
            return true;
        // } catch (\Exception $e) {
        //      DB::rollBack();
        //     return array('success' => false, 'message' => (string) $e->getMessage());
        // }
    }
    // /**
    //  * Tải ảnh vào thư mục
    //  */
    public function uploadFile($input,$file,$image_old)
    {
            $path = $this->baseDis;
            $old_path = $path.$image_old;
            if (file_exists($old_path)) {
                @unlink($old_path);
            }
            foreach($file as $attValue){
                $fileName = $attValue['name'];
                $random = Library::_get_randon_number();
                $fileName = Library::_replaceBadChar($fileName);
                $fileName = Library::_convertVNtoEN($fileName);
                $sFullFileName = date("Y") . '_' . date("m") . '_' . date("d") . "_" . date("H") . date("i") . date("u") . $random . "!~!" . $fileName;
                move_uploaded_file($attValue['tmp_name'], $path . $sFullFileName);
                $arrImage[] =  $sFullFileName;
            }
            return $arrImage;
    }
    // public function editUser($arrInput){
    //     $getUserInfor = $this->repository->where('id',$arrInput['chk_item_id'])->first()->toArray();
    //     $userInfo = $this->UserInfoService->where('user_id',$arrInput['chk_item_id'])->first();
    //     $getUserInfor['company'] = !empty($userInfo->company)?$userInfo->company:null;
    //     $getUserInfor['position'] = !empty($userInfo->position)?$userInfo->position:null;
    //     $getUserInfor['date_join'] = !empty($userInfo->date_join)?$userInfo->date_join:null;
    //     return $getUserInfor;
    // }

}
