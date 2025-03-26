<?php

namespace App\Helpers;

use App\Models\Video;
use App\Models\User;

class DefaultVideos
{
    public static function getDefaultValues()
    {
        $user = User::first();

        if ($user) {
            Video::create([
                'title' => 'Video 1',
                'description' => 'Descripcio video 1',
                'url' => 'https://www.youtube.com/embed/aohimZWy-gg',
                'published_at' => '2025-03-25 14:54:56',
                'previous' => null,
                'next' => null,
                'series_id' => null,
                'user_id' => $user->id,
            ]);
            // Video 2
            Video::create([
                'title' => 'Video 2',
                'description' => 'Descripcio video 2',
                'url' => 'https://www.youtube.com/embed/k8BMwR7O4jE',
                'published_at' => now(),
                'previous' => null,
                'next' => null,
                'series_id' => null,
                'user_id' => $user->id,
            ]);

            // Video 3
            Video::create([
                'title' => 'Video 3',
                'description' => 'Descripcio video 3',
                'url' => 'https://www.youtube.com/embed/EXeN6v-7aT8',
                'published_at' => now(),
                'previous' => null,
                'next' => null,
                'series_id' => null,
                'user_id' => $user->id,
            ]);

            // Add more default videos as needed
        } else {
            throw new \Exception('No users found in the database.');
        }
    }
}




