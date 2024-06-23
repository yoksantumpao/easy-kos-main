<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipeKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_kamars', function (Blueprint $table) {
            $table->id();
            $table->char('nama_tipe');
            $table->char('harga_kamar');
            $table->char('ukuran_kamar');
            $table->char('foto_tipe_kamar');
            $table->text('fasilitas_kamar');
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
        Schema::dropIfExists('tipe_kamars');
    }
}
