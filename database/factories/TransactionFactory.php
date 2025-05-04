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
        $useLaundry = $this->faker->boolean;
        $useIroning = !$useLaundry;

        $laundry = $useLaundry ? $this->getLaundry() : null;
        $ironing = $useIroning ? $this->getIroning() : null;
        $user = $this->getUser($laundry, $ironing);
        $price = $this->calculatePrice($laundry, $ironing);
        $method = $this->faker->randomElement(['cash', 'debit']);

        return [
            'user_id' => $user->id,
            'laundry_id' => $laundry?->id,
            'ironing_id' => $ironing?->id,
            'price_transaction' => $price,
            'method' => $method,
            'user_transaction' => 'Rp ' . number_format($price, 0, ',', '.'),
            'card_number' => $method === "debit" ? $this->faker->creditCardNumber() : null,
            'postal_code' => $method === "debit" ? $this->faker->postcode() : null ,
            'bank_name' => $method === "debit" ?  $this->faker->randomElement(['BCA', 'BNI', 'BRI', 'Mandiri']) : null,
            'created_who' => $user->name,
        ];
    }

    private function getLaundry() {
        return Laundry::where('status', '!=', 'pending')->inRandomOrder()->first() 
            ?? Laundry::factory()->create(['status' => $this->faker->randomElement(['process', 'completed'])]);
    }

    private function getIroning() {
        return Ironing::where('status', '!=', 'pending')->inRandomOrder()->first() 
            ?? Ironing::factory()->create(['status' => $this->faker->randomElement(['process', 'completed'])]);
    }

    private function getUser($laundry, $ironing) {
        $user = $laundry ?? $ironing;

        return (object) [
            'id' => $user?->user_id,
            'name' => $user?->user?->name ?? 'User',
        ];
    }

    private function calculatePrice($laundry, $ironing) {
        $price = 0;
        if ($laundry) $price += $laundry->price_laundry ?? 0;
        if ($ironing) $price += $ironing->price_ironing ?? 0;

        if ($price == 0) {
            $price = $this->faker->randomFloat(2, 5000, 25000);
        }

        return $price;
    }
}
