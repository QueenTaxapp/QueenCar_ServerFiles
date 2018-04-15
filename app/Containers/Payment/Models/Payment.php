<?php

namespace App\Containers\Payment\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;


/**
 * Class Payment
 * @package App\Containers\Types\Models
 */
class Payment extends UserModel
{

    /**
     * @var string
     */
    protected  $table = 'payment';
}
