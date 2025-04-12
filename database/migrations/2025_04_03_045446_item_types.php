<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_types', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name_item'); // String for item name
            $table->decimal('price_item', 10, 2); // Decimal for price
            $table->string('image_item')->nullable(); // String for image path, nullable
            $table->enum('role', ['laundry', 'ironing'])->default('laundry');
            $table->string('created_who')->nullable();
            $table->timestamps(); // Adds created_at & updated_at
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
