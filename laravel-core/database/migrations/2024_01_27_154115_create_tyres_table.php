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
        Schema::create('tyres', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('publish')->default(0);
            $table->foreignId('country_id')->index();
            $table->foreignId('brand_id')->index();
            $table->foreignId('search_tag_id')->index();
            $table->foreignId('season_id')->default(null)->index();
            $table->string('name');
            $table->string('preview_name');
            $table->string('slug')->unique();
            $table->string('external_link')->default(null);
            $table->integer('order')->default(0);
            $table->text('description');
            $table->string('catalogue_image')->default(null);
            $table->json('product_images')->default(null);
            $table->json('features_benifits')->default(null);
            $table->json('sizes')->default(null);
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tyres');
    }
};
