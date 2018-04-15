<?php

namespace App\Containers\User\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;
use Illuminate\Database\Eloquent\Model;


class TempOtp extends Model
{

    protected  $table = 'tempOtp';
}
