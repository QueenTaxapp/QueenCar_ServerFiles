<?php

/**
 * @apiGroup           Users
 * @apiName            Usersocial_unique_id_check
 * @api                {post} /user/social_unique_id_check User Social Unique Id Check
 * @apiDescription     User social_unique_id_check
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {String}     social_unique_id   
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *   {
 *   "success": true,
 *   "user": {
 *       "is_presented": true
 *   },
 *   "success_message" : "Checked_SocialUniqueId"
 *   }
 *
 */

    $router->post('/user/social_unique_id_check', [
        'as'   => 'usersocialuniqueidcheck',
        'uses' => 'Controller@userSocialCheck',
    ]);



