<?php

namespace App\Containers\Review\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;

class UserReviewModel extends UserModel
{
    protected $dates = ['deleted_at'];
    protected  $table = 'User_Review';
}
