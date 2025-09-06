<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email'],
            'password1' => ['required', 'string', 'max:16', 'min:8'],
            'password2' => ['required', 'string', 'same:password1'],
            'role' => 'required'
        ];
    }

    public function messages(): array{
        return [
            'password1.required' => 'Please enter password',
            'password1.max' => 'Password cannot be more than 16 characters',
            'password1.min' => 'Password should be atleast 8 characters',
            'password2.required' => 'Please enter password',
            'password2.same' => 'Passwords do not match'
        ];  
    }
}
