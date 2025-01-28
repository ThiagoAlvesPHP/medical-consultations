<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|max:100',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'O e-mail precisa ser preenchido',
            'email.email' => 'O e-mail é inválido',
            'email.exists' => 'Não há um usuário com esse e-mail',
            'password.required' => 'A senha precisa ser preenchida',
            'password.min' => 'A senha precisa ter no mínimo 8 caracteres',
            'password.max' => 'A senha precisa ter no máximo 100 caracteres',
        ];
    }
}
