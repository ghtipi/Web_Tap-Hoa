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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('total',12,2);
            $table->enum('status',['pending','shipped','delivered','cancelled'])->default('pending');
            $table->timestamp('careted_at')->useCurrent();
            //Khoá ngoại
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    // CREATE TABLE orders (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     user_id INT,
    //     total_price DECIMAL(10,2) NOT NULL,
    //     status ENUM('pending', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
    //     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    //     FOREIGN KEY (user_id) REFERENCES users(id)
    // );

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
