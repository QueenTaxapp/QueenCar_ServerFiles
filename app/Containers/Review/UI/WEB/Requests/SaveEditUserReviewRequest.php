<?php

namespace App\Containers\Review\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Http\Request as Req;

class SaveEditUserReviewRequest extends Request
{

    public function rules(Req $request)
    {

        return [
                'rating' => 'required|in:1,2,3,4,5',
                'comment'=> 'required|max:200'
            ];



    }

    public function authorize()
    {
        return true;
    }
}
