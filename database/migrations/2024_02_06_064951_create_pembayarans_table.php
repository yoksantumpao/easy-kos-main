<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_penghuni');
            $table->integer('id_kos');
            $table->integer('id_kamar');
            $table->integer('jlh_bln');
            $table->string('start_month');
            $table->string('end_month');
            $table->double('total_pembayaran');
            $table->enum('status_pembayaran', ['lunas', 'menunggak'])->nullable()->default('menunggak');
            $table->text('bukti_pembayaran');
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
        Schema::dropIfExists('pembayarans');
    }
}
