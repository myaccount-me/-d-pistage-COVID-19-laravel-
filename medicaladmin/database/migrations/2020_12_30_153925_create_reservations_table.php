<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('motif');
            $table->datetime('date');
            $table->string('etat')->default('en attente');
            $table->BigInteger('labo_id')->unsigned();
            $table->BigInteger('patient_id')->unsigned();
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
        Schema::dropIfExists('reservations');
    }
}
