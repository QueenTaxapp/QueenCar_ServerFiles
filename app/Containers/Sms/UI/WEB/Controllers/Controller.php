<?php

namespace App\Containers\Sms\UI\WEB\Controllers;

use App\Containers\Email\Models\EmailLangModel;
use App\Containers\Email\Models\EmailSettingsModel;
use App\Containers\Sms\Actions\SmsInactiveAction;
use App\Ship\Parents\Controllers\WebController;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use App\Containers\Sms\Actions\SmsViewAction;
use App\Containers\Sms\Actions\SmsEditAction;
use App\Containers\Sms\Actions\SmsUpdateAction;
use App\Containers\Sms\Actions\SmsRevertAction;
use App\Containers\Sms\Actions\SmsActiveAction;

use Illuminate\Validation\CustomException;
use Illuminate\Validation\ValidationException;

/**
 * Class Controller
 * @package App\Containers\Sms\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * smsView
     * @param  object $request
     * @return view
     */
    public function smsView(Request $request )
    {
        $title = trans('localization::Title.sms');
        $page="sms_module";

        $result = $this->call(SmsViewAction::class, [$request]);

        return view('sms::SmsView',['request' => $request],['result' => $result,'title'=>$title ,'page'=>$page]);

    }

    /**
     * smsEdit
     * @param  object $request
     * @return view
     */
    public function smsEdit(Request $request )
    {
        $title = trans('localization::Title.sms');
        $page="sms_module";

        $result = $this->call(SmsEditAction::class, [$request]);

        return view('sms::SmsEdit',['request' => $request],['result' => $result,'title'=>$title ,'page'=>$page]);

    }

    /**
     * smsUpdate
     * @param  object $request
     * @return view
     */
    public function smsUpdate(Request $request )
    {

        $result = $this->call(SmsUpdateAction::class, [$request]);

        $request->session()->flash('success', $result);

        return Redirect::to("/admin/sms/view");


    }

    /**
     * smsRevert
     * @param  object $request
     * @return view
     */
    public function smsRevert(Request $request)
    {

        $id_value = $this->call(SmsRevertAction::class,[$request]);

        $result = array('success'=>"TRUE",'message'=>trans('localization::errors.sms_reverted_successfully'));

        $request->session()->flash('success', $result);

        return redirect()->route('admin/sms/edit',[$id_value['id'],$id_value['lang'],$id_value['table']]);

    }

    /**
     * smsActive
     * @param  object $request
     * @return view
     */
    public function smsActive(Request $request)
    {
        $result = $this->call(SmsActiveAction::class,[$request]);

        $request->session()->flash('success', $result);

        return Redirect::to("/admin/sms/view");
    }

    /**
     * smsInactive
     * @param  object $request
     * @return view
     */
    public function smsInactive(Request $request)
    {
       $result =  $this->call(SmsInactiveAction::class,[$request]);

        $request->session()->flash('success', $result);

        return Redirect::to("/admin/sms/view");
    }

}

