<?php

namespace Tests\Unit;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_can_view_videos()
    {
        // Crear un video
        $video = Video::factory()->create();

        // Hacer una solicitud GET a la ruta del video
        $response = $this->get(route('videos.show', $video->id));

        // Verificar que la respuesta es exitosa y contiene los datos del video
        $response->assertStatus(200);
        $response->assertSee($video->title);
        $response->assertSee($video->description);
        $response->assertSee($video->published_at->translatedFormat('j \d\e F \d\e Y'));
    }

    /** @test */
    public function users_cannot_view_not_existing_videos()
    {
        // Hacer una solicitud GET a una ruta de video inexistente
        $response = $this->get(route('videos.show', 999));

        // Verificar que la respuesta es un error 404
        $response->assertStatus(404);
    }
}
