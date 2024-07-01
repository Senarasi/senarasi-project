<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTransportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $validation =
            [
                'employee_id' => ['required'],
                'date' => ['required', 'date'],
                'user_phone' => ['required', 'numeric'],
                'start_loc' => ['required', 'string'],
                'final_loc' => ['required', 'string'],
                'start_time' => ['required',  'date_format:H:i'],
                'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
                'desc' => ['required'],
                'person' => ['required', 'numeric'],
                'transport' => ['nullable'],
                'voucher' => ['nullable'],
                'cost' => ['nullable'],
                'report' => ['nullable'],

            ];


        return $validation;
    }


        /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'date.required' => 'date cannot be empty',
            'user_phone.required' => 'user phone cannot be empty',
            'user_phone.numeric' => 'user phone must be a number',
            'start_loc.required' => 'start loc cannot be empty',
            'final_loc.required' => 'final loc cannot be empty',
            'start_time.required' => 'start time cannot be empty',
            'end_time.required' => 'end time cannot be empty',
            'end_time.after' => 'the end time must be after the start time',
            'desc.required' => 'description cannot be empty',
            'person.required' => 'person cannot be empty',
        ];
    }
}
