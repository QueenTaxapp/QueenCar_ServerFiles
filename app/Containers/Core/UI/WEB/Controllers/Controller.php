<?php

namespace App\Containers\Core\UI\WEB\Controllers;


use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;
use App\Containers\Admin\Actions\AdminAction;

use \Cache;
use App\Containers\User\Actions\SaveUserAction;
use App\TestingModel;
use App\Containers\User\UI\WEB\Requests\UserAddRequest;
use App\Containers\User\Actions\UserViewAction;
use App\Containers\User\Actions\RetriveUserAction;
use App\Containers\User\UI\WEB\Requests\ValidateRequest;
use App\Containers\User\Actions\UpdateUserAction;
use App\Containers\User\Actions\ApproveDeclineUserAction;
use App\Containers\User\Actions\DeleteUserAction;


class Controller extends WebController
{

    /**
    * createuser
    * @param  object $request 
    * @return view  User::AddUser
    */

    public function viewmodule(Request $request)
    {
        
        $title = trans('localization::Title.user');
        $object = json_decode(file_get_contents(app_path('Containers/Core/CoreJson/Core.json')));

        return view('core::UserView',['request' => $request,'title'=>$title,'object' => $object,'page' => 'core']);

    }



}
 