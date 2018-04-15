<?php

namespace App\Containers\Drivers\Tasks;

//use Illuminate\Http\Request;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Containers\Drivers\Models\HeroModel;
use App\Containers\Drivers\Models\HeroDetailsModel;
use Illuminate\Support\Facades\Hash;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class HeroSearchTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {

        $page=Config::get('app.paginate');

        $request->session()->forget('value');
        $request->session()->forget('type');

        $value = $request->hero_filter_value;
        $type = $request->hero_filter_type;
        $request->session()->put('hero_filter_value', $value);
        $request->session()->put('hero_filter_type', $type);

        $query=HeroModel::select('911_Hero.*');

        if ($type == 'hero_id') {

            if ($request->submit && $request->submit == 'Download_Report') {

                $heroes = $query->where('id', $value)->get();

            }else {

                $heroes = $query->where('id', $value)->paginate($page);

            }
        } elseif ($type == 'hero_name') {

            if ($request->submit && $request->submit == 'Download_Report') {

                $heroes = $query->where('firstname', 'like', '%' . $value . '%')->get();

            }else {

                $heroes = $query->where('firstname', 'like', '%' . $value . '%')->paginate($page);

            }
        }
        elseif ($type == 'hero_email') {

            if ($request->submit && $request->submit == 'Download_Report') {

                $heroes = $query->where('email', 'like', '%' . $value . '%')->get();

            }else {

                $heroes = $query->where('email', 'like', '%' . $value . '%')->paginate($page);

            }
        }
        elseif ($type == 'hero_username') {

            if ($request->submit && $request->submit == 'Download_Report') {

                $heroes = $query->where('username', 'like', '%' . $value . '%')->get();

            }else {

                $heroes = $query->where('username', 'like', '%' . $value . '%')->paginate($page);
            }
        }

        return $heroes;
    }

}