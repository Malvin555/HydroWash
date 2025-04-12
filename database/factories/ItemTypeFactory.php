<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = $this->faker->randomElement(['laundry', 'ironing']);

        return [
            'name_item' => $this->faker->words(2, true),
            'price_item' => $role === 'laundry' ?
                $this->faker->randomFloat(2, 7000, 25000) : 
                $this->faker->randomFloat(2, 3000, 10000),
            'image_item' => $this->faker->optional()->imageUrl(640, 480, 'clothes', true, 'Laundry'),
            'role' => $role,
            'created_who' => 'admin'
        ];
    }
}
