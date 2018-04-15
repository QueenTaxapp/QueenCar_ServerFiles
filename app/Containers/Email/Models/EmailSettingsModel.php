<?php

namespace App\Containers\Email\Models;

use App\Ship\Parents\Models\UserModel;


/**
 * Class EmailSettingsModel
 * @package App\Containers\Email\Models
 */
class EmailSettingsModel extends UserModel
{
    protected $dates = ['deleted_at'];
    protected  $table = 'Email';
}

