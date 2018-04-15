<?php

/**
 * @apiGroup           Dispatch
 * @apiName            User Detail
 * @api                {post} /dispatch/userdetail  User Detail
 * @apiDescription     User Detail
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}      token
 * @apiParam           {Integer}     phone_number

 *
 * @apiSuccessExample  {json}    Success-Response:
 *   {
 *      "success": true,
 *      "success_message": "User_detail",
 *      "user":{
 *            id:1,
 *            first_name:"test",
 *            last_name:"test",
 *            email:"test@gmail.com",
 *            phone_number:"+919965256824",
 *              }
 *   }
 *
 * @apiErrorExample  {json}       Error-Response:
 *  {
 *      "success": false,
 *      "success_message": "User_detail_not_found",
 *      "user": null
 *   }
 *
 */
    $router->post('/dispatch/userdetail', [
    'as'   => 'Dispatch@user_detail',
    'uses'  => 'Controller@run',
    'middleware' => [
        'DispatchTokenCheck.api',

        ]
    ]);
