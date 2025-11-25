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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name_en", 50)->unique();
            $table->string("name_ru", 50)->unique();
            $table->string("name_ro", 50)->unique();
            $table->string("name_ee", 50)->unique();

            $table->string("slug_en", 60)->unique();
            $table->string("slug_ru", 60)->unique();
            $table->string("slug_ro", 60)->unique();
            $table->string("slug_ee", 60)->unique();

            $table->unsignedBigInteger("parent_id")->nullable();

            $table->foreign("parent_id")->references("id")->on("categories")->cascadeOnDelete();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
