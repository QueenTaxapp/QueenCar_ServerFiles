<?php

namespace App\Containers\Email\Webtasks;

use App\Containers\Email\Models\EmailLangModel;
use App\Containers\Email\Models\EmailSettingsModel;
use App\Containers\Email\Webtasks\GetData;
use App\Ship\Parents\Actions\Action;
use Config;

/**
 * Class EmailAction
 * @package App\Containers\Email\Actions
 */
class NewEmailEditTask
{


    /**
     * to validate user
     * @param null $id
     * @return mixed
     */
    public function run($request)
    {

        $id = $request->id;
        $lang = $request->lang;
        $table = $request->table;

        if($table=="email"){
            $data= EmailSettingsModel::where('id','=',$id)->first();
        }else{
            $data= EmailLangModel::where('id','=',$id)->first();
        }
       
        return $data;
    }
}