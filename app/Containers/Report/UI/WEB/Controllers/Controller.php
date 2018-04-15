<?php

namespace App\Containers\Report\UI\WEB\Controllers;
use App\Containers\Common\GetConfigs;
use App\Containers\Company\Models\CompanyModel;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Request\Models\RequestModel;
use App\Containers\Types\Models\Types;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Containers\Report\Webtasks\DriverRatingReportDownloadTask;
use App\Containers\Report\Webtasks\FinancialReportDownloadTask;
use App\Containers\Report\Webtasks\BusinessReportDownloadTask;
use App\Containers\Report\Webtasks\TravelReportDownloadTask;
use App\Containers\Report\Webtasks\ProviderPaymentReportDownloadTask;

use App\Containers\Report\Webtasks\ReteriveUsersOnAjax;
use App\Containers\Report\Webtasks\ReteriveDriversOnAjax;
use App\Containers\Report\Webtasks\LedgerReportDownloadTask;
use Illuminate\Validation\ValidationException;

use App\Containers\Admin\Webtasks\Message;




/**
 * Class Controller
 * @package App\Containers\Admin\UI\WEB\Controllers
 */
class Controller extends WebController
{

    public function driverRatingReportDownload(Request $request)
    {
        if($request->date_option == 'date_select')
        {

            if($request->has('start_date') && $request->has('end_date'))
            {


                if($request->start_date > $request->end_date)
                {
                    throw new ValidationException((new Message()),redirect()->back()
                        ->withErrors([trans('localization::errors.start_date_not_greater_than_end_date')], 'default'));
                }
            }
            else
            {
                throw new ValidationException((new Message()),redirect()->back()
                    ->withErrors([trans('localization::errors.start_date_and_end_date_required')], 'default'));
            }

        }

       $this->call(DriverRatingReportDownloadTask::class, [$request]);

    }

    public function ledgerReportDownload(Request $request)
    {
        if($request->date_option == 'date_select')
        {

            if($request->has('start_date') && $request->has('end_date'))
            {


                if($request->start_date > $request->end_date)
                {
                    throw new ValidationException((new Message()),redirect()->back()
                        ->withErrors([trans('localization::errors.start_date_not_greater_than_end_date')], 'default'));
                }
            }
            else
            {
                throw new ValidationException((new Message()),redirect()->back()
                    ->withErrors([trans('localization::errors.start_date_and_end_date_required')], 'default'));
            }

        }
        $this->call(LedgerReportDownloadTask::class, [$request]);

    }

    public function userNamesAjax(Request $request)
    {

                $this->call(ReteriveUsersOnAjax::class, [$request]);

    }

    public function driverNamesAjax(Request $request)
    {

        $this->call(ReteriveDriversOnAjax::class, [$request]);

    }

    public function adminReportViewPage(Request $request)
    {



        $users = UserTableModel::select('*')->get();
        $drivers = DriverModel::select('*')->get();
        $company = CompanyModel::select('*')->get();
        $types = Types::select('*')->get();

        $result = array('users'=>$users,'drivers'=>$drivers);

        $title= trans('localization::lang_view.reports');
        return view('report::ReportView',['result'=>$result,'company'=>$company,'types'=>$types,'page'=>"report_module",'title'=>$title]);

    }


    public function adminReportDownload(Request $request)
    {



        if($request->date_option == 'date_select')
        {

            if($request->has('start_date') && $request->has('end_date'))
            {


                if($request->start_date > $request->end_date)
                {
                    throw new ValidationException((new Message()),redirect()->back()
                        ->withErrors([trans('localization::errors.start_date_not_greater_than_end_date')], 'default'));
                }
            }
            else
            {
                throw new ValidationException((new Message()),redirect()->back()
                    ->withErrors([trans('localization::errors.start_date_and_end_date_required')], 'default'));
            }

        }
        //echo "<pre>";print_r($request->submit);die();

        $submit = $request->submit;

        if($submit == "financial_report"){

            $finance = $this->call(FinancialReportDownloadTask::class, [$request]);

        }elseif($submit == "business_report"){

            $business = $this->call(BusinessReportDownloadTask::class, [$request]);

        }elseif($submit == "travel_report"){

            $business = $this->call(TravelReportDownloadTask::class, [$request]);

        }elseif($submit == "provider_payment_report"){

            $business = $this->call(ProviderPaymentReportDownloadTask::class, [$request]);

        }


    }


}

