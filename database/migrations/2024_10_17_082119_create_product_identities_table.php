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
        Schema::create('product_identities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the product
            $table->text('description'); // Description of the product
            $table->string('logo')->nullable(); // Path to the logo image
            $table->text('details')->nullable(); // Additional details, optional
            $table->timestamps(); // Created at and updated at timestamps
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
