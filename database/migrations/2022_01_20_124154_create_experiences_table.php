<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('subtitle');
            $table->text('description');

            $table->foreignId('place_id')->constrained()->references('id')->on('places');
            $table->foreignId('languaje_id')->constrained()->references('id')->on('languajes');
            $table->foreignId('host_id')->constrained()->references('id')->on('users');
            $table->foreignId('reservation_id')->nullable()->constrained()->references('id')->on('reservations');
            


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
        Schema::dropIfExists('experiences');
    }
}
