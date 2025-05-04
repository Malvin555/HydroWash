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

        $model = $isLaundry ? Laundry::class : Ironing::class;
        $record = $model::where('status_report', 'deleted')->inRandomOrder()->first() 
                    ?? $model::factory()->create(['status_report' => 'deleted']);

        return [
            'user_id' => $record->user_id,
            'laundry_id' => $isLaundry ? $record->id : null,
            'ironing_id' => $isLaundry ? null : $record->id,
            'issues' => $this->faker->sentence(),
            'created_who' => $record->created_who ?? 'user',
        ];
    }
}
