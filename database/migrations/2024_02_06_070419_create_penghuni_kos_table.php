<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghuniKosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghuni_kos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penghuni', 255);
            $table->string('email_penghuni', 255);
            $table->string('password', 255);
            $table->enum('jenis_kelamin',['Pria','Wanita']);
            $table->string('no_telp', 20);
            $table->string('no_wa', 20);
            $table->string('pekerjaan');
            $table->string('nik');
            $table->text('ktp');
            $table->text('foto_profile');

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
        Schema::dropIfExists('penghuni_kos');
    }
}
