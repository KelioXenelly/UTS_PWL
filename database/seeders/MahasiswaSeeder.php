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
                'jurusan' => 'Bisnis Digital',
            ],
            [
                'NIM' => '2021002',
                'name' => 'Angga Pratama',
                'jurusan' => 'Bisnis Digital',
            ],
            [
                'NIM' => '2021003',
                'name' => 'Bibit Santoso',
                'jurusan' => 'Sistem dan Teknologi Informasi',
            ],
            [
                'NIM' => '2021004',
                'name' => 'Kacang Pelupuh',
                'jurusan' => 'Kewirausahaan',
            ],
            [
                'NIM' => '2021005',
                'name' => 'Pepaya Manis',
                'jurusan' => 'Sistem dan Teknologi Informasi',
            ],
        ]);
    }
}
