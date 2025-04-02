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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->decimal('percentage', 5, 2);
            $table->date('expiry_date')->nullable();
            $table->timestamps();
        });
    }
    // CREATE TABLE discounts (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     code VARCHAR(50) UNIQUE NOT NULL,
    //     percentage DECIMAL(5,2) NOT NULL,
    //     expiry_date DATE,
    //     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    // );
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
