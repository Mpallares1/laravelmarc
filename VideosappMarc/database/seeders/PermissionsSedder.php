<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Definir permisos
        $permissions = [
            'view videos',
            'create videos',
            'edit videos',
            'delete videos',
        ];

        // Crear permisos
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
