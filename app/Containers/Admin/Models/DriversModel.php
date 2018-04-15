<?php

namespace App\Containers\Admin\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;



class DriversModel extends UserModel
{
    protected $dates = ['deleted_at'];
    protected  $table = 'Drivers';
}
