<?php

namespace App\Containers\User\Actions;


use App\Ship\Parents\Actions\Action;
use App\Containers\User\Tasks\SaveUserTask;
use Hash;
use Request;

class SaveUserAction extends Action
{
    
     public function run($request)
     {      

        $user = $this->call(SaveUserTask::class,[$request]);

        return $user;

     }
}