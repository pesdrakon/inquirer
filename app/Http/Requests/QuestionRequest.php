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
//    public function authorize()
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'questions' => ['array'],
            'questions.*' => ['array'],
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

