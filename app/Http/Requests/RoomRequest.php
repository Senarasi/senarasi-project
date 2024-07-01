<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'room_name' => ['required'],
            'capacity' => ['required', 'numeric'],
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
            'room_name.required' => 'room name cannot be empty',
            'capacity.required' => 'capacity cannot be empty',
            'capacity.numeric' => 'capacity harus berupa angka',
        ];
    }
}
