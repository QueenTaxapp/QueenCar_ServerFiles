<?php

namespace App\Containers\Drivers\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Drivers\Models\HeroModel;
use App\Containers\Drivers\Models\HeroDetailsModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class HeroUpdateTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $id=$request->id;

        $use =HeroModel::find($id);

        $use->firstname = $request->firstName;
        $use->lastname = $request->lastName;
        $use->email = $request->email;

        $old= HeroModel::where('id','=',$id)->first();
        $oldpass=$old->password;

        if($oldpass == $request->pass) {

            $use->password = $request->pass;

        }
        else
        {
            $use->password = Hash::make($request->pass);
        }

        $use->phone_no = $request->phone_no;
        $use->username = $request->username;

        if ($request->hasFile('avatar')) {

            $destinationPath = public_path()."/assets/img/uploads"; //move(public_path() . "/apps/ios_push/iph_cert", $file_name . "." . $ext); upload path
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
            throw new ValidationException((new Message()),redirect()->to('hero/edit/'.$id)
                ->withErrors([trans('localization::errors.details_could_not_saved_in')].$use, 'default'));

            return array('success'=>"False",'message'=>"Details Couldn't Saved in".$use);

        }
        else
        {
            $update =$request->hero_update_id;
            $refArray=$request->ref;
$inc=0;
            foreach ($update as $update_id){

                if($update_id=='0')
                {
                        $ref=$refArray[$inc];

                            $temp_name="doc_".$ref;
                            $temp_pic="pic_".$ref;
                            $name=$request->$temp_name;
                            $document=$request->$temp_pic;

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

                            $details->hero_id = $id;
                            $details->name = $name;
                            $details->save();

                }
                else
                {
                    $ref=$refArray[$inc];

                    if ($request->hasFile('pic_'.$ref))
                    {
                        $findName="doc_".$ref;
                        $findPicture="pic_".$ref;

                            $document=$request->$findPicture;

                            $destinationPath = public_path()."/assets/img/uploads";
                            $extension =  $document->getClientOriginalExtension();
                            $fileName = rand(11111,99999).'.'.$extension; // renaming image
                            if(!$document->move($destinationPath,$fileName))
                            {
                                die('failed upload');
                            }

                        $details = HeroDetailsModel::where('id', $update_id)->first();
                        $details->path = asset("assets/img/uploads") . "/" . $fileName;
                        $details->name = $request->$findName;
                        $details->save();

                    }
                    elseif ($request->has('doc_'.$ref))
                    {
                        $findName="doc_".$ref;

                        $details = HeroDetailsModel::where('id', $update_id)->first();
                        $details->name = $request->$findName;
                        $details->save();
                    }

                    if ( ! $details->save())
                    {
                        throw new ValidationException((new Message()),redirect()->to('hero/edit/'.$id)
                            ->withErrors([trans('localization::errors.details_could_not_saved_in')].$details, 'default'));

                        return array('success'=>"False",'message'=>"Details Couldn't Saved in".$details);
                    }

                }
$inc++;
            }

        }
        return array('success'=>"TRUE",'message'=>trans('localization::errors.hero_updated_successfully'));
    }

}