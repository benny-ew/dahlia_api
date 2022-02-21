<?php

namespace App\Exceptions;

use Exception;
use App\Constants\HttpCodes;

class ForbiddenException extends Exception
{
    protected $code = HttpCodes::HTTP_FORBIDDEN;
    
}
