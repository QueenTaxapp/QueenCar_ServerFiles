<?php

namespace App\Containers\Admin\Webtasks;

use App\Containers\Admin\Tasks\Message;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\AdminDetailsModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use \Cache;
/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class AdminAddSaveTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {


        $id = Session::get('id');

        $AdminValues = Cache::get("adminDetails$id");

        $adminReference = $AdminValues['admin_key'];



        $reg_code=date('y').rand(100,999);
        $admin_key  = rand(1,999).rand(1,999);

        $use = new AdminModel();

        if($request->has('area_name'))
        {
            $use->area_name = $request->area_name;
        }

        $use->firstname = $request->firstName;
        $use->admin_key = $admin_key;
        $use->admin_reference = $adminReference;

        $use->lastname = $request->lastName;
        $use->registration_code  = $reg_code;
        $use->email = $request->email;
        $use->password = Hash::make($request->password);
        $use->phone_number = $request->phone_number;
        $use->emergency_number = $request->emergency_number;
        $use->is_active = 0;
        $use->language  = $request->admin_language;

        if ($request->hasFile('profile_pic')) {
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

        $use->role = $request->role;
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
                $details = new AdminDetailsModel();
                $data=AdminModel::where('email',$request->email)->first();

                $id=$data->id;
                //print_r($id);die();
                $details->admin_id =  $id;
                $details->address = $request->address;
                $details->country = $request->country;
                $details->postalcode = $request->pincode;
                $details->timezone = $request->timezone;

                if ($request->hasFile('document_one')) {
                    $destinationPath = public_path()."/assets/img/uploads";
                    $extension =  $request->file('document_one')->getClientOriginalExtension();
                    $fileName = rand(11111,99999).'.'.$extension; // renaming image
                    if(!$request->file('document_one')->move($destinationPath,$fileName))
                    {
                        die('failed upload');
                    }
                    $path=asset("assets/img/uploads")."/".$fileName;

                    $details->document_name = $request->doc_name_one;
                    $details->document =  $path;
                }

                $details->save();


                    if ( ! $details->save())
                    {
                        throw new ValidationException((new Message()),redirect()->to('admin/add')
                            ->withErrors([trans('localization::errors.details_could_not_saved_in')].$details, 'default'));

                        return array('success'=>"False",'message'=>"Details Couldn't Saved in".$details);
                    }

                $array=array('module'=>array("settings_module"),'sub_module'=>array());
                file_put_contents(public_path('/privileges/admins/admin'.$use->id.'.json'),json_encode($array));

                return array('success'=>"TRUE",'message'=>trans('localization::errors.admin_added_successfully'));
            }


    }

}