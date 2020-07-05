<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF1302',
                'nama_matkul' => 'Pemrograman 1',
                'sks' => 1,
                'semester' => 1,
                'dosen_id' => 1,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF1304',
                'nama_matkul' => 'Multimedia',
                'sks' => 3,
                'semester' => 1,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'TI1322',
                'nama_matkul' => 'Mesin Industri',
                'sks' => 2,
                'semester' => 1,
                'dosen_id' => 3,
                'program_studi_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'TI1311',
                'nama_matkul' => 'Analisa Pabrik',
                'sks' => 3,
                'semester' => 1,
                'dosen_id' => 3,
                'program_studi_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'PJ2222',
                'nama_matkul' => 'Dasar Bahasa Jepang',
                'sks' => 1,
                'semester' => 1,
                'dosen_id' => 4,
                'program_studi_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'PJ2442',
                'nama_matkul' => 'Sastra Dasar',
                'sks' => 3,
                'semester' => 1,
                'dosen_id' => 4,
                'program_studi_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }
}
