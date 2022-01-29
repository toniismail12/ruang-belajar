<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_daftar');
            $table->string('user_id');
            $table->string('nama');
            $table->string('kelas_id');
            $table->string('status_pendaftaran')->nullable();
            $table->string('status_pembayaran')->nullable();
            $table->string('bukti_pembayaran')->nullable();

            $table->string('total_nilai')->nullable();
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
        Schema::dropIfExists('pendaftaran_kelas');
    }
}
