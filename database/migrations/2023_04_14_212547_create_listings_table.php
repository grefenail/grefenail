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
            $table->text('slug')->comment("Slug of the listing");
            $table->text('description')->nullable();
            $table->string('petName', 100)->nullable()->comment("Name of the pet");
            $table->string('address', 200)->nullable()->comment("Address of the listing");
            $table->string('email')->nullable()->comment("Email of the owner");
            $table->integer('petAge')->nullable()->comment("Age of the pet");
            $table->string('contact', 20)->nullable()->comment("Contact number of the owner");

            $table->unsignedBigInteger('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories');
    
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing');
    }
};
