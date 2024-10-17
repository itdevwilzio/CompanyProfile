<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->text('keypoints')->nullable();
        });
    }

    public function down()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn('keypoints');
        });
    }
};

