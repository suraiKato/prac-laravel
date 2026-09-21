<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class Phone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pattern = '/^\+?[0-9\(\)\-\s]{10,20}$/';

        if (!preg_match($pattern, $value)) {
            $fail('Поле :attribute должно содержать номер телефона в корректном формате.');
        }
    }
}
