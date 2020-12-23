<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255|string',
            'questions' => 'array|max:100',
            'questions.*.answers' => 'array|min:2',
            'image'    =>  'required|image|max:2048'
        ];
    }

    public function failedValidation($validator)
    {

    }
}