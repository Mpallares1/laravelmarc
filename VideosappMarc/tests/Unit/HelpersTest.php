<?php

namespace Tests\Unit;

use App\Models\Video;
use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    // Otros métodos de prueba

    /** @test */
    public function it_creates_default_video()
    {
        // Crear un video por defecto
        $video = Video::create([
            'title' => 'Default Title',
            'description' => 'Default Description',
            'url' => 'http://example.com/default-video'
        ]);

        // Aserciones para verificar que el video se creó correctamente
        $this->assertInstanceOf(Video::class, $video);
        $this->assertEquals('Default Title', $video->title);
        $this->assertEquals('Default Description', $video->description);
        $this->assertEquals('http://example.com/default-video', $video->url);
    }
}
