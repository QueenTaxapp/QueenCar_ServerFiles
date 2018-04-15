<?php

namespace App\Containers\Sms\Models;
use App\Ship\Parents\Models\UserModel;

/**
 * Class SmsModel
 * @package App\Containers\Sms\Models
 */
class SmsSettingModel extends UserModel
{
    protected $dates = ['deleted_at'];
    protected  $table = 'sms_setting';
}
