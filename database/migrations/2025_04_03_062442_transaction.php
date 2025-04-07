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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('laundry_id')->nullable()->constrained('laundry')->onDelete('cascade'); 
            $table->foreignId('ironing_id')->nullable()->constrained('ironing')->onDelete('cascade');
            $table->decimal('price_transaction', 10, 2); 
            $table->enum('method', ['cash', 'debit'])->default('cash'); 
            $table->string('user_transaction')->nullable(); 
            $table->string('card_number')->nullable();
            $table->string('postal_code')->nullable(); 
            $table->string('bank_name')->nullable();
            $table->timestamps();
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
