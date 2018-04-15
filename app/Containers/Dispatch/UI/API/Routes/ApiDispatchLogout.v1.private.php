<?php

/**
 * @apiGroup           Dispatch
 * @apiName            Logout
 * @api                {post} /dispatch/logout   logout
 * @apiDescription     used to logout the user
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}      token


 *
 * @apiSuccessExample  {json}    Success-Response:
 *   {
 *      "success": true,
 *      "success_message": "successfully_logged_out",
 *   }
 *
 *
 */
$router->post('/dispatch/logout', [
    'as'   => 'Dispatch@dispatch_logout',
    'uses'  => 'Controller@run',
    'middleware' => [
     //   'DispatchTokenCheck.api',

    ]
]);
