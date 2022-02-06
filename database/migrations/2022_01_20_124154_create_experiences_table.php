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
            $table->double('price');
            $table->integer('quantity_clients');
            $table->integer('status')->default(0);

            $table->foreignId('place_id')->constrained()->references('id')->on('places')->onDelete('cascade');
            $table->foreignId('host_id')->constrained()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('reservation_id')->nullable()->constrained()->references('id')->on('reservations');
            
            $table->softDeletes();
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
