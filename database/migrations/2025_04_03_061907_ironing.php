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
        Schema::create('ironing', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key for users
            $table->foreignId('item_id')->constrained('item_types')->onDelete('cascade'); // Foreign key for item types
            $table->string('name_ironing'); // String for item name
            $table->decimal('price_ironing', 10, 2); // Decimal for price
            $table->integer('amount_item'); // Integer for amount
            $table->date('estimation')->nullable(); // Nullable date
            $table->enum('retrieval_method', ['take_away', 'delivery'])->default('take_away'); // Fixed default value
            $table->enum('status_transaction', ['uncompleted', 'completed'])->default('uncompleted');
            $table->enum('status_report', ['normal', 'deleted'])->default('normal');
            $table->text('address_taking')->nullable(); // Changed from var to 
            $table->text('address_delivery')->nullable(); // Changed from var to 
            $table->enum('status', ['pending', 'process', 'completed'])->default('pending');
            $table->text('notes_ironing')->nullable(); // Changed to text and made nullable
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
