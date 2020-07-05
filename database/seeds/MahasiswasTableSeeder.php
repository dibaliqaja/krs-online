<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => '1412180001',
            'name' => 'Ahmad Baduri',
            'email' => 'baduri@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'mahasiswa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mahasiswas')->insert(
            [
                'npm' => '1412180001',
                'name' => 'Ahmad Baduri',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Tuban',
                'tgl_lahir' => '1995-05-02',
                'agama' => 'Islam',
                'alamat' => 'Jalan Buntu Barat No. 555, Tuban',
                'no_hp' => '085333322245',
                'user_id' => 2,
                'angkatan_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('users')->insert([
            'username' => '1412180034',
            'name' => 'Ahmad Suli',
            'email' => 'suli@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'mahasiswa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mahasiswas')->insert(
            [
                'npm' => '1412180034',
                'name' => 'Ahmad Suli',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Jakarta',
                'tgl_lahir' => '1995-05-02',
                'agama' => 'Islam',
                'alamat' => 'Jalan Gayam Gerak No. 99, Jakarta Pusat',
                'no_hp' => '085333314245',
                'user_id' => 3,
                'angkatan_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('users')->insert([
            'username' => '1412180023',
            'name' => 'Gun Afrianza',
            'email' => 'gun@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'mahasiswa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mahasiswas')->insert(
            [
                'npm' => '1412180023',
                'name' => 'Gun Afrianza',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Lampung',
                'tgl_lahir' => '1995-05-02',
                'agama' => 'Islam',
                'alamat' => 'Jalan Gogo Baba No. 1, Lampung Utara',
                'no_hp' => '085333314245',
                'user_id' => 4,
                'angkatan_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('users')->insert([
            'username' => '1312180002',
            'name' => 'Sana Sanusi',
            'email' => 'sana@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'mahasiswa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mahasiswas')->insert(
            [
                'npm' => '1312180002',
                'name' => 'Sana Sanusi',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tgl_lahir' => '1998-01-02',
                'agama' => 'Islam',
                'alamat' => 'Jalan Belok Papan No. 19, Bandung Utara',
                'no_hp' => '089833314245',
                'user_id' => 5,
                'angkatan_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('users')->insert([
            'username' => '1212190033',
            'name' => 'Bulan Ambar',
            'email' => 'bulan@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'mahasiswa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mahasiswas')->insert(
            [
                'npm' => '1212190033',
                'name' => 'Bulan Ambar',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Semarang',
                'tgl_lahir' => '1999-01-02',
                'agama' => 'Islam',
                'alamat' => 'Jalan Gumul No. 10, Semarang',
                'no_hp' => '089899314245',
                'user_id' => 6,
                'angkatan_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
