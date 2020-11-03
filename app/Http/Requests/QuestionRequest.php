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
            'question' => [
                'required',
                'string',
                'max:255'
            ],
            'inquirer_id' => [
                'required',
                'exists:inquirers,id',
                'integer'
            ]
        ];
    }
}

