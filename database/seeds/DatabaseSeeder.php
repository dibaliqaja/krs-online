<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProgramStudisTableSeeder::class);
        $this->call(DosensTableSeeder::class);
        $this->call(TahunAjaransTableSeeder::class);
        $this->call(AngkatansTableSeeder::class);
        $this->call(MataKuliahsTableSeeder::class);
        $this->call(MahasiswasTableSeeder::class);
        $this->call(KRSTableSeeder::class);
    }
}
