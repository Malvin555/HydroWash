<?php

namespace App\Rules;

use App\Models\Ironing;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ExistsInIroningsOrLaundries implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $existsInIronings = Ironing::where('name_ironing', $value)->exists();
        $existsInLaundries = Ironing::where('name_laundry', $value)->exists();

        if (!$existsInIronings && !$existsInLaundries) {
            $fail('The service type does not exist in ironings or laundries.');
        }
    }
}
