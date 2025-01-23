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

        // Example user data
        $user = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password123',
        ];

        // Call the method with the required argument
        CreateUsers::creacioUsuariDefecte($user);

        DefaultVideos::createDefaultVideo();
    }
}
