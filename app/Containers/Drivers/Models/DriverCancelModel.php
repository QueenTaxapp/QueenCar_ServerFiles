<?php

namespace App\Containers\Drivers\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;

/**
 * Class DriverCancelModel
 * @package App\Containers\Drivers\Models
 */
class DriverCancelModel extends UserModel
{
    /**
     * @var string
     */
    protected  $table = 'driver_cancel';

}


