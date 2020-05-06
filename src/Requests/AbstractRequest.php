<?php


namespace BlueCloudAfrica\ApiResponse\Requests;


use BlueCloudAfrica\ApiResponse\Responses\UnprocessableEntityResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class AbstractRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException((new UnprocessableEntityResponse($validator->errors()))->send());
    }
}
