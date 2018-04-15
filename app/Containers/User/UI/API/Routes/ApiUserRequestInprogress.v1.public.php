<?php


/**
 * @apiGroup           Users
 * @apiName            User Request InProgress
 * @api                {post} /user/requestInprogress  User Request InProgress
 * @apiDescription     User Request InProgress
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id  user id
 * @apiParam           {String}     token   user token
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 * {
 *   "success": true,
 *   "success_message": "user request inprogress",
 *   "request" : {},
 *   "sos" : [],
 *   "user_sos":[
 *                  {
 *                  "name": "gkr",
 *                  "number": "1234567890"
 *                  }
 *   ]
 *
 * }
 *
 */

$router->post('/user/requestInprogress', [
    'as'   => 'user@user_request_inProgress',
    'uses'  => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api',
    ]
]);
