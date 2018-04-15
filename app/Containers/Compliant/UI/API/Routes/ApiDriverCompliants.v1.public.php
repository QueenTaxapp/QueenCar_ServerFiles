<?php
/**
 * @apiGroup           Compliants
 * @apiName            Driver Compliants
 * @api                {post} /compliants/driver Driver Compliants
 * @apiDescription     driver Compliants
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}     token
 * @apiParam           {Integer}     title 
 * @apiParam           {String}     description

 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *  {
 *      "success": true,
 *      "success_message": "compliant registered successfully"
 *  }
 *
 */

$router->post('/compliants/driver', [
    'as' => 'Compliant@driver_compliants',
    'uses' => 'Controller@run',
    'middleware' => [
         //'DriverTokenCheck.api',
          //      'userTokenCheck.api',
    ]
]);
