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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->enum('payment_method',['credit_card','paypal','bank_transfer','cod']);
            $table->enum('status',['pending','completed','failed'])->default('pending');
            $table->string('transaction_id');
            $table->timestamps();
            //Khoá ngoại
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }
    // CREATE TABLE payments (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     order_id INT,
    //     payment_method ENUM('credit_card', 'paypal', 'bank_transfer', 'cod') NOT NULL,
    //     status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    //     transaction_id VARCHAR(255),
    //     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    //     FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
    // );
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
