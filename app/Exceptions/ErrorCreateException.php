<?php

namespace App\Exceptions;

use App\Constants\HttpCodes;
use Illuminate\Support\MessageBag;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ErrorCreateException extends HttpException{

    protected $code = HttpCodes::HTTP_BAD_REQUEST;
    //protected $message = 'Check post parameters';

    protected $errors;

    public function __construct($message = null, $errors = null, Exception $previous = null, $headers = [], $code = 0)
    {
        if (is_null($errors)) {
            $this->errors = new MessageBag;
        } else {
            $this->errors = is_array($errors) ? new MessageBag($errors) : $errors;
        }

        parent::__construct(422, $message, $previous, $headers, $code);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return ! $this->errors->isEmpty();
    }
}