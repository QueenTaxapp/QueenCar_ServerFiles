<?php


/**
 * @apiGroup           Review
 * @apiName            User Review
 * @api                {post} /driver/review user Reviewed by  Driver
 * @apiDescription     User Reviewed by driver
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   driver id
 * @apiParam           {String}      token   driver token
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
$router->post('/driver/review', [
    'as' => 'Review@user_review',
    'uses' => 'Controller@run',
    'middleware' => [

        //'DriverTokenCheck.api'
    ]
]);
