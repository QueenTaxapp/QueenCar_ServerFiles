<?php

namespace App\Containers\Drivers\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;

/**
 * Class DriverModel
 * @package App\Containers\Drivers\Models
 */
class DriverModel extends UserModel
{
    protected  $table = 'Drivers';
}

