<?php

namespace App\Containers\Sms\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;

/**
 * Class SmsModel
 * @package App\Containers\Sms\Models
 */
class SmsModel extends UserModel
{
    protected $dates = ['deleted_at'];
    protected  $table = 'Sms';
}
