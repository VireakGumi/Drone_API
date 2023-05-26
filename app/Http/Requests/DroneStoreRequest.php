<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class DroneStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success'=>false,'message' => $validator->errors()],412));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required",
            "type"=>"required",
            "payload" =>"required",
            "battery" =>"required",
            "flight_range" =>"required",
            "weight" =>"required",
            "user_id" =>"required",
            "plan_id" =>"required",
            "instruction_id" =>"required",
            "location_id" =>"required",
        ];
    }
}
