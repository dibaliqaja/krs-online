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
                'kode_matkul' => 'IF7301',
                'nama_matkul' => 'Sistem Pendukung Keputusan',
                'sks' => 3,
                'semester' => 7,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF7302',
                'nama_matkul' => 'Pemrograman 6 (Mobile lanjut)',
                'sks' => 3,
                'semester' => 7,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF7303',
                'nama_matkul' => 'Praktikum Pemrograman 6',
                'sks' => 1,
                'semester' => 7,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF7304',
                'nama_matkul' => 'Interaksi Manusia dan Komputer',
                'sks' => 3,
                'semester' => 7,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF7305',
                'nama_matkul' => 'Manajemen Proyek Perangkat Lunak',
                'sks' => 3,
                'semester' => 7,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF7306',
                'nama_matkul' => 'Digital Image Processing',
                'sks' => 3,
                'semester' => 7,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF7307',
                'nama_matkul' => 'Praktikum Digital Image Processing',
                'sks' => 1,
                'semester' => 7,
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
