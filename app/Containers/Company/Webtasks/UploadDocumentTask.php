<?php

namespace App\Containers\Company\Webtasks;

use App\Containers\Admin\Models\DriversModel;

use App\Ship\Parents\Exceptions\Exception;

class UploadDocumentTask
{
  
    public function run($request,$docName,$tableName,$id,$uploadColumnName,$redirectPath)
    {
        if ($request->hasFile($docName)) 
        {
            
            $destinationPath = public_path()."/assets/img/company_documents"; //move(public_path() . "/apps/ios_push/iph_cert", $file_name . "." . $ext); upload path
            $extension =  $request->file($docName)->getClientOriginalExtension();
            $fileName = rand(11111,99999).'.'.$extension; // renaming image

            if($request->file($docName)->move($destinationPath,$fileName))
            {
                $path = asset("assets/img/company_documents")."/".$fileName;
                $tableName::where('id',$id)
                        ->update([$uploadColumnName=>$path]);
            }


        }
        else
        {
                // throw new ValidationException((new Message()),redirect()->to($redirectPath)
                    // ->withErrors([trans('localization::errors.file_upload_failed')].$use, 'default'));

        }

    }
}


