<?php

namespace Modules\System\Dashboard\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\System\Dashboard\Users\Models\UserInfoModel;

class UserModel extends Model
{
    protected $table = 'users';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'address',
        'phone',
        'email',
        'avatar',
        'password',
        'dateBirth',
        'role'
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'search':
                $this->value = $value;
                return $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->value . '%');
                });
                return $query;
            case 'role':
                $query->where('role', $value);
                return $query;
            default:
                return $query;
        }
    }
    public function userInfo()
    {
        return $this->belongsTo(UserInfoModel::class, 'id', 'user_id');
    }
}
