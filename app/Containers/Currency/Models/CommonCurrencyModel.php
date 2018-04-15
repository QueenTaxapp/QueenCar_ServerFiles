<?php

namespace App\Containers\Currency\Models;
use App\Ship\Parents\Models\UserModel;



class CommonCurrencyModel extends UserModel
{
    protected $dates = ['deleted_at'];
    protected  $table = 'common_currency';
}
