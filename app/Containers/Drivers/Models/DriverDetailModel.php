<?php

namespace App\Containers\Drivers\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;

class DriverDetailModel extends UserModel
{
    protected  $table = 'Driver_Details';

}

