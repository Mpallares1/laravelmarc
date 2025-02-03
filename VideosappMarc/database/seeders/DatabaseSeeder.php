<?php

namespace Database\Seeders;

use App\Helpers\CreateUsers;
use App\Helpers\DefaultVideos;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Video::truncate();

        // Crear permisos
        CreateUsers::createPermissions();

        // Crear usuarios por defecto
        $regularUser = CreateUsers::createRegularUser();
        $videoManagerUser = CreateUsers::createVideoManagerUser();
        $superAdminUser = CreateUsers::createSuperAdminUser();

        // Asignar roles a los usuarios
        $regularUser->assignRole('Regular User');
        $videoManagerUser->assignRole('Video Manager');
        $superAdminUser->assignRole('Super Admin');

        // Crear un video por defecto
        DefaultVideos::createDefaultVideo();
    }
}
