<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\ItemType;
use App\Models\OrderItems;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laundry>
 */
class LaundryFactory extends Factory
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

        // Get item_type with role is 'laundry'
        $items = ItemType::where('role', 'laundry')->inRandomOrder()->limit(2)->get()
            ?? ItemType::factory()->create(['role', 'laundry']);

        $orderCode = Str::generateOrderCode('laundry');

        foreach ($items as $item) {
            $qty = $this->faker->numberBetween(1, 5);
            OrderItems::create([
                'order_code' => $orderCode,
                'item_id' => $item->id,
                'quantity' => $qty,
                'price_total' => $item->price_item * $qty,
                'created_who' => $user->name,
            ]);
        }

        $orderItems = OrderItems::where('order_code', $orderCode)->get();
        $totalPrice = $orderItems->sum('price_total');
        $amount = $orderItems->sum('quantity');

        $status = $this->faker->randomElement(['pending', 'process', 'completed']);
        $estimation = null;
        if ($status == 'process' || $status == 'completed') {
            $estimation = Carbon::now()->addWeeks(1)->format('Y-m-d');
        }

        return [
            'user_id' => $user->id,
            'order_code' => $orderCode,
            'name_laundry' => Str::generateRandomString('Laundry'),
            'price_laundry' => $totalPrice,
            'amount_item' => $amount,
            'estimation' => $estimation,
            'retrieval_method' => $this->faker->randomElement(['take_away', 'delivery']),
            'status_transaction' => $this->faker->randomElement(['uncompleted', 'completed']),
            'status_report' => $this->faker->randomElement(['normal', 'deleted']),
            'address_taking' => $this->faker->address(),
            'address_delivery' => $this->faker->address(),
            'status' => $status,
            'notes_laundry' => $this->faker->optional()->sentence(),
            'created_who' => $user->name,
        ];
    }
}
