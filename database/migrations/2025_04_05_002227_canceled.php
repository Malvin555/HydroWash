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
        Schema::create('canceled', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key for users
            $table->foreignId('laundry_id')->nullable()->constrained('laundry')->onDelete('cascade'); // Foreign key for users
            $table->foreignId('ironing_id')->nullable()->constrained('ironing')->onDelete('cascade'); // Foreign key for users
            $table->text('issues'); // Changed to text and fixed typo
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
