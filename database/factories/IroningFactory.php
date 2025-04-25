<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\ItemType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class IroningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get user with role is 'user'
        $user = User::where('role', 'user')->inRandomOrder()->first() 
                ?? User::factory()->create();
        
        // Get item_type with role is 'ironing'
        $item = ItemType::where('role', 'ironing')->inRandomOrder()->first() 
                ?? ItemType::factory()->create(['role', 'ironing']);

        $amount = $this->faker->numberBetween(1, 5);
        $pricePerItem = $item->price_item;
        $totalPrice = $pricePerItem * $amount;

        return [
            'user_id' => $user->id,
            'item_id' => $item->id,
            'name_ironing' => Str::generateRandomString('Ironing'),
            'price_ironing' => $totalPrice,
            'amount_item' => $amount,
            'estimation' => $this->faker->optional()->dateTimeBetween('now', '+5 days')?->format('Y-m-d'),
            'retrieval_method' => $this->faker->randomElement(['take_away', 'delivery']),
            'status_transaction' => $this->faker->randomElement(['uncompleted', 'completed']),
            'status_report' => $this->faker->randomElement(['normal', 'deleted']),
            'address_taking' => $this->faker->address(),
            'address_delivery' => $this->faker->address(),
            'status' => $this->faker->randomElement(['pending', 'process', 'completed']),
            'notes_ironing' => $this->faker->optional()->sentence(),
            'created_who' => $user->name,
        ];
    }
}
