<?php

namespace Database\Factories;

use App\Models\Ironing;
use Carbon\Carbon;
use App\Models\User;
use App\Models\ItemType;
use App\Models\OrderItems;
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

        $status = $this->faker->randomElement(['pending', 'process', 'completed']);
        $estimation = null;
        if ($status == 'process' || $status == 'completed') {
            $estimation = Carbon::now()->addWeeks(1)->format('Y-m-d');
        }

        return [
            'user_id' => $user->id,
            'name_ironing' => Str::generateRandomString('Ironing'),
            'price_ironing' => 0, // Temporary, will be updated later
            'amount_item' => 0, // Temporary, will be updated later
            'estimation' => $estimation,
            'retrieval_method' => $this->faker->randomElement(['take_away', 'delivery']),
            'status_transaction' => $this->faker->randomElement(['uncompleted', 'completed']),
            'status_report' => $this->faker->randomElement(['normal', 'deleted']),
            'address_taking' => $this->faker->address(),
            'address_delivery' => $this->faker->address(),
            'status' => $status,
            'notes_ironing' => $this->faker->optional()->sentence(),
            'created_who' => $user->name,
        ];
    }
}
