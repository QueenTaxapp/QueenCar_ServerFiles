<?php

namespace App\Containers\Admin\Webtasks;

use App\Containers\Admin\Models\AdminDetailsModel;
use App\Containers\Admin\Tasks\Message;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\AdminModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class AdminProfileUpdateTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {

        $use =AdminModel::where('id',$request->id)->first();

        $use->firstname = $request->firstName;
        $use->lastname = $request->lastName;

        $use->email = $request->email;

        if(!empty($request->password)){
            $use->password = Hash::make($request->password);
        }

        $use->phone_number = $request->phone_number;
        $use->language  = $request->admin_language;

        if ($request->hasFile('profile_pic')) {
           // echo "<pre>";print_r($request->profile_pic);die();
            $file = array('profile_pic' =>  $request->file('profile_pic'));
            $destinationPath = public_path()."/assets/img/uploads";
            $extension =  $request->file('profile_pic')->getClientOriginalExtension();
            $fileName = rand(11111,99999).'.'.$extension; // renaming image
            if(!$request->file('profile_pic')->move($destinationPath,$fileName))
            {
                die('failed upload');
            }
            $use->profile_pic=asset("assets/img/uploads")."/".$fileName;
        }

        $use->save();

        if ( ! $use->save())
            {
                throw new ValidationException((new Message()),redirect()->to('admin/add')
                    ->withErrors([trans('localization::errors.details_could_not_saved_in')].$use, 'default'));

                return array('success'=>"False",'message'=>"Details Couldn't Saved in".$use);

            }
            else
            {
                //   AdminDetails table
                $details =AdminDetailsModel::where('admin_id',$request->id)->first();


                //print_r($id);die();
                $details->address = $request->address;
                $details->country = $request->country;
                $details->postalcode = $request->pincode;
                $details->timezone = $request->timezone;
                $details->save();


                    if ( ! $details->save())
                    {
                        throw new ValidationException((new Message()),redirect()->to('admin/add')
                            ->withErrors([trans('localization::errors.details_could_not_saved_in')].$details, 'default'));

                        return array('success'=>"False",'message'=>"Details Couldn't Saved in".$details);
                    }

                $obj = new AdminUpdateTask;

                $obj->update_language($request->id,$request->admin_language);

                $array=array('module'=>array(),'sub_module'=>array());
                file_put_contents(public_path('/privileges/admins/admin'.$use->id.'.json'),json_encode($array));

                return array('success'=>"TRUE",'message'=>trans('localization::errors.admin_updated_successfully'));
            }


    }

}