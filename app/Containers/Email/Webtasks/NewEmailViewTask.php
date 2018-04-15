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
class NewEmailViewTask
{


    /**
     * to validate user
     * @param null $id
     * @return mixed
     */
    public function run($request)
    {

        $email = EmailSettingsModel::select('*')->get();

        $en_lang = EmailLangModel::where('lang','en')->get();//paginate($page);

        $lang_en = [];

        foreach ($email as $value){

            foreach ($en_lang as $lang_value){

                if($value->title == $lang_value->title){
                    $lang_en[$value->title] = $lang_value;

                }
            }

            if(!array_key_exists($value->title,$lang_en)){
                $lang_en[$value->title] = $value;
            }

        }

        $spa_lang = EmailLangModel::where('lang','spa')->get();//paginate($page);

        $lang_spa = [];

        foreach ($email as $value){

            foreach ($spa_lang as $lang_value){

                if($value->title == $lang_value->title){
                    $lang_spa[$value->title] = $lang_value;

                }
            }

            if(!array_key_exists($value->title,$lang_spa)){
                $lang_spa[$value->title] = $value;
            }

        }

        $data = array('en'=>$lang_en,'spa'=>$lang_spa);
       
        return $data;
    }
}