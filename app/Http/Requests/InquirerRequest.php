<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InquirerRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'key' => [
//                'required',
                Rule::unique('inquirers'),
                'string',
                'max:255'
            ],
            'questions' => ['required', 'array'],
            'questions.*' => [
                'required',
                'string',
                'max:255'
            ],
        ];
    }
}

