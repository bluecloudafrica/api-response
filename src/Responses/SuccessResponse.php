<?php


namespace BlueCloud\ApiResponse\Responses;


class SuccessResponse extends AbstractResponse
{
    public function __construct($data = null, string $message = "Action completed successfully")
    {
        parent::__construct($data, 200, $message, []);
    }
}
