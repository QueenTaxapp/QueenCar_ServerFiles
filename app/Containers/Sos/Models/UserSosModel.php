<?php

namespace App\Containers\Sos\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;

class UserSosModel extends UserModel
{
    protected  $table = 'User_Sos';

}
