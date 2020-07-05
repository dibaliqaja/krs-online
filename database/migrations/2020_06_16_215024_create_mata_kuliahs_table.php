<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataKuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_matkul')->unique();
            $table->string('nama_matkul');
            $table->integer('sks');
            $table->integer('semester');
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('program_studi_id');
            $table->timestamps();

            $table->foreign('dosen_id')
                ->references('id')
                ->on('dosens')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('program_studi_id')
                ->references('id')
                ->on('program_studis')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_kuliahs');
    }
}
