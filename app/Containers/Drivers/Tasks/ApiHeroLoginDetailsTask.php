<?php

namespace App\Containers\Drivers\Tasks;


use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Drivers\Models\HeroModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiHeroLoginDetailsTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {

        $heroes=HeroModel::where('email',$request->email)->orWhere('social_unique_id', $request->social_unique_id)->first();


        return $heroes;
    }

}