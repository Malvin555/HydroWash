<?php

namespace App\Rules;

use Closure;
use App\Models\ItemType;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueItemNamePerRole implements ValidationRule
{
    public $role;
    public $exceptedId;


    public function __construct($role, $exceptedId)
    {
        $this->role = $role;
        $this->exceptedId = $exceptedId;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $exists = ItemType::where('name_item', $value)
            ->where('role', $this->role);

        if ($this->exceptedId) {
            $exists->where('id', '!=', $this->exceptedId);
        }

        if ($exists->exists()) {
            $fail('The item name has already been taken for the selected role.');
        }
    }
}
