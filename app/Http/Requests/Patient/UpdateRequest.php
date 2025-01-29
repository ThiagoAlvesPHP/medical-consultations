<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'min:3|max:100',
            'celular' => 'min:3|max:20',
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
            'nome.min' => 'O nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O nome precisa ter no máximo 100 caracteres',
            'celular.min' => 'O celular precisa ter no mínimo 3 caracteres',
            'celular.max' => 'O celular precisa ter no máximo 20 caracteres',
        ];
    }
}
