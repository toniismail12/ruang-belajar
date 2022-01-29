<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarDataKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_data_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kelas');
            $table->string('slug');
            $table->string('nama_kelas');
            $table->text('deskripsi');
            $table->string('angkatan');
            $table->string('harga_kelas')->nullable();
            $table->string('status_publish')->nullable();
            $table->string('trainer')->nullable();
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
        Schema::dropIfExists('daftar_data_kelas');
    }
}
