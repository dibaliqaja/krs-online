<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunAjaransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tahun_ajarans')->insert(
            [
                'tahun_ajaran' => 'Semester Ganjil 2017/2018',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('tahun_ajarans')->insert(
            [
                'tahun_ajaran' => 'Semester Genap 2017/2018',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('tahun_ajarans')->insert(
            [
                'tahun_ajaran' => 'Semester Ganjil 2018/2019',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('tahun_ajarans')->insert(
            [
                'tahun_ajaran' => 'Semester Genap 2018/2019',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }
}
