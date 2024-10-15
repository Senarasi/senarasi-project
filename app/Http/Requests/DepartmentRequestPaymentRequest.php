<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequestPaymentRequest extends FormRequest
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
            'department_monthly_budget_id' => ['required'],
            'date' => ['required', 'date'],
            'paid_to' =>['required'],
            'paid_via' => ['required'],
            'bank_name' =>['required'],
            'account_name' =>['required'],
            'account_number' =>['required', 'numeric'],
            'document_number' =>['required'],
            'note' =>['nullable'],
            // 'file_invoice' =>['required', 'mimes:pdf, jpg, jpeg, png', 'max:2048'],
        ];

        if ($this->isMethod('post')) {
            $validation['file_invoice'] = ['required', 'mimes:jpeg,png,jpg,pdf', 'max:2048'];
        }

        if (!$this->isMethod('post')) {
            $validation['file_invoice'] = ['nullable', 'mimes:jpeg,png,jpg,pdf', 'max:2048'];
        }

        return $validation;
    }
}
