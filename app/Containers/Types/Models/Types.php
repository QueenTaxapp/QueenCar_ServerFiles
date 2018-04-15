<?php

namespace App\Containers\Types\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;


class Types extends UserModel
{

    protected  $table = 'Types';
}
