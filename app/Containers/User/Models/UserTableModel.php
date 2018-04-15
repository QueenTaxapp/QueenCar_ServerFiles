<?php

namespace App\Containers\User\Models;
use App\Ship\Parents\Models\UserModel;



class UserTableModel extends UserModel
{
    protected $dates = ['deleted_at'];
    protected  $table = 'User';

    public function user_detail()
    {
        return $this->hasOne('App\Containers\User\Models\UserDetail', 'user_id');
    }
}
