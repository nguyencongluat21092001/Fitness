<?php

namespace Modules\System\Dashboard\Signal\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\System\Dashboard\Users\Models\UserModel;
use Modules\System\Helpers\NclLibraryHelper;

class SignalModel extends Model
{
    protected $table = 'buy_signal';
    public $incrementing = false;
    public $sortable = ['order'];

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'type',
        'target',
        'stop_loss',
        'order',
        'status',
        'created_at',
        'updated_at',
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'id':
                $query->where('id', $value);
                return $query;
            case 'search':
                if(!empty($value)){
                    $query->where(function($sql) use($value){
                        $sql->where('title', 'like', "$value")
                        ->orWhere('target', 'like', "$value")
                        ->orWhere('stop_loss', 'like', "$value");
                    });
                }
                return $query;
            case 'type':
                if(!empty($value)){
                    $query->where('type', $value);
                }
                return $query;
            case 'fromdate':
                if(!empty($value)){
                    $query->where('created_at', '>=', date('Y-m-d H:i:s', strtotime(NclLibraryHelper::_ddmmyyyyToyyyymmdd($value, 3))));
                    return $query;
                }
            case 'todate':
                if(!empty($value)){
                    $query->where('created_at', '<=', date('Y-m-d H:i:s', strtotime(NclLibraryHelper::_ddmmyyyyToyyyymmdd($value, 2))));
                    return $query;
                }
            default: 
                return $query;
        }
    }

    public function users()
    {
        return $this->hasOne(UserModel::class, 'id', 'user_id');
    }
}