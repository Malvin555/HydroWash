<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Ironing;
use App\Models\Laundry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Canceled>
 */
class CanceledFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isLaundry = $this->faker->boolean;

        if ($isLaundry) {
            $laundry = Laundry::inRandomOrder()->first() ?? Laundry::factory()->create();
            $userId = $laundry->user_id;
            $laundryId = $laundry->id;
            $ironingId = null;
        } else {
            $ironing = Ironing::inRandomOrder()->first() ?? Ironing::factory()->create();
            $userId = $ironing->user_id;
            $laundryId = null;
            $ironingId = $ironing->id;
        }
        
        return [
            'user_id' => $userId,
            'laundry_id' => $laundryId,
            'ironing_id' => $ironingId,
            'issues' => $this->faker->sentence(),
            'created_who' => 'user',
        ];
    }
}
