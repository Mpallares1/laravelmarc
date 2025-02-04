<?php

namespace Tests\Unit;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HelpersTest extends TestCase
{
    use RefreshDatabase;

    // Otros métodos de prueba

    /** @test */
    public function it_creates_default_video()
    {
        // Crear un video por defecto usando la fábrica
        $video = Video::factory()->create([
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
