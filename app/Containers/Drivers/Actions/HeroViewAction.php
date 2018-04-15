<?php

namespace App\Containers\Drivers\Actions;

use App\Containers\Drivers\Tasks\DownloadReportTask;
use App\Containers\Drivers\Tasks\HeroSearchTask;
use App\Containers\Drivers\Tasks\HeroSortTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Tasks\Task;
use App\Containers\Drivers\Tasks\HeroViewTask;
use App\Ship\Parents\Requests\Request;

/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class HeroViewAction extends Action
{

    /**
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  mixed
     * @throws \App\Containers\Authorization\Exceptions\UserNotAdminException
     */
    public function run($request)
    {
        $request->session()->put('type',"");
        $request->session()->put('value',"");
        $request->session()->put('hero_filter_type',"");
        $request->session()->put('hero_filter_type',"");
$user="";
        if($request->has('heroType') && $request->has('heroValue')){
            $user = $this->call(HeroSortTask::class, [$request]);
            if($request->submit && $request->submit == 'Download_Report'){
                $user = $this->call(DownloadReportTask::class, [$request,$user]);
            }
        }
        elseif($request->has('hero_filter_type') && $request->has('hero_filter_type')){
            $user = $this->call(HeroSearchTask::class, [$request]);
            if($request->submit && $request->submit == 'Download_Report'){
                $user = $this->call(DownloadReportTask::class, [$request,$user]);
            }
        }
        else {
            $user = $this->call(HeroViewTask::class);
        }

        return $user;

    }
}