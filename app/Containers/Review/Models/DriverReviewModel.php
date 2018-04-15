<?php

namespace App\Containers\Review\Models;


use App\Ship\Parents\Models\UserModel;


/**
 * Class DriverReviewModel
 * @package App\Containers\Review\Models
 */
class DriverReviewModel extends UserModel
{
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * @var string
     */
    protected  $table = 'Driver_Review';
}
