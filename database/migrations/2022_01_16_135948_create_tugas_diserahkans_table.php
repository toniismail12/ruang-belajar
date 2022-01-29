<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasDiserahkansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas_diserahkans', function (Blueprint $table) {
            $table->id();
            $table->string('kelas_id');
            $table->string('trainer_id');
            $table->string('id_tugas');
            $table->string('judul');
            $table->string('user_id');
            $table->string('nama_user');
            $table->string('link_tugas');
            $table->integer('nilai')->nullable();
            $table->string('catatan')->nullable();
            $table->string('status_dibaca')->nullable();

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
        Schema::dropIfExists('tugas_diserahkans');
    }
}
