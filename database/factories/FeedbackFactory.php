<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('role', 'user')->inRandomOrder()->first()
                ?? User::factory()->create(['role' => 'user']);
            
        return [
            'user_id' => $user->id,
            'star_rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->sentence(10),
            'created_who' => $user->name,
        ];
    }
}
