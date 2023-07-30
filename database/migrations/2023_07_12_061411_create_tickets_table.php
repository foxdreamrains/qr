<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('id_tickets');
            $table->string('tickets_code');
            $table->foreignId('studios_id');
            $table->foreignId('cabangs_id');
            $table->string('nama');
            $table->string('no_ktp')->unique();
            $table->string('email')->unique();
            $table->string('kota');
            $table->string('kode_pos');
            $table->string('no_hp');
            $table->longText('alamat');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('tickets');
    }
}
