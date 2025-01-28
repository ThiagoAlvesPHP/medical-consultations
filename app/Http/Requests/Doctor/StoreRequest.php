<?php

namespace App\Http\Requests\Doctor;

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
            'cidade_id' => 'required|exists:cities,id',
            'nome' => 'required|min:3|max:100',
            'especialidade' => 'required|min:3|max:100',
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
            'cidade_id.required' => 'O cidade precisa ser preenchida',
            'cidade_id.exists' => 'Está cidade não existe',
            'nome.required' => 'O nome precisa ser preenchido',
            'nome.min' => 'O nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O nome precisa ter no máximo 100 caracteres',
            'especialidade.required' => 'A especialidade precisa ser preenchida',
            'especialidade.min' => 'A especialidade precisa ter no mínimo 3 caracteres',
            'especialidade.max' => 'A especialidade precisa ter no máximo 100 caracteres',
        ];
    }
}
