<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngkatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angkatans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_angkatan');
            $table->string('angkatan');
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('program_studi_id');
            $table->unsignedBigInteger('tahun_ajaran_id');
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

            $table->foreign('tahun_ajaran_id')
                ->references('id')
                ->on('tahun_ajarans')
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
        Schema::dropIfExists('angkatans');
    }
}
