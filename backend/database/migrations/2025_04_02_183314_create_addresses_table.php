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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('full_address');
            $table->string('city',100)->nullable();
            $table->string('country',100)->nullable();
            $table->string('zip_code',20)->nullable();
            $table->timestamps();
            //Khoá ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    // CREATE TABLE addresses (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     user_id INT,
    //     full_address TEXT NOT NULL,
    //     city VARCHAR(100),
    //     country VARCHAR(100),
    //     zip_code VARCHAR(20),
    //     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    //     FOREIGN KEY (user_id) REFERENCES users(id)
    // );

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
