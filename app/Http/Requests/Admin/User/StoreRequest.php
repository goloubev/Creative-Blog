<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'NAME is required',
            'email.required' => 'EMAIL is required',
            'email.email' => 'EMAIL must be a valid email',
            'email.unique' => 'This EMAIL is already in use',
        ];
    }
}
