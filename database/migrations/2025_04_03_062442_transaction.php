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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key for users
            $table->foreignId('laundry_id')->nullable()->constrained('laundry')->onDelete('cascade'); // Foreign key for laundry, nullable
            $table->foreignId('ironing_id')->nullable()->constrained('ironing')->onDelete('cascade'); // Foreign key for ironing, nullable
            $table->decimal('price_transaction', 10, 2); // Decimal for price
            $table->enum('method', ['cash', 'debit'])->default('cash'); // Fixed default value
            $table->string('user_transaction')->nullable(); // Changed to string (varchar) and made nullable
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
