<?php

namespace App\Containers\User\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;



class Country extends UserModel
{

    protected  $table = 'country';
}
