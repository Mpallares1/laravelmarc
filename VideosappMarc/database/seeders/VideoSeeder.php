<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helpers\DefaultVideos;

class VideoSeeder extends Seeder
{
    public function run()
    {
        DefaultVideos::createDefaultVideo();
        DefaultVideos::createSecondDefaultVideo();
        DefaultVideos::createThirdDefaultVideo();

    }
}
