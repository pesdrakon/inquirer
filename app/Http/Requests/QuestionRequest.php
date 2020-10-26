<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionRequest extends FormRequest
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
            'question' => [
                'required',
                'string',
                'max:2500'
            ],
            'answer_id' => [
                'required',
                'integer',
                'exists:answers,id'
            ],
        ];

        switch ($this->getMethod()) {
            case 'POST':
            case 'PUT':
                return $rules;
            // case 'PATCH':
//            case 'DELETE':
//                return [
//                    'id' => ['required', 'integer', 'exists:questions,id']
//                ];
        }
    }
}

