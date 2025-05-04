<?php

namespace Database\Factories;

use App\Models\Ironing;
use App\Models\ItemType;
use App\Models\Laundry;
use App\Models\OrderItems;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isLaundry = $this->faker->boolean;
        static $laundryIndex = 1;
        static $ironingIndex = 1;

        $service = $isLaundry
            ? Laundry::where('id', $laundryIndex++ % (Laundry::count()))->first() ?? Laundry::factory()->create()
            : Ironing::where('id', $ironingIndex++ % (Ironing::count()))->first() ?? Ironing::factory()->create();

        $itemTypeRole = $isLaundry ? 'laundry' : 'ironing';

        $item = ItemType::where('role', "$itemTypeRole")->inRandomOrder()->first()
            ?? ItemType::factory()->create(['role', "$itemTypeRole"]);

        $qty = $this->faker->numberBetween(1, 5);

        return [
            'laundry_id' => $isLaundry ? $service->id : null,
            'ironing_id' => !$isLaundry ? $service->id : null,
            'item_id' => $item->id,
            'quantity' => $qty,
            'price_total' => $item->price_item * $qty,
            'created_who' => $service->user->name,
        ];
    }
}
