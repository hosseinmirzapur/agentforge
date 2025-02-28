<?php

namespace App\Http\Requests;

use App\Models\Agent;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAgentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' =>  ['required', 'string', 'max:255'],
            'description' =>  ['nullable', 'string'],
            'personality' =>  [
                'required',
                Rule::in(
                    Agent::possiblePersonalities()
                )
            ],
            'tone' =>  [
                'required',
                Rule::in(
                    Agent::possibleTones()
                )
            ],
            'meta' => ['nullable', 'json']
        ];
    }
}
