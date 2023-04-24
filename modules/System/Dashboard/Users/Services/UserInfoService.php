<?php

namespace Modules\System\Dashboard\Users\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Users\Repositories\UserInfoRepository;
use Str;

class UserInfoService extends Service
{
    private $baseDis;
    public function __construct()
    {
        parent::__construct();
    }

    public function repository()
    {
        return UserInfoRepository::class;
    }

}
