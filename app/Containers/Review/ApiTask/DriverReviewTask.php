<?php


namespace App\Containers\Review\ApiTask;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Eta\Models\Zone_type;
use App\Containers\Request\Models\RequestModel;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Cache;
use App\Containers\Review\Models\DriverReviewModel;
use App\Containers\User\Models\UserDetail;
use App\Containers\Drivers\Models\DriverDetailModel;

/**
 * Class ApiEta
 * @package App\Containers\eta\ApiTask
 */
class DriverReviewTask
{

    public function run($data, $custom_parameter)
    {
        $request = $data['request'];


        $driver_id = RequestModel::where('id',$request->request_id)->first();


        if(!$driver_id)
        {
            throw (new CommonException())->setValue('803',trans('localization::errors.803'));

        }
        else
        {
          if($driver_id->user_rated == 1)
          {
              throw (new CommonException())->setValue('904',trans('localization::errors.904'));

          }

            $driver_id->user_rated=1;
            $driver_id->save();

            $driver_id = $driver_id->driver_id;



            $flight = new DriverReviewModel;

            $flight->driver_id  = $driver_id;
            $flight->rating     = $request->rating;
            $flight->comment    = json_encode($request->comment);
            $flight->user_id    = $request->id;
            $flight->request_id = $request->request_id;
            $flight->save();





            $reterive = DriverReviewModel::select('rating')->get();

            $array = array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0);

            foreach($reterive as $value)
            {
                $array["$value->rating"] =   $array["$value->rating"] +1;
            }

            $average =   ($array['5']*5 + $array['4']*4 + $array['3']*3 + $array['2']*2 + $array['1']*1) / ($array['5'] + $array['4'] + $array['3'] + $array['2'] + $array['1']);


            $review_count = DriverDetailModel::select('review','review_count')->first();


            $review_count = $review_count->review_count;

            if($review_count == null)
            {
                $count = 1;
            }
            else
            {
                $count = $review_count+1;
            }

            DriverModel::where('id',$driver_id)->update(['is_available'=>1]);

            DriverDetailModel::where('driver_id',$driver_id)->update(['review'=>$average,'review_count'=>$count]);

            $obj = new \stdClass();
            $obj->message="rated successfully";
            $data['response']=$obj;
            return $data;

        }


    }

}
