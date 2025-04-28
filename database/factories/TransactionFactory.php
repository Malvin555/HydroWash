<?php

namespace Database\Factories;

use App\Models\Ironing;
use App\Models\Laundry;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Randomly decide to use laundry or ironing (or both null-safe)
        $useLaundry = $this->faker->boolean(60);
        $useIroning = !$useLaundry ? $this->faker->boolean(60) : false;

        if (!$useLaundry && !$useIroning) {
            $useLaundry = true;
        }

        $laundry = $useLaundry
            ? Laundry::inRandomOrder()->first() ?? Laundry::factory()->create()
            : null;

        $ironing = $useIroning
            ? Ironing::inRandomOrder()->first() ?? Ironing::factory()->create()
            : null;

        // Get user from laundry.user_id or ironing.user_id
        $userId = $laundry?->user_id ?? $ironing?->user_id;
        $userName = 'user';
        if (!$userId) {
            $user = User::factory()->create(['role' => 'user']);
            $userId = $user->id;
            $userName = $user->name;
        }

        // Prices are taken from one (if any)
        $price = 0;
        if ($laundry) $price += $laundry->price_laundry ?? 0;
        if ($ironing) $price += $ironing->price_ironing ?? 0;

        // if there are no two, create a default price
        if ($price == 0) {
            $price = $this->faker->randomFloat(2, 5000, 25000);
        }

        $method = $this->faker->randomElement(['cash', 'debit']);

        return [
            'user_id' => $userId,
            'laundry_id' => $laundry?->id,
            'ironing_id' => $ironing?->id,
            'price_transaction' => $price,
            'method' => $method,
            'user_transaction' => $method === 'debit' ? 'Rp ' . number_format($price, 0, ',', '.') : null,
            'card_number' => $method === "debit" ? $this->faker->creditCardNumber() : null,
            'postal_code' => $method === "debit" ? $this->faker->postcode() : null ,
            'bank_name' => $method === "debit" ?  $this->faker->randomElement(['BCA', 'BNI', 'BRI', 'Mandiri']) : null,
            'created_who' => $userName,
        ];
    }
}
