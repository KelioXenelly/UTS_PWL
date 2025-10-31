<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matakuliah')->insert([
            [
                'kode' => 'MK001',
                'nama_matakuliah' => 'Pemrograman Web',
            ],
            [
                'kode' => 'MK002',
                'nama_matakuliah' => 'Basis Data',
            ],
            [
                'kode' => 'MK003',
                'nama_matakuliah' => 'Manajemen Proyek TI',
            ],
            [
                'kode' => 'MK004',
                'nama_matakuliah' => 'Keamanan Jaringan',
            ],
            [
                'kode' => 'MK005',
                'nama_matakuliah' => 'Rekayasa Perangkat Lunak',
            ],
        ]);
    }
}
