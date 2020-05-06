<?php


namespace BlueCloudAfrica\ApiResponse\Responses;


class UnauthorizedResponse extends AbstractResponse
{
    public function __construct()
    {
        parent::__construct(null, 401, "User is not authorized", []);
    }
}
