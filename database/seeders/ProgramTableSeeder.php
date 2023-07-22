<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::create([
            'nama'    => 'Program A',
        ]);

        Program::create([
            'nama'    => 'Program B',
        ]);

        Program::create([
            'nama'    => 'Program C',
        ]);
    }
}
