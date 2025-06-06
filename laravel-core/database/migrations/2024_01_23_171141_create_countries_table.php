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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id');
            $table->string('name');
            $table->string('code');
            $table->string('locale_code', length: 100);
            $table->string('slug')->unique();
            $table->integer('c_default')->default(0);
            $table->string('forward');
            $table->tinyInteger('published')->default(0);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
