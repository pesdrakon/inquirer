<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InquirerRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
        ];

        switch ($this->getMethod()) {
            case 'POST':
                return [
                    'key' => [
                        'required',
                        Rule::unique('inquirers'),
                        'string',
                        'max:255'
                    ]
                ] + $rules;
            case 'PUT':
                return [
                        'key' => [
                            'required',
                            Rule::unique('inquirers')->ignore($this->id, 'id'),
                            'string',
                            'max:255'
                        ]
                    ] + $rules;
            // case 'PATCH':
            case 'DELETE':
                return [
                    'id' => ['required', 'integer', 'exists:inquirers,id']
                ];
        }
    }
}

