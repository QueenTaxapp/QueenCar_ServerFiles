<?php

namespace App\Containers\User\Webtasks;

use App\Ship\Parents\Tasks\Task;



class ApiInsertImageTask extends Task
{

    /**
     * to insert image
     * @param $request
     * @param $id
     * @param $className
     * @param $imageName
     * @param $fieldName
     * @return string
     */
    public function run($request, $id, $className, $imageName, $fieldName)
    {                          

             if ($request->hasFile($imageName)) 
             {

                $destinationPath = public_path()."/assets/img/uploads";
                $extension =  $request->file($imageName)->getClientOriginalExtension();
                $fileName = time();
                $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                if(!$request->file($imageName)->move($destinationPath,$fileName))
                {
                   // throw (new CommonException())->setValue('604',trans('localization::errors.604'));
                    
                }

                $name = asset("assets/img/uploads")."/".$fileName;

                $className::where('id','=',$id)
                    ->update([$fieldName => $name]);

                return $name;
                
            }  

    }

}
