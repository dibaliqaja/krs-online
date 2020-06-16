<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('npm')->unique();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('program_studis_id');
            $table->unsignedBigInteger('semesters_id');
            $table->unsignedBigInteger('angkatans_id');
            $table->timestamps();

            $table->foreign('program_studis_id')
                ->references('id')
                ->on('program_studis')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('semesters_id')
                ->references('id')
                ->on('semesters')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('angkatans_id')
                ->references('id')
                ->on('angkatans')
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
        Schema::dropIfExists('mahasiswas');
    }
}
