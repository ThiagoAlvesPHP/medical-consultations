<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Cpf implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $isFail = false;

        // Remove caracteres não numéricos
        $cpf = preg_replace('/\D/', '', $value);

        // Verifica se tem 11 dígitos
        if (strlen($cpf) !== 11) {
            $isFail = true;
        }

        // Elimina CPFs inválidos conhecidos
        if (preg_match('/^(\d)\1*$/', $cpf) && !$isFail) {
            $isFail = true;
        }

        // Cálculo dos dígitos verificadores
        if (!$isFail) {
            for ($t = 9; $t < 11; $t++) {
                $d = 0;
                for ($c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$t] != $d) {
                    $isFail = true;
                }
            }
        }

        if ($isFail) {
            $fail('O CPF é invalido!');
        }
    }
}
