<?php

namespace App\Containers\Email\Webtasks;


use App\Ship\Parents\Actions\Action;
use Config;
use DB;
use App\Containers\Email\Models\EmailSettingsModel;



class RevertEmailTask 
{

    public function run($id)
    { 
        

        $revert = EmailSettingsModel::select('revert')->where('id','=',$id)->get();
       
        $revert = $revert[0]->revert;
        
        EmailSettingsModel::where('id','=',$id)->update(array('message' => $revert));  
       
        return  trans('localization::errors.reverted_successfully');
        // DB::table('911_Email')->where('id', '=', $id)
    	// ->update(array('message' => html_entity_decode($request['editor'], ENT_QUOTES) ));
    }
}