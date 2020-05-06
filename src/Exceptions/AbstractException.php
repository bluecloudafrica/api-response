<?php


namespace BlueCloud\ApiResponse\Exceptions;


use BlueCloud\ApiResponse\Responses\GenericResponse;
use Exception;

abstract class AbstractException extends Exception
{
    public function render()
    {
        return (new GenericResponse(null, $this->getCode(), $this->getMessage()))->send();
    }
}
