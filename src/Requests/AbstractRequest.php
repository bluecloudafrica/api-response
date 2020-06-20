<?php


namespace BlueCloud\ApiResponse\Requests;


use BlueCloud\ApiResponse\Responses\UnprocessableEntityResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class AbstractRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = collect($validator->errors())->map(function (array $error) {
            return $error[0];
        });

        throw new HttpResponseException((new UnprocessableEntityResponse($errors->toArray()))->json());
    }
}
