<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencieLanguaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencie_languaje', function (Blueprint $table) {
            $table->id();

            $table->foreignId('experience_id')->references('id')->on('experiences')->constrained()->cascadeOnDelete();
            $table->foreignId('languaje_id')->references('id')->on('languajes')->constrained()->cascadeOnDelete();

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
        Schema::dropIfExists('experiencie_languaje');
    }
}
