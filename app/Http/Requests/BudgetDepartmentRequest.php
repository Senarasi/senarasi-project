<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetDepartmentRequest extends FormRequest
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
            'budget_name' => ['required', 'string', 'max:225'],
            'budget_code' => ['required'],
            'year' =>['required', 'numeric'],
            'department_id' => ['required', 'numeric'],
            'budget_yearly' =>['required', 'numeric']
        ];

        return $validation;
    }
}
