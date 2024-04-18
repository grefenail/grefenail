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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('pet_name', 100);
            $table->integer('pet_age');
            $table->unsignedBigInteger('pet_size');
            $table->unsignedBigInteger('pet_gender');
            $table->text('slug');
            $table->boolean('sterile');
            $table->boolean('is_active')->default(false);
            $table->text('description');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('pet_size')->references('id')->on('pet_sizes');
            $table->foreign('pet_gender')->references('id')->on('pet_genders');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
