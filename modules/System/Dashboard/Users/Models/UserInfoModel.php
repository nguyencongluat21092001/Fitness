<?php

namespace Modules\System\Dashboard\Users\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfoModel extends Model
{
    protected $table = 'user_info';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'color_view',
        'company', 
        'position', 
        'date_join',
        'created_at'
    ];
}
