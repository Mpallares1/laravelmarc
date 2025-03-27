<?php

namespace App\Helpers;

use App\Models\Video;
use App\Models\User;
use App\Models\Series;

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

            // Create 3 series
            self::create_series();
        } else {
            throw new \Exception('No users found in the database.');
        }
    }

    public static function create_series()
    {
        $seriesData = [
            [
                'title' => 'Series 1',
                'description' => 'Description for Series 1',
                'image' => 'image1.jpg',
                'user_name' => 'User 1',
                'user_photo_url' => 'user1.jpg',
                'published_at' => now(),
            ],
            [
                'title' => 'Series 2',
                'description' => 'Description for Series 2',
                'image' => 'image2.jpg',
                'user_name' => 'User 2',
                'user_photo_url' => 'user2.jpg',
                'published_at' => now(),
            ],
            [
                'title' => 'Series 3',
                'description' => 'Description for Series 3',
                'image' => 'image3.jpg',
                'user_name' => 'User 3',
                'user_photo_url' => 'user3.jpg',
                'published_at' => now(),
            ],
        ];

        foreach ($seriesData as $data) {
            Series::create($data);
        }
    }
}
