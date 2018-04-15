<?php

namespace App\Containers\Eta\Models;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Zone_type
 * @package App\Containers\Eta\Models
 */
class Zone_type extends Model
{


    /**
     * @var string
     */
    protected  $table = 'zone_type';


    public function GetPickTime()
    {
        return $this->belongsToMany('App\Containers\Eta\Models\Zone_peaktime');
    }
}
