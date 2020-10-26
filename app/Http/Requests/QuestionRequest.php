<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'questions' => ['required', 'array'],
            'questions.*' => ['required', 'array'],
            'questions.*.question' => [
                'required',
                'string',
                'max:2500'
            ],
            'questions.*.answer_id' => [
                'required',
                'integer',
                'exists:answers,id'
            ],
        ];
    }
}

