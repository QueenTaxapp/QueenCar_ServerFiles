<?php

namespace App\Containers\Admin\Webtasks;

use App\Containers\Admin\Models\UsersModel;


class NoOfUsersTask
{
  
    public function run()
    {
        $driverCount = array();
        $driverCount['value']     = UsersModel::select('id')->count();
        $driverCount['icon']      = 'person';
        $driverCount['subvalue']  = 'growth';
        return $driverCount;
    }
}