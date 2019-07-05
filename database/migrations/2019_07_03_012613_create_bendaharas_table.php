<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBendaharasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
               Schema::create('bendaharas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('kode_bendahara');
            $table->string('nama_bendahara');
            $table->string('phone');
            $table->string('address');
            $table->string('email')->unique();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bendaharas');
    }
}
