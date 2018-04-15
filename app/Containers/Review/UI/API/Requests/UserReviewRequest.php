<?php

namespace App\Containers\Review\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as res;

/**
 * Class GetMyProfileRequest.
 */
class UserReviewRequest extends Request
{
    /**
     * @return  array
     */
    public function rules(res $request)
    {


        return [
            'id' => 'required',
            'token' => 'required',
            'request_id' => 'required',
            'rating' => 'required|in:1,2,3,4,5',
            'comment' => 'required|max:200',
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }
}
