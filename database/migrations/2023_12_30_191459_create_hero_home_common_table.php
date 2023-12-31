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
        Schema::create('hero_home_common', function (Blueprint $table) {
            $table->id();
            $table->string('hero_image')->nullable();
            $table->string('color1')->nullable();
            $table->string('color2')->nullable();
            $table->string('color3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_home_common');
    }
};
