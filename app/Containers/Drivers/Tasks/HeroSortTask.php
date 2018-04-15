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
class HeroSortTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $page=Config::get('app.paginate');

        $request->session()->forget('hero_filter_value');
        $request->session()->forget('hero_filter_type');

        $value = $request->heroValue;
        $type = $request->heroType;

        $request->session()->put('value', $value);
        $request->session()->put('type', $type);



        $query=HeroModel::select('911_Hero.*');

        if ($type == 'hero_id') {



            if ($request->submit && $request->submit == 'Download_Report') {

                $heroes = $query->orderBy('id',$value)->get();
                //$request->session()->put('content', $User." is Sorted by ".$type);

            }else {

                $heroes = $query->orderBy('id',$value)->paginate($page);

            }

        }
        elseif ($type == 'hero_name') {

            if ($request->submit && $request->submit == 'Download_Report') {
                $heroes = $query->orderBy('firstname', $value)->get();

            }else {
                $heroes = $query->orderBy('firstname', $value)->paginate($page);
            }
        }
        elseif ($type == 'hero_email') {

            if ($request->submit && $request->submit == 'Download_Report') {
                $heroes = $query->orderBy('email', $value)->get();
            }else {
                $heroes = $query->orderBy('email', $value)->paginate($page);
            }
        }
        elseif ($type == 'hero_username') {


            if ($request->submit && $request->submit == 'Download_Report') {
                $heroes = $query->orderBy('username', $value)->get();
            }else {
                $heroes = $query->orderBy('username', $value)->paginate($page);
            }
        }

        return $heroes;

    }

}