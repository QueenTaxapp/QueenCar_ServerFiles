<?php

namespace App\Containers\Drivers\Tasks;

//use Illuminate\Http\Request;
use App\Containers\Admin\Tasks\Message;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Drivers\Models\HeroModel;
use App\Containers\Drivers\Models\HeroDetailsModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class HeroEditTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $id=$request->id;

        $data=HeroModel::where('id',$id)->get();
        $datad=HeroDetailsModel::where('hero_id',$id)->get();
        $result=array('hero'=>$data,'herodtl'=>$datad);

        if (!$data)
        {
            throw new ValidationException((new Message()),redirect()->to('admin/hero/view')
                ->withErrors([trans('localization::errors.error_in_sql_statement')], 'default'));

            return array('success'=>"False",'message'=>"Error In SQL Statement..!");
        }

        return $result;
    }

}