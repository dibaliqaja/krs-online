<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AngkatansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('angkatans')->insert(
            [
                'kode_angkatan' => 'TF218A',
                'angkatan' => '2018 A',
                'program_studi_id' => 1,
                'dosen_id' => 1,
                'tahun_ajaran_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('angkatans')->insert(
            [
                'kode_angkatan' => 'TF218B',
                'angkatan' => '2018 B',
                'program_studi_id' => 1,
                'dosen_id' => 2,
                'tahun_ajaran_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('angkatans')->insert(
            [
                'kode_angkatan' => 'TI219A',
                'angkatan' => '2019 A',
                'program_studi_id' => 2,
                'dosen_id' => 3 ,
                'tahun_ajaran_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('angkatans')->insert(
            [
                'kode_angkatan' => 'PJ219A',
                'angkatan' => '2019 A',
                'program_studi_id' => 3,
                'dosen_id' => 4,
                'tahun_ajaran_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }
}
