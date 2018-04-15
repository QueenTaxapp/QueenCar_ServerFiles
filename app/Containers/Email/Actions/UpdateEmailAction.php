<?php

namespace App\Containers\Email\Actions;

use App\Containers\Email\Tasks\GetData;
use App\Ship\Parents\Actions\Action;
use Config;

use DB;


/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
 
class UpdateEmailAction extends Action
{

    /**
     * UpdateEmailAction 
     * @param string $id
     * @param object $request 
     * 
     * @return  array
     */
    public function run($id,$request)
    { 

        DB::table('Email')->where('id', '=', $id)
    	->update(array('message' => html_entity_decode($request['editor'], ENT_QUOTES) ));
    
        return  trans('localization::errors.updated_successfully');
    }
}