<?php

namespace App\Containers\Drivers\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Config;
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
class HeroViewTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run()
    {
        $page=Config::get('app.paginate');

        $data=HeroModel::select('911_Hero.*')->paginate($page);

        if ( ! $data)
            {
                throw new ValidationException((new Message()),redirect()->to('admin/hero/add')
                    ->withErrors([trans('localization::errors.error_in_sql_statement')], 'default'));

                return array('success'=>"False",'message'=>"Error In SQL Statement..!");
            }

        return $data;
    }

}