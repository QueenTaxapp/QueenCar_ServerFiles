<?php
/**
 * Created by PhpStorm.
 * User: server-team-1
 * Date: 11/3/17
 * Time: 7:28 PM
 */

namespace App\Containers\User\ApiTask;
use App\Containers\Referral\Models\ReferralModel;
use App\Containers\User\Models\Fav;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;


/**
 * Class CheckCode
 * @package App\Containers\Referral\ApiTask
 */
class AddFav
{

    /**
     * @param $data
     * @param $custom_parameter
     */
    public function run($data, $custom_parameter)
    {
        $fav = new Fav();
        $fav->nickName = $data['request']->nickName;
        $fav->placeId = $data['request']->placeId;
        $fav->latitude = $data['request']->latitude;
        $fav->longitude = $data['request']->longitude;
        if($fav->save())
        {
           $obj = new \stdClass();
            $obj->message = "Favorite_Added_Successfully";
            $obj->id = $fav->id;
            $obj->placeId = $fav->placeId;
            $obj->nickName = $fav->nickName;
            $obj->latitude = $fav->latitude;
            $obj->longitude = $fav->longitude;
            $data['response']=$obj;
            return $data;
        }
        else
        {
            throw (new CommonException())->setValue('721',trans('localization::errors.721'));
        }


    }
}