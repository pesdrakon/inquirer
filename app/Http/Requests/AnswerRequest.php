<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnswerRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'answers' => ['required', 'array'],
            'answers.*' => ['required', 'array'],
            'answers.*.answer' => [
                'required',
                'string',
                'max:2500'
            ],
            'answers.*.question_id' => [
                'required',
                'integer',
                'exists:questions,id'
            ]
        ];

        switch ($this->getMethod()) {
            case 'PUT':
            case 'POST':
                return $rules;
            // case 'PATCH':
            case 'DELETE':
                return [
                    'id' => ['required', 'integer', 'exists:answers,id']
                ];
        }
    }
}

