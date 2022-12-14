<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Talento Humano',
            'email' => 'auxiliar02@woobsing.com',
            'password' => bcrypt('Password*'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Alejandro Castillo',
            'email' => 'alejo.desarrolloweb@gmail.com',
            'password' => bcrypt('Password*'),
            'remember_token' => Str::random(10),
        ]);
    }
}
