<?php

namespace App\Containers\Promocode\Models;
use App\Containers\Stripe\Models\StripeAccount;
use App\Ship\Parents\Models\UserModel;


/**
 * Class PromoCodeHistoryModel
 * @package App\Containers\Promocode\Models
 */
class PromoCodeHistoryModel extends UserModel
{

    protected  $table = 'promo_code_history';
}
