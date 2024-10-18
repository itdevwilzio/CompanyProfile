<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('super_teams', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // The title, e.g., "Super Team"
            $table->text('description'); // Detailed description of the team
            $table->string('image')->nullable(); // For storing the path to the image
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('super_teams');
    }
};
