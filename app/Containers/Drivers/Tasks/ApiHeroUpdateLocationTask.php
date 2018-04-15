<?php

namespace App\Containers\Drivers\Tasks;

use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Tasks\Task;
use App\Containers\Drivers\Models\HeroPathDetailsModel;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiHeroUpdateLocationTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $id = $request->id;
        $token = $request->token;

        $latitude = $request->lat;
        $longitude = $request->long;

        $hero = HeroPathDetailsModel::where('hero_id', $id)->first();


        if (!$hero) {

            throw(new CommonException())->setValue("612",trans('localization::errors.612'));
        }
        else{


            if($hero->lat != $latitude || $hero->long != $longitude){

                $old_lat=$hero->lat;
                $old_long=$hero->long;
                $hero->old_lat = $old_lat;
                $hero->old_long = $old_long;
                $hero->lat = $latitude;
                $hero->long = $longitude;
                $hero->save();

            }

        }

        return $hero;
    }

}