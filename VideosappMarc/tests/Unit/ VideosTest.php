<?php

namespace Tests\Unit;

use App\Models\Video;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class VideosTest extends TestCase
{
    /** @test */
    public function can_get_formatted_published_at_date()
    {
        // Crear un video con una fecha de publicación
        $video = new Video(['published_at' => Carbon::parse('2023-01-01 12:00:00')]);

        // Verificar que la fecha de publicación se formatea correctamente
        $this->assertEquals('01/01/2023', $video->formatted_published_at);
    }

    /** @test */
    public function can_get_formatted_published_at_date_when_not_published()
    {
        // Crear un video sin fecha de publicación
        $video = new Video(['published_at' => null]);

        // Verificar que la fecha de publicación se formatea correctamente cuando no está publicada
        $this->assertEquals('No publicado', $video->formatted_published_at);
    }
}
