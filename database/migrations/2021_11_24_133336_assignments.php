<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Assignments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 20);
            $table->enum('nama_mapel', ['MATH', 'ENGLISH', 'PHYSICS', 'BIOLOGY', 'CHEMISTRY', 'ENGINEERING']);
            $table->text('nama_tugas');
            $table->dateTime('deadline_time');
            $table->boolean('status_pengerjaan')->default(0);
            $table->integer('skor')->default(0);
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
        Schema::dropIfExists('assignments');
    }
}
