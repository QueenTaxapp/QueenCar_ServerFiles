<?php

namespace App\Ship\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CreateResourceFailedException.
 *
 * @author Johannes Schobel <johannes.schobel@googlemail.com>
 */
class CommonException extends Exception
{

    public $httpStatusCode;

    public $error_code;

    public $message = 'Failed to create Resource.';


    public function setValue($error_code, $message)
    {
        $this->error_code=$error_code;
        $this->httpStatusCode=$error_code;
        $this->message=$message;
        return $this;
    }


}


