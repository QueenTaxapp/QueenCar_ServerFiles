<?php

namespace App\Containers\Drivers\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;


class DriverDocument extends UserModel
{
    protected  $table = 'DriverDocument';

}