<?php
/**
 * @apiGroup           Compliants
 * @apiName            User Compliants
 * @api                {post} /compliants/user User Compliants
 * @apiDescription     user Compliants
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}     token
 * @apiParam           {Integer}     title 
 * @apiParam           {String}     description
 * @apiParam           {String}     admin_key

 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *  {
 *      "success": true,
 *      "success_message": "compliant registered successfully"
 *  }
 *
 */

$router->post('compliants/user', [
    'as' => 'Compliant@user_compliants',
    'uses' => 'Controller@run',
    'middleware' => [
         //'DriverTokenCheck.api',
          //      'userTokenCheck.api',
    ]
]);
