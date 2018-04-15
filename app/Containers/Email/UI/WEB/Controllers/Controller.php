<?php

    namespace App\Containers\Email\UI\WEB\Controllers;

    use App\Containers\Common\GetConfigs;
    use App\Containers\Email\Models\EmailLangModel;
    use App\Containers\Email\Models\EmailSettingsModel;
    use App\Containers\Email\Webtasks\NewEmailEditTask;
    use App\Containers\Email\Webtasks\NewEmailRevertTask;
    use App\Containers\Email\Webtasks\NewEmailToggleTask;
    use App\Containers\Email\Webtasks\NewEmailUpdateTask;
    use App\Containers\Email\Webtasks\NewEmailViewTask;
    use App\Containers\Email\Webtasks\TrailEmailTask;
    use App\Ship\Parents\Controllers\WebController;

    use App\Containers\Email\Actions\EmailAction;

    use Illuminate\Http\Request;

    use App\Containers\Email\Actions\UpdateEmailAction;

    use App\Containers\Email\Actions\RevertEmailAction;

    use App\Containers\Email\Webtasks\ToggleStatusTask;

    use App\Containers\Email\Webtasks\EmailTask;

    use App\Containers\Email\Webtasks\UpdateEmailTask;

    use App\Containers\Email\Webtasks\RevertEmailTask;

    /**
     * Class Controller
     * @package App\Containers\Email\UI\WEB\Controllers
     */
    class Controller extends WebController
    {

        public function viewEmail(Request $request)
        {
            $data = $this->call(NewEmailViewTask::class, [$request]);

            //echo "<pre>";print_r($data);die();
            $title = trans('localization::Title.emails');
            $pageNumber = GetConfigs::getConfigs('paginate');
            $page="email_module";

            return view('email::emailsView',['request'=>$request,'title'=>$title,'values'=>$data, 'page'=>$page,'paginate'=>$pageNumber]);
        }

        public function editemail(Request $request)
        {
           // echo "<pre>";print_r($data);die();
            $data = $this->call(NewEmailEditTask::class,[$request]);

            $title = trans('localization::Title.emails');
            $page="email_module";

            return view('email::emailEditView',['request'=>$request,'title'=>$title,'value'=>$data, 'page'=>$page]);

        }

        public function updateEmail(Request $request)
        {
            //echo "<pre>";print_r($request->all());die();
            $id_data = $this->call(NewEmailUpdateTask::class,[$request]);

            $result = array('success'=>"TRUE",'message'=>trans('localization::errors.email_updated_successfully'));
            $request->session()->flash('success', $result);
            //die();
             return redirect()->route('editemail',[$id_data['id'],$id_data['lang'],$id_data['table']]);
        }

        public function revertEmail(Request $request)
        {
            $id_data = $this->call(NewEmailRevertTask::class,[$request]);

            $result = array('success'=>"TRUE",'message'=>trans('localization::errors.email_reverted_successfully'));
            $request->session()->flash('success', $result);
            //return $return_value;

             //$request->session()->flash('success', $result);
            return redirect()->route('editemail', [$id_data['id'],$id_data['lang'],$id_data['table']]);

        }

        public function toogleStatus(Request $request)
        {
            $result = $this->call(NewEmailToggleTask::class,[$request]);

            $request->session()->flash('success', $result);

            return redirect()->route('email');
        }


        public function emailTrail(Request $request)
        {

            $id = $request->id;
            $lang = $request->lang;
            $table = $request->table;


            $result = $this->call(TrailEmailTask::class,[$id,$lang,$table]);

            $toEmailAddress = GetConfigs::getConfigs('help_email');
            $result = array('success'=>"TRUE",'message'=>trans('localization::lang_view.trail_email_sent_to_your_email_address').$toEmailAddress);
            $request->session()->flash('success', $result);
             return redirect()->back();
        }
    }

  // 3
  //   $welcomeEmailTrialValue = array('driverName'=>'sample driver Name',
  //   'registrationCode' => '12345',
  //   'emailAddress' => 'sampledriver@gmail.com',
  //   'phoneNumber' => '+910000000000',
  //   'carModel' => 'sample car model',
  //   'carNumber' => '1234',
  //  );


//  5
//   $welcomeEmailTrialValue = array('requestId'=>'sample driver Name',
//   'userName' => 'Customer Name',
//   'driverName' => 'Driver Name',
//   'userPhoneNumber' => '+910000000000',
//   'userEmailAddress' => 'customer@gmail.com',
//   'driverPhoneNumber' => '+910000011111',
//   'driverEmailAddress' => 'driver@gmail.com',
//  );

//  6
// $welcomeEmailTrialValue = array('requestId'=>'sample driver Name',
//           'userName' => 'Customer Name',
//           'driverName' => 'Driver Name',
//           'userPhoneNumber' => '+910000000000',
//           'driverPhoneNumber' => '+910000011111',
//           'userEmailAddress' => 'customer@gmail.com',
//           'driverEmailAddress' => 'driver@gmail.com',

//           'basePrice' => '10.00',
//           'base_distance' => '1',
//           'distanceCost' => '10.00',
//           'timeCost' => '10.00',
//           'waitingPrice' => '10.00',
//           'serviceTax' => '10.00',

//           'serviceTaxPercentage' => '1%',
//           'referralBonus' => '0',
//           'promoBonus' => '0',
//           'serviceFee' => '0',
//           'driverAmount' => '10.00',
//           'total' => '60.00',


//          );
// 9
// $welcomeEmailTrialValue = array('name'=>'Company  Name',
// 'registrationCode' => '12345',
// 'ownerName' => 'Owner Name',
// 'emailAddress' => 'companyOwner@gmail.com',
// 'landlineNumber' => '0422123456',
// 'vatNumber' => '12345',

// );

//12
// $welcomeEmailTrialValue = array('firstName'=>'Driver First name',
// 'lastName' => 'Driver Last name',
// 'emailAddress' => 'driver@gmail.com',
// 'phoneNumber' => '+910000000000',
// 'documentName' => 'Document Name',
// 'documentExpiry' => '2018-01-24 00:00:00',

// );


// print
// $jsonEncode = json_encode($welcomeEmailTrialValue);

// echo "<pre>";
// print_r($jsonEncode);
// die();
