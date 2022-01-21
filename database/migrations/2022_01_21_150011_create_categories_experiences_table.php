<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_experiences', function (Blueprint $table) {
            $table->id();

            $table->foreignId('experience_id')->references('id')->on('experiences')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->references('id')->on('categories')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_experiences');
    }
}
