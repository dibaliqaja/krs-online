<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KRSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kartu_rencana_studis')->insert(
            [
                'mahasiswa_id' => 2,
                'mata_kuliah_id' => 10,
                'status' => 'TERIMA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('kartu_rencana_studis')->insert(
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 3,
                'status' => 'PENGAJUAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('kartu_rencana_studis')->insert(
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 4,
                'status' => 'PENGAJUAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('kartu_rencana_studis')->insert(
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 5,
                'status' => 'PENGAJUAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('kartu_rencana_studis')->insert(
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 6,
                'status' => 'PENGAJUAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('kartu_rencana_studis')->insert(
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 7,
                'status' => 'PENGAJUAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('kartu_rencana_studis')->insert(
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 8,
                'status' => 'PENGAJUAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('kartu_rencana_studis')->insert(
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 9,
                'status' => 'PENGAJUAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }
}
