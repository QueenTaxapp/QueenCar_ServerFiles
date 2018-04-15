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
class ListFav
{

    /**
     * @param $data
     * @param $custom_parameter
     */
    public function run($data, $custom_parameter)
    {
        $fav = Fav::all();
        if($fav)
        {
            $obj = new \stdClass();
            $obj->message = "Favorite_Added_Successfully";
            $obj->favplace = [];
            $i=0;
            foreach($fav as $fv)
            {
                $obj->favplace[$i]["id"] = $fv->id;
                $obj->favplace[$i]["placeId"] = $fv->placeId;
                $obj->favplace[$i]["nickName"] = $fv->nickName;
                $obj->favplace[$i]["latitude"] = $fv->latitude;
                $obj->favplace[$i]["longitude"] = $fv->longitude;
                $i++;
            }
            $data['response']=$obj;
            return $data;
        }
        else
        {
            throw (new CommonException())->setValue('721',trans('localization::errors.721'));
        }


    }
}