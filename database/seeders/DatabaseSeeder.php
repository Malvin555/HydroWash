<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ironing;
use App\Models\Laundry;
use App\Models\Canceled;
use App\Models\Feedback;
use App\Models\ItemType;
use App\Models\OrderItems;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. For Admin
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'telp' => '081234567890',
            'address' => 'Jl. Admin No. 1',
            'desc' => 'Admin utama',
            'password' => bcrypt('admin123'),
        ]);

        // 2. Users
        $users = User::factory(10)->create();

        // 3. Item Types
        $itemIroning = ItemType::factory(6)->create(['role' => 'ironing']);
        $itemLaundry = ItemType::factory(6)->create(['role' => 'laundry']);

        // 4. Ironings
        $ironings = Ironing::factory(10)
            ->recycle([$users, $itemIroning])
            ->create();

        // 5. Laundries
        $laundries = Laundry::factory(10)
            ->recycle([$users, $itemLaundry])
            ->create();

        $orderItems = OrderItems::factory(20)
            ->recycle([$ironings, $laundries])
            ->create();


        // Update price_laundry and price_ironing, amount_item
        $deliveryFee = 20000;
        $tax = 0.1; // 10% tax
        foreach ($orderItems as $orderItem) {
            $model = $orderItem->laundry_id ? Laundry::find($orderItem->laundry_id) : Ironing::find($orderItem->ironing_id);

            if ($model) {
                $price = $model->orderItems()->sum('price_total');
                $newPrice = $model->retrieval_method === 'delivery' ? $price + $deliveryFee + ($price * $tax) : $price;

                $model->update([
                    $orderItem->laundry_id ? "price_laundry" : "price_ironing" => $newPrice,
                    'amount_item' => $model->orderItems()->sum('quantity'),
                ]);
            }
        }

        // 6. Feedbacks 
        Feedback::factory(10)
            ->recycle([$users])
            ->create();

        // 7. Transactions
        Transaction::factory(10)
            ->recycle([$users, $laundries, $ironings])
            ->create();

        // 8. Canceled 
        Canceled::factory(10)
            ->recycle([$users, $laundries, $ironings])
            ->create();
    }
}
