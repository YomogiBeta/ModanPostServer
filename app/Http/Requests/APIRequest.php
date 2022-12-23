<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

abstract class APIRequest extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     *
     * @param  Validator  $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => 400,
            'message' => 'Validation Failed',
            'errors' => $validator->errors(),
        ], 400);

        throw new HttpResponseException($response);
    }
}