<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'nombre' => 'Administrador',
            'user_id' => 1
        ]);
        Role::create([
            'nombre' => 'Vendedor',
            'user_id' => 2
        ]);
        Role::create([
            'nombre' => 'Proveedor',
            'user_id' => 3
        ]);
    }
}
