<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prodi::create([
            'nama'    => 'Prodi A',
        ]);

        Prodi::create([
            'nama'    => 'Prodi B',
        ]);

        Prodi::create([
            'nama'    => 'Prodi B',
        ]);
    }
}
