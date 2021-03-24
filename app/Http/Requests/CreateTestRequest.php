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
            'questions.*.name' => 'required|string|max:255',
            'questions.*.answers.*.answer' => 'required|string|max:255',
            'image'    =>  'image|max:2048'
        ];
    }

    public function messages()
    {
        return
        [
            'name.required' => 'Название теста обязательно',
            'questions.*.answers.*.answer.required' => 'Ответ не может быть пустым',
            'questions.*.name.required' => 'Вопрос не может быть пустым',

    ];
    }

}
