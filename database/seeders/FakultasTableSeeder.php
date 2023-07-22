<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fakultas;

class FakultasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fakultas::create([
            'nama'    => 'Fakultas A',
        ]);

        Fakultas::create([
            'nama'    => 'Fakultas B',
        ]);

        Fakultas::create([
            'nama'    => 'Fakultas C',
        ]);
    }
}
