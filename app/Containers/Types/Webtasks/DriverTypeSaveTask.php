<?php

namespace App\Containers\Types\Webtasks;

use App\Containers\Types\Models\Types;
use App\Ship\Parents\Tasks\Task;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class DriverTypeSaveTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {

        $use = new Types();

        $use->admin_reference = $request->typeAdmin;

        $use->name = $request->typeName;

        $use->is_active = 1;

        if ($request->hasFile('profile_pic')) {
            $file = array('profile_pic' =>  $request->file('profile_pic'));
            $destinationPath = public_path()."/assets/img/uploads";
            $extension =  $request->file('profile_pic')->getClientOriginalExtension();
            $fileName = rand(11111,99999).'.'.$extension; // renaming image
            if(!$request->file('profile_pic')->move($destinationPath,$fileName))
            {
                die('failed upload');
            }
            $use->icon=asset("assets/img/uploads")."/".$fileName;
        }

        $use->save();

        return array('success'=>"TRUE",'message'=>trans('localization::errors.type_added_successfully'));

    }

}