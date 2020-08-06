<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosens')->insert(
            [
                'nidn' => '0726047704',
                'nama' => 'Andy Haryoko, S.T, M.T',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Tuban',
                'tgl_lahir' => '1970-02-02',
                'agama' => 'Islam',
                'alamat' => 'Jalan Monginsidi No. 555, Jawa Timur',
                'no_hp' => '085333333221',
                'email' => 'andyharyoko@unirow.ac.id',
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('dosens')->insert(
            [
                'nidn' => '0725038101',
                'nama' => 'Andik Adi Suryanto, S.Kom, M.Kom',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Tuban',
                'tgl_lahir' => '1980-07-02',
                'agama' => 'Islam',
                'alamat' => 'Jalan Soekarno Hatta No. 12, Surabaya',
                'no_hp' => '085333333299',
                'email' => 'andikadis@unirow.ac.id',
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('dosens')->insert(
            [
                'nidn' => '07123123133',
                'nama' => 'Alfian Nurlifa, S.Kom, M.Kom',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Tuban',
                'tgl_lahir' => '1980-07-02',
                'agama' => 'Islam',
                'alamat' => 'Jalan Soekarno Hatta No. 12, Surabaya',
                'no_hp' => '085333333299',
                'email' => 'alfiannur@unirow.ac.id',
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('dosens')->insert(
            [
                'nidn' => '07123125233',
                'nama' => 'Amaludin Arifia, S.Kom, M.Kom',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Tuban',
                'tgl_lahir' => '1980-07-02',
                'agama' => 'Islam',
                'alamat' => 'Jalan Soekarno Hatta No. 12, Rengel, Tuban',
                'no_hp' => '085333333299',
                'email' => 'amaludinarifia@unirow.ac.id',
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('dosens')->insert(
            [
                'nidn' => '07123125553',
                'nama' => 'Aris Wijayanti, S.Kom, M.Kom',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Tuban',
                'tgl_lahir' => '1980-07-02',
                'agama' => 'Islam',
                'alamat' => 'Jalan Soekarno Hatta No. 12, Surabaya',
                'no_hp' => '085333333299',
                'email' => 'ariswijayanti@unirow.ac.id',
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('dosens')->insert(
            [
                'nidn' => '07123123983',
                'nama' => 'Asfan Muqtadir, S.Kom, M.Kom',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Tuban',
                'tgl_lahir' => '1980-07-02',
                'agama' => 'Islam',
                'alamat' => 'Jalan Soekarno Hatta No. 12, Surabaya',
                'no_hp' => '085333333299',
                'email' => 'asfanmuqtadir@unirow.ac.id',
                'program_studi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );


        DB::table('dosens')->insert(
            [
                'nidn' => '4112424232',
                'nama' => 'Agung Gumelar, S.T, M.T',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Sumedang',
                'tgl_lahir' => '1970-05-02',
                'agama' => 'Islam',
                'alamat' => 'Jalan Makarema Barat No. 555, Sumedang Barat',
                'no_hp' => '085333333345',
                'email' => 'agung@gmail.com',
                'program_studi_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('dosens')->insert(
            [
                'nidn' => '4112424111',
                'nama' => 'Sasa Rumiya, M.Pd',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tgl_lahir' => '1975-07-11',
                'agama' => 'Islam',
                'alamat' => 'Jalan Gayam Ujung No. 15, Bandung Barat',
                'no_hp' => '085333331111',
                'email' => 'sasa@gmail.com',
                'program_studi_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
