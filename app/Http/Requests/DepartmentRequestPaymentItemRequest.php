<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequestPaymentItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
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
            'department_request_payment_id' => ['required'],
            'description' => ['required'],
            'amount' =>['required', 'numeric'],
            'note' => ['nullable'],
        ];

        return $validation;
    }
}
