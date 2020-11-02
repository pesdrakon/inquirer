<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'answer' => [
                'required',
                'string',
                'max:255'
            ],
            'question_id' => [
                'required',
                'exists:questions,id',
                'integer'
            ]
        ];
    }
}

