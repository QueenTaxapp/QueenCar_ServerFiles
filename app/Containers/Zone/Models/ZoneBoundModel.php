<?php

namespace App\Containers\Zone\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;


/**
 *
 */
class ZoneBoundModel extends UserModel
{
    protected $dates = ['deleted_at'];
    protected  $table = 'zone_bound';
}
