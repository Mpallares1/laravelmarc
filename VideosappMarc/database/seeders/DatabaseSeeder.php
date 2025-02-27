<?php

namespace Database\Seeders;

use App\Helpers\CreateUsers;
use App\Helpers\DefaultVideos;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Video::truncate();
        Role::truncate();
        Permission::truncate();
        // Crear permisos
        CreateUsers::create_role_and_permissions();

        // Crear usuarios por defecto
        $regularUser = CreateUsers::createRegularUser();
        $videoManagerUser = CreateUsers::createVideoManagerUser();
        $superAdminUser = CreateUsers::createSuperAdminUser();

        // Asignar roles a los usuarios
        $regularUser->assignRole('regular_user');
        $videoManagerUser->assignRole('video_manager');
        $superAdminUser->assignRole('super_admin');



        // Crear un video por defecto
        DefaultVideos::createFirstVideo();
    }
}
