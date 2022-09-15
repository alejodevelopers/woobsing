<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permiso::create([
            'permiso' => 'Administrar ventas',
            'role_id'=>1
        ]);
        Permiso::create([
            'permiso' => 'Administrar Stock',
            'role_id'=>1
        ]);
        Permiso::create([
            'permiso' => 'Administrar Productos',
            'role_id'=>2
        ]);
        Permiso::create([
            'permiso' => 'Administrar clientes',
            'role_id'=>3
        ]);
        Permiso::create([
            'permiso' => 'Administrar stock',
            'role_id'=>2
        ]);
        Permiso::create([
            'permiso' => 'Administrar proveedores',
            'role_id'=>1
        ]);
        Permiso::create([
            'permiso' => 'Generar Informes',
            'role_id'=>3
        ]);
    }
}
