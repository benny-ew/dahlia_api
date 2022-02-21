<?php

namespace App\Exceptions;

use App\Constants\HttpCodes;

class NoContentException extends \Exception{

    protected $statusCode = HttpCodes::HTTP_NO_CONTENT;
    protected $message = 'Data not found';
    
}