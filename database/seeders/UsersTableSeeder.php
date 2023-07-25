<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        'email' => 'prodi@gmail.com',
        'email_verified_at' => now(),
	    'password' => Hash::make('12345678'),
        'role_id' => 2,
        'created_at' => now()
        ]);

        User::create([
        'email' => 'pengurus@gmail.com',
        'email_verified_at' => now(),
	    'password' => Hash::make('12345678'),
        'role_id' => 3,
        'created_at' => now()
        ]);
    }
}
