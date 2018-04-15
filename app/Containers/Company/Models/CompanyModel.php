<?php

namespace App\Containers\Company\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;


    class CompanyModel extends UserModel
    {
        protected $dates = ['deleted_at'];
        protected  $table = 'Company';
    }
