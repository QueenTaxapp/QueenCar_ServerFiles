<?php

namespace App\Containers\Sos\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;

class SosModel extends UserModel
{
    protected  $table = 'Sos';

}
