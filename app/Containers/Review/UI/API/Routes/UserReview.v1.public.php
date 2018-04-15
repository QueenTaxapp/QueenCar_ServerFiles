<?php

/**
 * @apiGroup           Review
 * @apiName            Driver Review
 * @api                {post} /user/review Driver  Reviewed by user
 * @apiDescription     Driver Reviewed by user
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   user id
 * @apiParam           {String}      token   user token
 * @apiParam           {Integer}     request_id
 * @apiParam           {Integer}     rating  1,2,3,4,5
 * @apiParam           {String}      comment
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "rated successfully"
 *  }
 *
 */

$router->post('/user/review', [
    'as' => 'Review@driver_review',
    'uses' => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api'


    ]
]);



