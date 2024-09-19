<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
    public function rules(): array
    {
        $validation = [
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'announcement_category_id' => ['required'],
            'attachment' => ['nullable', 'mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx', 'max:2048'],

        ];


        // if ($this->isMethod('post')) {
        //     $validation['attachment'] = ['required', 'mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx', 'max:2048'];
        // }


        // if (!$this->isMethod('post')) {
        //     $validation['attachment'] = ['nullable', 'mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx', 'max:2048'];
        // }


        return $validation;
    }
}
