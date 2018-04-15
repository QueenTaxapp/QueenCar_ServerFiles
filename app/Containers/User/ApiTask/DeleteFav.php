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
 * Class DeleteFav
 * @package App\Containers\User\ApiTask
 */
class DeleteFav
{

    /**
     * @param $data
     * @param $custom_parameter
     */
    public function run($data, $custom_parameter)
    {
        if($data['request']->favid == null)
        {
            throw (new CommonException())->setValue('724',trans('localization::errors.724'));
        }
        $fav = Fav::find($data['request']->favid);
        if($fav)
        {
            $fav->delete();
            $obj = new \stdClass();
            $obj->message = "Favorite_Deleted_Successfully";
            $obj->id = $fav->id;
            $data['response']=$obj;
            return $data;
        }
        else
        {
            throw (new CommonException())->setValue('726',trans('localization::errors.726'));
        }


    }
}