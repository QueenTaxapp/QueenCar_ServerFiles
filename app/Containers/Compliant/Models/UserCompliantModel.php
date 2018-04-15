<?php

namespace App\Containers\Compliant\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;



class UserCompliantModel extends UserModel
{
    protected $dates = ['deleted_at'];
    protected  $table = 'User_Compliant';
}