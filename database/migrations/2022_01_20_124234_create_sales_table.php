<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->foreignId('experience_id')->constrained()->references('id')->on('experiences')->onDelete('cascade');
            $table->foreignId('buyer_id')->constrained()->references('id')->on('users')->onDelete('cascade');//comprador
            $table->double('amount');
            $table->integer('status')->default(0);
            $table->integer('finished')->default(0);
            $table->integer('commented')->default(0);

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
        Schema::dropIfExists('sales');
    }
}
