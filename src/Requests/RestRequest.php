<?php

namespace Ijodkor\ApiResponse\Requests;

use Ijodkor\ApiResponse\Responses\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RestRequest extends FormRequest {
    use ApiResponse;

    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            $this->fail(
                $validator->errors(),
                "Ma\u{2019}lumotlar noto\u{2018}g\u{2018}ri kiritilgan yoki to\u{2018}ldirilmagan!",
                422
            )
        );
    }
}
