<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuRencanaStudisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_rencana_studis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('mata_kuliah_id');
            $table->enum('status',['PENGAJUAN', 'TERIMA']);
            $table->timestamps();

            $table->foreign('mahasiswa_id')
                ->references('id')
                ->on('mahasiswas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('mata_kuliah_id')
                ->references('id')
                ->on('mata_kuliahs')
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
        Schema::dropIfExists('kartu_rencana_studis');
    }
}
