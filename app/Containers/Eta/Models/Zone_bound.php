<?php

namespace App\Containers\Eta\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;


/**
 * Class Zone_bound
 * @package App\Containers\Eta\Models
 */
class Zone_bound extends UserModel
{


    /**
     * @var string
     */
    protected  $table = 'zone_bound';
}
