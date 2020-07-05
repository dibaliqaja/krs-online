<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramStudisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('program_studis')->insert(
            [
                'kode_prodi' => 'T01',
                'nama_prodi' => 'Teknik Informatika',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('program_studis')->insert(
            [
                'kode_prodi' => 'T02',
                'nama_prodi' => 'Teknik Industri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('program_studis')->insert(
            [
                'kode_prodi' => 'P01',
                'nama_prodi' => 'Pendidikan Bahasa dan Sastra Jepang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }
}
