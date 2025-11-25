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
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string("name_en", 100);
                $table->string("name_ro", 100);
                $table->string("name_ru", 100);
                $table->string("name_ee", 100);

                $table->string("slug_en", 120)->unique();
                $table->string("slug_ro", 120)->unique();
                $table->string("slug_ru", 120)->unique();
                $table->string("slug_ee", 120)->unique();

                $table->text("description_en")->nullable();
                $table->text("description_ro")->nullable();
                $table->text("description_ru")->nullable();
                $table->text("description_ee")->nullable();

                $table->decimal("price", 8, 2);

                $table->boolean("availability")->default(true);

                $table->boolean("has_frame")->default(true);
                $table->boolean("removable_clothes")->default(true);
                $table->boolean("has_parts")->default(false);
                $table->string("main_image")->nullable(); 

                $table->foreignId("size_id")->constrained("sizes")->cascadeOnDelete();
                $table->foreignId("category_id")->constrained("categories")->cascadeOnDelete();
               
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
