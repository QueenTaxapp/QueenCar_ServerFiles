<?php

namespace App\Containers\Email\Webtasks;

use App\Containers\Email\Tasks\GetData;
use App\Ship\Parents\Actions\Action;
use Config;

use DB;
 
class UpdateEmailTask 
{    
    public function run($id,$request)
    { 
        
        
        DB::table('Email')->where('id', '=', $id)
    	->update(array('message' => html_entity_decode($request['editor'], ENT_QUOTES) ));
    
        return  trans('localization::errors.updated_successfully');
    }
}