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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laundry_id')->nullable()->constrained('laundry')->onDelete('cascade'); 
            $table->foreignId('ironing_id')->nullable()->constrained('ironing')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('item_types');
            $table->integer('quantity');
            $table->decimal('price_total', 12, 2);
            $table->string('created_who')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
