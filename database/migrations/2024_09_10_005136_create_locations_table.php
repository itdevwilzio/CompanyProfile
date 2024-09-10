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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // To store the image URL or path
            $table->string('vouchers_package'); // Type of vouchers. Vouchers can be different value in some locations.
            $table->enum('account_bank', ['Bank Mandiri','Bank BRI', 'Dana', 'OVO']); // Bank account associated with the location
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
