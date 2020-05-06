<?php


namespace BlueCloud\ApiResponse\Responses;


class InternalServerErrorResponse extends AbstractResponse
{
    public function __construct(string $message = "Something went wrong", array $errors = [])
    {
        parent::__construct(null, 500, $message, $errors);
    }
}
