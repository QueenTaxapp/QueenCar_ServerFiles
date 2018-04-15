<?php

namespace App\Containers\Company\Models;

use App\Ship\Parents\Models\UserModel;


/**
 * Class CompanyAccountModel
 * @package App\Containers\Company\Models
 */
class CompanyAccountModel extends UserModel
{
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * @var string
     */
    protected  $table = 'CompanyAccounts';
}

