<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'answer' => [
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

