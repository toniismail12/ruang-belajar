<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskboards', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('user_id')->nullable();
            $table->string('project_id')->nullable();
            $table->string('task_title');
            $table->string('deskripsi');
            $table->string('selesai');

            $table->string('status')->nullable();

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
        Schema::dropIfExists('taskboards');
    }
}
