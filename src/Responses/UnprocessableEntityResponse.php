<?php


namespace BlueCloudAfrica\ApiResponse\Responses;


class UnprocessableEntityResponse extends AbstractResponse
{
    public function __construct($errors = [], string $message = "The given data is invalid")
    {
        parent::__construct(null, 422, $message, $errors);
    }
}
