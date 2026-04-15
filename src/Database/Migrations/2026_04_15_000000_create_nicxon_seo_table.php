<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('nicxon_seo_metas', function (Blueprint $table) {
            $table->id();
            $table->morphs('seoable'); // Connects to any model (Post, Page, etc.)
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('og_image')->nullable();
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists('nicxon_seo_metas'); }
};