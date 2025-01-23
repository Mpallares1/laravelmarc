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

        CreateUsers::creacioUsuariDefecte();

        DefaultVideos::createDefaultVideo();


    }
}
