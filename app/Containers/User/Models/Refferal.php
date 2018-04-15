<?php

namespace App\Containers\User\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;


/**
 * Class Refferal
 * @package App\Containers\User\Models
 */
class Refferal extends UserModel
{

    /**
     * @var string
     */
    protected  $table = 'referral';
}
