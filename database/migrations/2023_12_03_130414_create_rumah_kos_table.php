<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahKosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumah_kos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pengelola');
            $table->integer('id_fs_ks');
            $table->string('nama_kos', 150);
            $table->enum('jenis_kos', ['pria','wanita', 'campur']);
            $table->integer('jlh_kamar');
            $table->integer('jlh_gedung');
            $table->string('no_telp', 150);
            $table->string('provinsi', 150);
            $table->string('kab_kota', 150);
            $table->string('kec', 150);
            $table->text('alamat');
            $table->string('kode_pos', 15);
            $table->text('deskripsi');

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
        Schema::dropIfExists('rumah_kos');
    }
}
