<?php

    namespace App\Containers\Review\UI\WEB\Controllers;

    use App\Ship\Parents\Controllers\WebController;

    use Illuminate\Http\Request;

    use App\Containers\Email\Actions\ToggleStatusAction;

    use Illuminate\Support\Facades\Session;

    use App\Containers\Company\Models\CompanyModel;

    use App\Containers\Company\Webtasks\ToggleStatusTask;

    use Illuminate\Database\Eloquent\SoftDeletes;

    use App\Containers\Company\Webtasks\ReportDownloadTask;

    use App\Containers\Company\Webtasks\StatusConvertTask;

    use App\Containers\Company\UI\WEB\Requests\CompanyAddRequest;

    use Illuminate\Support\Facades\Hash;

    use App\Containers\Common\GetConfigs;

    use App\Containers\Review\Models\UserReviewModel;

    use App\Containers\Review\Models\DriverReviewModel;


    use Illuminate\Support\Facades\DB;

    use App\Containers\Review\UI\WEB\Requests\SaveEditUserReviewRequest;

    use App\Containers\Review\Webtasks\SaveEditReviewTask;

    use App\Containers\Review\Webtasks\ReviewTask;

    class Controller extends WebController
    {

        public function userReview(Request $request)
        {

            $tableName = 'App\Containers\Review\Models\UserReviewModel';

            $title = 'user_review_report';

            $user = $this->call(ReviewTask::class, [$tableName,$request,$title]);

            $title = trans('localization::title.user_reviewed_by_driver');
            $page="review_module";
            return view('review::ReviewUserView',['result'=>$user,'types' =>$user,'request'=>$request, 'title'=>$title,'page'=>$page]);

        }


        public function editUserReview(Request $request)
        {

            $userReviewModelValues = UserReviewModel::select('rating','comment','user_id')->where('id',$request->id)->first();

            //$title = trans('localization::title.user_review');
            $title = trans('localization::title.user_reviewed_by_driver');
            $page="review_module";
            return view('review::ReviewEditUserView',['result'=>$userReviewModelValues,'request'=>$request, 'title'=>$title,'page'=>$page]);

        }


        public function saveEditUserReview(SaveEditUserReviewRequest $request)
        {

            $tableName = 'App\Containers\Review\Models\UserReviewModel';

            $tableName2 = 'App\Containers\User\Models\UserDetail';

            $this->call(SaveEditReviewTask::class, [$tableName,$tableName2,$request]);

            $result= array('success'=>"TRUE",'message'=>trans('localization::errors.modified_successfully'));

            $request->session()->flash('success', $result);

            return redirect()->to('admin/user/review');
        }


        public function driverReview(Request $request)
        {

            $tableName = 'App\Containers\Review\Models\DriverReviewModel';


            $title = 'driver_review_report';


            $user = $this->call(ReviewTask::class, [$tableName,$request,$title]);


            $title = trans('localization::title.driver_reviewed_by_user');
            $page="review_module";
            return view('review::ReviewDriverView',['result'=>$user,'types' =>$user,'request'=>$request, 'title'=>$title,'page'=>$page]);

        }


        public function editDriverReview(Request $request)
        {
            $userReviewModelValues = DriverReviewModel::select('rating','comment','driver_id')->where('id',$request->id)->first();

             $title = trans('localization::title.driver_review');
            $page="review_module";
            return view('review::ReviewEditDriverView',['result'=>$userReviewModelValues,'request'=>$request, 'title'=>$title,'page'=>$page]);

        }



        public function saveEditDriverReview(SaveEditUserReviewRequest $request)
        {

            $tableName = 'App\Containers\Review\Models\DriverReviewModel';

            $tableName2 = 'App\Containers\Drivers\Models\DriverDetailModel';

            $this->call(SaveEditReviewTask::class, [$tableName,$tableName2,$request]);

            $result= array('success'=>"false",'message'=>trans('localization::errors.modified_successfully'));

            $request->session()->flash('success', $result);

            return redirect()->to('admin/driver/review');
        }


    }
