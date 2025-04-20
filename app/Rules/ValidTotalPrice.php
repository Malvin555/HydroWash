<?php

namespace App\Rules;

use Closure;
use App\Models\ItemType;
use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidTotalPrice implements ValidationRule
{
    public $itemName;
    public $itemAmount;
    public $serviceType;

    public function __construct($itemName, $itemAmount, $serviceType)
    {
        $this->itemName = $itemName;
        $this->itemAmount = $itemAmount;
        $this->serviceType = $serviceType;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $expectedPrice = (float) ItemType::where('name_item', $this->itemName)
            ->where('role', $this->serviceType)
            ->first()
            ?->price_item ?? 0;

        $expectedPriceTotal = (float) $expectedPrice * $this->itemAmount;
        $valueInput = (float) Str::rupiahToFloat($value);

        if (number_format($valueInput, 2, '.', '') !== number_format($expectedPriceTotal, 2, '.', '')) {
            $fail('The :attribute must be equal to the total price of ' . $this->itemName . ' for ' . $this->itemAmount . ' items.');
        }
    }
}
