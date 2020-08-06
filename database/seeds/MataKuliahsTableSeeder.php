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
                'nama_matkul' => 'Pemrograman 1 (C/C++)',
                'sks' => 3,
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
                'sks' => 2,
                'semester' => 1,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'UNV1101',
                'nama_matkul' => 'Pancasila',
                'sks' => 2,
                'semester' => 1,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF1201',
                'nama_matkul' => 'Bahasa Inggris 1',
                'sks' => 2,
                'semester' => 1,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF1202',
                'nama_matkul' => 'Matematika 1',
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
                'kode_matkul' => 'IF1203',
                'nama_matkul' => 'Statistika',
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
                'kode_matkul' => 'IF1301',
                'nama_matkul' => 'Pengantar Teknologi Informasi',
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
                'kode_matkul' => 'IF1303',
                'nama_matkul' => 'Praktikum Pemrograman 1',
                'sks' => 1,
                'semester' => 1,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'UNV2101',
                'nama_matkul' => 'Agama',
                'sks' => 2,
                'semester' => 2,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'UNV2102',
                'nama_matkul' => 'Kewarganegaraan',
                'sks' => 2,
                'semester' => 2,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF2201',
                'nama_matkul' => 'Bahasa Inggris 2',
                'sks' => 2,
                'semester' => 2,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF2202',
                'nama_matkul' => 'Matematika 2',
                'sks' => 3,
                'semester' => 2,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF2203',
                'nama_matkul' => 'Matematika Diskrit',
                'sks' => 3,
                'semester' => 2,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF2301',
                'nama_matkul' => 'Dasar & Konsep Manajemen Informasi',
                'sks' => 3,
                'semester' => 2,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF2302',
                'nama_matkul' => 'Struktur Data',
                'sks' => 3,
                'semester' => 2,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF2303',
                'nama_matkul' => 'Praktikum Struktur Data',
                'sks' => 1,
                'semester' => 2,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'UNV3101',
                'nama_matkul' => 'Bahasa Indonesia',
                'sks' => 3,
                'semester' => 3,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF3202',
                'nama_matkul' => 'Aljabar Linear dan Matrik',
                'sks' => 3,
                'semester' => 3,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF3301',
                'nama_matkul' => 'Rangkaian Logika',
                'sks' => 3,
                'semester' => 3,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF3302',
                'nama_matkul' => 'Riset Operasi',
                'sks' => 3,
                'semester' => 3,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF3303',
                'nama_matkul' => 'Pemrograman 2 (Java)',
                'sks' => 3,
                'semester' => 3,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF3304',
                'nama_matkul' => 'Praktikum Pemrograman 2',
                'sks' => 1,
                'semester' => 3,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF3305',
                'nama_matkul' => 'Basis Data',
                'sks' => 3,
                'semester' => 3,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF3306',
                'nama_matkul' => 'Praktikum Basis Data',
                'sks' => 1,
                'semester' => 3,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'UNV4101',
                'nama_matkul' => 'Kewirausahaan',
                'sks' => 2,
                'semester' => 4,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF4301',
                'nama_matkul' => 'Sistem Operasi',
                'sks' => 3,
                'semester' => 4,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF4302',
                'nama_matkul' => 'Arsitektur Sistem Komputer',
                'sks' => 3,
                'semester' => 4,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF4303',
                'nama_matkul' => 'Praktikum Rangkaian Logika',
                'sks' => 1,
                'semester' => 4,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF4304',
                'nama_matkul' => 'Praktikum Sistem Operasi',
                'sks' => 1,
                'semester' => 4,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF4305',
                'nama_matkul' => 'Pemrograman 3 (Java Lanjut)',
                'sks' => 3,
                'semester' => 4,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF4306',
                'nama_matkul' => 'Praktikum Pemrograman 3',
                'sks' => 1,
                'semester' => 4,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF4307',
                'nama_matkul' => 'Analisa & Desain Sistem',
                'sks' => 3,
                'semester' => 4,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF4308',
                'nama_matkul' => 'Etika Profesi',
                'sks' => 2,
                'semester' => 4,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF4309',
                'nama_matkul' => 'Metode Penelitian',
                'sks' => 2,
                'semester' => 4,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF5401',
                'nama_matkul' => 'Interfacing',
                'sks' => 3,
                'semester' => 5,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF5402',
                'nama_matkul' => 'Keamanan Komputer',
                'sks' => 3,
                'semester' => 5,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF5403',
                'nama_matkul' => 'Data Mining',
                'sks' => 3,
                'semester' => 5,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF5404',
                'nama_matkul' => 'Sistem Informasi Geografis',
                'sks' => 3,
                'semester' => 5,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF5301',
                'nama_matkul' => 'Jaringan Komputer',
                'sks' => 3,
                'semester' => 5,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF5302',
                'nama_matkul' => 'Praktikum Jaringan Komputer',
                'sks' => 1,
                'semester' => 5,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF5303',
                'nama_matkul' => 'Pemrograman 4 (Web)',
                'sks' => 3,
                'semester' => 5,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF5304',
                'nama_matkul' => 'Praktikum Pemrograman 4',
                'sks' => 1,
                'semester' => 5,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF5305',
                'nama_matkul' => 'Komputer Grafik',
                'sks' => 1,
                'semester' => 5,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF5306',
                'nama_matkul' => 'Rekayasa Perangkat Lunak',
                'sks' => 3,
                'semester' => 5,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF5307',
                'nama_matkul' => 'Basis Data Lanjut',
                'sks' => 3,
                'semester' => 5,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF5308',
                'nama_matkul' => 'Praktikum Basis Data Lanjut',
                'sks' => 1,
                'semester' => 5,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF6401',
                'nama_matkul' => 'Pemrograman Perangkat Keras',
                'sks' => 3,
                'semester' => 6,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF6402',
                'nama_matkul' => 'Teknologi Wireless',
                'sks' => 3,
                'semester' => 6,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF6403',
                'nama_matkul' => 'Basis Data Terdistribusi',
                'sks' => 3,
                'semester' => 6,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF6404',
                'nama_matkul' => 'Praktikum Interfacing',
                'sks' => 1,
                'semester' => 6,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF6405',
                'nama_matkul' => 'Praktikum Keamanan Komputer',
                'sks' => 1,
                'semester' => 6,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF6406',
                'nama_matkul' => 'Praktikum Data Mining',
                'sks' => 1,
                'semester' => 6,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF6407',
                'nama_matkul' => 'Praktikum Sistem Informasi Geografis',
                'sks' => 1,
                'semester' => 6,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF6301',
                'nama_matkul' => 'Pemrograman 5 (Mobile)',
                'sks' => 3,
                'semester' => 6,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF6302',
                'nama_matkul' => 'Praktikum Pemrograman 5',
                'sks' => 1,
                'semester' => 6,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF6303',
                'nama_matkul' => 'Sistem Informasi Bisnis (CRM+ERP+Ebussines)',
                'sks' => 3,
                'semester' => 6,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF6304',
                'nama_matkul' => 'Analisa & Desain Berorientasi Objek',
                'sks' => 3,
                'semester' => 6,
                'dosen_id' => 2,
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('mata_kuliahs')->insert(
            [
                'kode_matkul' => 'IF6305',
                'nama_matkul' => 'Permodelan dan Simulasi',
                'sks' => 3,
                'semester' => 6,
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
                'kode_matkul' => 'UNV8101',
                'nama_matkul' => 'Pengelanan PGRI',
                'sks' => 2,
                'semester' => 8,
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
