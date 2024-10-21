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
        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('message', 1000)->change();
        });
    }
    
  
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('message', 255)->change(); // Revert back to the previous length
        });
    }
    
};
