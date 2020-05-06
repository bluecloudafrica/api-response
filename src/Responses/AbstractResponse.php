<?php


namespace BlueCloud\ApiResponse\Responses;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

abstract class AbstractResponse extends Response
{
    /**
     * @var int
     */
    protected $code;

    /**
     * @var string
     */
    protected $message;

    protected $errors;

    protected $data;

    protected $label = 'data';

    public $headers = [];

    public function __construct($data = null, int $code = 200, string $message = "Action completed successfully",
                                array $errors = [], array $headers = [])
    {
        parent::__construct($data, $code);
        $this->data = $data;
        $this->code = $code;
        $this->message = $message;
        $this->errors = $errors;
        $this->headers = $headers;
    }

    public function send(): JsonResponse
    {
        return response()->json([
            "status" => [
                "code" => $this->code,
                "success" => $this->successful(),
                "errors" => $this->errors
            ],
            $this->label => $this->data
        ], $this->code, $this->headers, JSON_PRETTY_PRINT);
    }

    private function successful(): bool
    {
        return $this->code >= 200 && $this->code < 400;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    public function setErrors(array $errors): self
    {
        $this->errors = $errors;
        return $this;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }

}
