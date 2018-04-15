<?php

namespace App\Containers\Referral\Models;

use App\Ship\Parents\Models\UserModel;


/**
 * Class ReferralModel
 * @package App\Containers\Referral\Models
 */
class ReferralModel extends UserModel
{
    protected $dates = ['deleted_at'];
    protected  $table = 'referral';
}
