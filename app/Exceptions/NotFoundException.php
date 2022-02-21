<?php

namespace App\Exceptions;

use App\Constants\HttpCodes;

class NotFoundException extends \Exception{

    protected $code = HttpCodes::HTTP_NOT_FOUND;
    protected $message = 'Recources not found';
    
}