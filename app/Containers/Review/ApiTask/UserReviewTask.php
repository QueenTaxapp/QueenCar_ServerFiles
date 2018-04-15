<?php


namespace App\Containers\Review\ApiTask;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Eta\Models\Zone_type;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Cache;
use App\Containers\Review\Models\UserReviewModel;
use App\Containers\User\Models\UserDetail;

use App\Containers\Request\Models\RequestModel;

/**
 * Class ApiEta
 * @package App\Containers\eta\ApiTask
 */
class UserReviewTask
{

    public function run($data, $custom_parameter)
    {
        $request = $data['request'];

        $userId = RequestModel::where('id',$request->request_id)->first();


        if(!$userId)
        {
            throw (new CommonException())->setValue('803',trans('localization::errors.803'));

        }
        else
        {
          if($userId->driver_rated == 1)
          {
              throw (new CommonException())->setValue('904',trans('localization::errors.904'));

          }
            $userId->driver_rated = 1;
            $userId->save();


            $userId = $userId->user_id;



            $flight = new UserReviewModel;


            $flight->driver_id  = $request->id;
            $flight->rating     = $request->rating;
            $flight->comment    = json_encode($request->comment);
            $flight->user_id    = $userId;
            $flight->request_id = $request->request_id;

            $flight->save();




            $reterive = UserReviewModel::select('rating')->get();

            $array = array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0);

            foreach($reterive as $value)
            {
                $array["$value->rating"] =   $array["$value->rating"] +1;
            }

            $average =   ($array['5']*5 + $array['4']*4 + $array['3']*3 + $array['2']*2 + $array['1']*1) / ($array['5'] + $array['4'] + $array['3'] + $array['2'] + $array['1']);


            $review_count = UserDetail::select('review','review_count')->where('user_id',$userId)->first();


            $review_count = $review_count->review_count;


            if($review_count == null)
            {
                $count = 1;
            }
            else
            {
                $count = $review_count+1;
            }

            $average = round($average);

            UserDetail::where('user_id',$userId)->update(['review'=>$average,'review_count'=>$count]);

            $obj = new \stdClass();
            $obj->message="rated successfully";
            $data['response']=$obj;
            return $data;

        }


    }

}
