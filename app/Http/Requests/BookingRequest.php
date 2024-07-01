<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'room_id' => ['required'],
            'description' => ['required'],
            'start_time' => ['required', 'date'],
            'end_time' => ['required', 'date', 'after:start_time'],

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
            'desc.required' => 'desc cannot be empty',
            'start.required' => 'start time cannot be empty',
            'end.required' => 'end time cannot be empty',
            'end.after' => 'the end time must be after the start time'
        ];
    }
}
