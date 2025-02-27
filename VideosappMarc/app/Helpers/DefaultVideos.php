<?php

namespace App\Helpers;

use App\Models\Video;
use Carbon\Carbon;

class DefaultVideos
{
    /**
     * Crea un video por defecto.
     *
     * @param array $attributes
     * @return \App\Models\Video
     */
    public static function createFirstVideo(): Video
    {
        $video = Video::create([
            'title' => 'Video title',
            'description' => 'Video description',
            'url' => 'https://www.youtube.com/embed/7EjnAPp2dHk',
            'published_at' => now(),
            'previous' => null,
            'next' => null,
            'series_id' => null,
        ]);

        if (!$video) {
            throw new \Exception('Failed to create video');
        }

        return $video;
    }


    /**
     * Crea el segundo video por defecto.
     *
     * @param array $attributes
     * @return \App\Models\Video
     */
    public static function createSecondDefaultVideo(array $attributes = []): Video
    {
        $defaultAttributes = [
            'title' => 'Florian',
            'description' => 'Second Default Description',
            'url' => 'https://www.youtube.com/embed/k8BMwR7O4jE',
            'published_at' => Carbon::now(),
            'previous' => null,
            'next' => null,
            'series_id' => 2,
        ];

        $attributes = array_merge($defaultAttributes, $attributes);

        return Video::create($attributes);
    }

    /**
     * Crea el tercer video por defecto.
     *
     * @param array $attributes
     * @return \App\Models\Video
     */
    public static function createThirdDefaultVideo(array $attributes = []): Video
    {
        $defaultAttributes = [
            'title' => 'Videos Random',
            'description' => 'Third Default Description',
            'url' => 'https://www.youtube.com/embed/EXeN6v-7aT8',
            'published_at' => Carbon::now(),
            'previous' => null,
            'next' => null,
            'series_id' => 3,
        ];

        $attributes = array_merge($defaultAttributes, $attributes);

        return Video::create($attributes);
    }
}
