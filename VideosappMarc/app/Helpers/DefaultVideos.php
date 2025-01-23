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
    public static function createDefaultVideo(array $attributes = [])
    {
        return Video::create(array_merge([
            'title' => 'Default Title',
            'description' => 'Default Description',
            'url' => 'https://www.youtube.com/watch?v=default',
            'published_at' => Carbon::now(),
            'previous' => null,
            'next' => null,
            'series_id' => 1,
        ], $attributes));
    }
}