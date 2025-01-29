<?php

namespace App\Http\Requests\Patient;

use App\Rules\Cpf;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
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
            'nome' => 'required|min:3|max:100',
            'cpf' => [
                'required',
                new Cpf,
            ],
            'celular' => 'required|min:3|max:20',
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
            'nome.required' => 'O nome precisa ser preenchido',
            'nome.min' => 'O nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O nome precisa ter no máximo 100 caracteres',
            'cpf.required' => 'O cpf precisa ser preenchido',
            'celular.required' => 'O celular precisa ser preenchido',
            'celular.min' => 'O celular precisa ter no mínimo 3 caracteres',
            'celular.max' => 'O celular precisa ter no máximo 20 caracteres',
        ];
    }
}
