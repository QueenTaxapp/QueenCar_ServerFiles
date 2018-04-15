<?php

namespace App\Containers\Wallet\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;


/**
 * Class Payment
 * @package App\Containers\Types\Models
 */
class Wallet extends UserModel
{


    protected  $table = 'wallet';
}
