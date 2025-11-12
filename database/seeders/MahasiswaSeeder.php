<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            [
                'NIM' => '2021001',
                'name' => 'Andi Wijaya',
                'tempat_lahir' => 'Pontianak',
                'tanggal_lahir' => '2005-11-12',
                'jurusan' => 'Bisnis Digital',
                'angkatan' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'NIM' => '2021002',
                'name' => 'Angga Pratama',
                'tempat_lahir' => 'Ketapang',
                'tanggal_lahir' => '2003-08-07',
                'jurusan' => 'Bisnis Digital',
                'angkatan' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'NIM' => '2021003',
                'name' => 'Bibit Santoso',
                'tempat_lahir' => 'Singkawang',
                'tanggal_lahir' => '2001-04-24',
                'jurusan' => 'Sistem dan Teknologi Informasi',
                'angkatan' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'NIM' => '2021004',
                'name' => 'Kacang Pelupuh',
                'tempat_lahir' => 'Singkawang',
                'tanggal_lahir' => '2001-08-09',
                'jurusan' => 'Kewirausahaan',
                'angkatan' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'NIM' => '2021005',
                'name' => 'Pepaya Manis',
                'tempat_lahir' => 'Singkawang',
                'tanggal_lahir' => '2001-03-02',
                'jurusan' => 'Sistem dan Teknologi Informasi',
                'angkatan' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
