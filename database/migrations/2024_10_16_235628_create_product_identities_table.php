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
        Schema::create('our_product_identities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // The product name, e.g., "WIJA BACKBONE"
            $table->text('description'); // The main description of the product
            $table->string('logo')->nullable(); // Path to the product's logo
            $table->text('details')->nullable(); // Additional information or details like the meaning of "WIJA"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_identities');
    }
};
