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
        Schema::table('home_hero', function (Blueprint $table) {
            $table->string('mini_security_title')->nullable();
            $table->dropColumn('hero_image');
            $table->dropColumn('color1');
            $table->dropColumn('color2');
            $table->dropColumn('color3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_hero', function (Blueprint $table) {
            $table->string('hero_image');
            $table->string('color1');
            $table->string('color2');
            $table->string('color3');
            $table->dropColumn('mini_security_title');
        });
    }
};
