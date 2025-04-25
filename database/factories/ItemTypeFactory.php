<?php

namespace Database\Factories;

use App\Models\ItemType;
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
        $items = [
            ['name' => 'Clothing', 'price_laundry' => 12000, 'price_ironing' => 8000],
            ['name' => 'Towels', 'price_laundry' => 10000, 'price_ironing' => 6000],
            ['name' => 'Bedding', 'price_laundry' => 22000, 'price_ironing' => 15000],
            ['name' => 'Accessories', 'price_laundry' => 4000, 'price_ironing' => 3000],
            ['name' => 'Curtains', 'price_laundry' => 10000, 'price_ironing' => 7000],
            ['name' => 'Blankets', 'price_laundry' => 8000, 'price_ironing' => 5000],
        ];

        static $index = 0;

        if ($index >= count($items)) {
            $index = 0; // Reset index if it exceeds the array length
        }

        $item = $items[$index];
        $index++;

        return [
            'name_item' => $item['name'],
            'price_item' => fn (array $attributes) => $attributes['role'] === 'laundry' ? $item['price_laundry'] : $item['price_ironing'],
            'image_item' => $this->faker->optional()->imageUrl(640, 480, 'clothes', true, 'laundry'),
            'created_who' => 'admin'
        ];
    }
}
