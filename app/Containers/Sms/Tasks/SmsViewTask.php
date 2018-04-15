<?php

namespace App\Containers\Sms\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Containers\Common\GetConfigs;
use App\Containers\Sms\Models\SmsSettingModel;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Config;
use App\Containers\Sms\Models\SmsModel;
use Illuminate\Validation\ValidationException;

/**
 * Class SmsViewTask
 * @package App\Containers\Sms\Tasks
 */
class SmsViewTask extends Task
{
    /**
     * used to return a details of sms view page
     * @return array|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws ValidationException
     */
    public function run()
    {
        $page = GetConfigs::getConfigs('paginate');

        $sms = SmsModel::select('Sms.*')->get();//paginate($page);

        $en_lang = SmsSettingModel::where('lang','en')->get();//paginate($page);

        $lang_en = [];

        foreach ($sms as $value){

            foreach ($en_lang as $lang_value){

                if($value->title == $lang_value->title){
                    $lang_en[$value->title] = $lang_value;
                }
            }

            if(!array_key_exists($value->title,$lang_en)){
                $lang_en[$value->title] = $value;
            }

        }

        $lang_spa = [];

        $spa_lang = SmsSettingModel::where('lang','spa')->get();//paginate($page);

        foreach ($sms as $value){

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

        //echo "<pre>";print_r($data);die();
        if ( ! $sms)
        {
            throw new ValidationException((new Message()),redirect()->to('admin/view')
                ->withErrors([trans('localization::errors.internal_server_error')], 'default'));

            //return array('success'=>"False",'message'=>"Error In SQL Statement..!");
        }

        //$data = array('sms'=>$sms,'sms_lang'=>$sms_lang);
        return $data;
    }

}