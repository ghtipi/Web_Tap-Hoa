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
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('price',12,2);
            $table->timestamps();
            //Khoá ngoại
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }
    // CREATE TABLE order_items (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     order_id INT,
    //     product_id INT,
    //     quantity INT NOT NULL,
    //     price DECIMAL(10,2) NOT NULL,
    //     FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    //     FOREIGN KEY (product_id) REFERENCES products(id)
    // );
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
