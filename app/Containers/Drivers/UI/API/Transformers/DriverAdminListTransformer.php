<?php

namespace App\Containers\Drivers\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;

/**
 * Class UserTransformer.
 *
 */
class DriverAdminListTransformer extends Transformer
{
    /**
     * @param \App\Containers\Drivers\Models\HeroModel $hero
     *
     * @return array
     */
    public function transform($request)
    {
        $message = $request->message;
        $admins = $request->admin;


        $response = [
            'success' => true,
            'success_message' => $request->message,
            'admins' => $admins
        ];

        return $response;
    }


}
