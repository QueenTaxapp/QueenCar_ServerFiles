<?php

namespace App\Containers\Drivers\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Drivers\Models\HeroModel;
use App\Containers\Drivers\Models\HeroDetailsModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class HeroAddTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $use = new HeroModel();

        $use->firstname = $request->firstName;
        $use->lastname = $request->lastName;
        $use->email = $request->email;
        $use->password = Hash::make($request->pass);
        $use->phone_no = $request->phone_no;
        $use->username = $request->username;
        $use->is_active = 0;
        $use->is_approve = 0;

            if ($request->hasFile('avatar')) {

                $destinationPath = public_path()."/assets/img/uploads";
                $extension =  $request->file('avatar')->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension; // renaming image
                if(!$request->file('avatar')->move($destinationPath,$fileName))
                {
                    die('failed upload');
                }
                $use->profile_pic=asset("assets/img/uploads")."/".$fileName;
            }

        $use->type = $request->type;
        $use->save();

        if ( ! $use->save())
            {
                throw new ValidationException((new Message()),redirect()->to('admin/hero/add')
                    ->withErrors([trans('localization::errors.details_could_not_saved_in')].$use, 'default'));

                return array('success'=>"False",'message'=>"Details Couldn't Saved in".$use);

            }
            else
            {      //   HeroDetails table

                if ($request->has('ref')) {

                    $refArray=$request->ref;

                    foreach($refArray as $value) {


                        $temp_name="doc_".$value;
                        $temp_pic="pic_".$value;
                        $name=$request->$temp_name;
                        $document=$request->$temp_pic;

                        //echo"<pre>";print_r($fileName);die();
                        if($document==""){

                        }
                        else
                        {
                            $destinationPath = public_path()."/assets/img/uploads";
                            $extension =  $document->getClientOriginalExtension();
                            $fileName = rand(11111,99999).'.'.$extension; // renaming image
                            if(!$document->move($destinationPath,$fileName))
                            {
                                die('failed upload');
                            }

                            $details = new HeroDetailsModel();
                            $data=HeroModel::where('email',$request->email)->first();

                            $id=$data->id;

                            $details->path=asset("assets/img/uploads")."/".$fileName;
//
                            $details->hero_id = $id;
                            $details->name = $name;
                            $details->save();

                            if ( ! $details->save())
                            {
                                throw new ValidationException((new Message()),redirect()->to('admin/hero/add')
                                    ->withErrors([trans('localization::errors.details_could_not_saved_in')].$details, 'default'));

                                return array('success'=>"False",'message'=>"Details Couldn't Saved in".$details);
                            }
                        }


                    }

                }



                    return array('success'=>"TRUE",'message'=>trans('localization::errors.hero_added_successfully'));
            }


    }

}