<?php

namespace App\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PlatformRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name'         => 'required',
            'remainder'    => 'required',
            'created_at'   => 'required',
        ];
        return $rules;
    }
    public function failedValidation(Validator $validator)

    {
        throw new HttpResponseException(response()->json([

            'isSuccess'   => false,

            'message'   => 'Validation errors',

            'errors'      => $validator->errors()

        ]));

    }
}
