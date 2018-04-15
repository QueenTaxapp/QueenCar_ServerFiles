<?php

namespace App\Containers\Promocode\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;



class PromocodeModel extends UserModel
{
    protected $dates = ['deleted_at'];
    protected  $table = 'Promo_code';
}
