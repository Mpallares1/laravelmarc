<?php

namespace App\Helpers;
use App\Models\Video;

class DefaultVideos
{
    public static function getDefaultValues()
    {
        // Video 1
        Video::create([
            'title' => 'Video 1',
            'description' => 'Description videosda',
            'url' => 'https://www.youtube.com/embed/aohimZWy-gg',
            'published_at' => now(),
            'previous' => null,
            'next' => null,
            'series_id' => null,
        ]);

        // Video 2
        Video::create([
            'title' => 'Video 2',
            'description' => 'Description video 2',
            'url' => 'https://www.youtube.com/embed/k8BMwR7O4jE',
            'published_at' => now(),
            'previous' => null,
            'next' => null,
            'series_id' => null,
        ]);

        // Video 3
        Video::create([
            'title' => 'Video 3',
            'description' => 'Description video 3',
            'url' => 'https://www.youtube.com/embed/EXeN6v-7aT8',
            'published_at' => now(),
            'previous' => null,
            'next' => null,
            'series_id' => null,
        ]);
    }
}
