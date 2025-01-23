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
        return Video::create([
            'title' => 'Default Title',
            'description' => 'Default Description',
            'url' => 'https://www.youtube.com/embed/7GG7j_w0uE8',
            'published_at' => Carbon::now(),
            'previous' => null,
            'next' => null,
            'series_id' => 1,
        ], $attributes);
    }
}
