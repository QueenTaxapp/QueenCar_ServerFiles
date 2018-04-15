<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Ship\Exceptions\CommonException;


/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiInsertUserImageTask extends Task
{
    /**
     * save profile picture
     * @param  Object $request
     * @param  String $imageName
     *
     * @return  String
     */
    public function run($request,$imageName)
    {                          

             if ($request->hasFile($imageName)) 
             {

                $destinationPath = public_path()."/assets/img/uploads";
                $extension =  $request->file($imageName)->getClientOriginalExtension();
                $fileName = time();
                $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                if(!$request->file($imageName)->move($destinationPath,$fileName))
                {
                    throw (new CommonException())->setValue('604',trans('localization::errors.604'));
                    
                }

                $name =asset("assets/img/uploads")."/".$fileName;

                return $name;
                
            }  

    }

}
