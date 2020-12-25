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
            'image'    =>  'image|max:2048'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Название теста обязательно! Тест должен содержать хотя бы один вопрос',
            'questions.*.name.required' => 'Добавьте хотя-бы 1 вопрос c вариантом ответа',
            'questions.*.answers.*.answer.required' => 'Добавьте хотя-бы 1 вариант ответа'
        ];


    }
}
