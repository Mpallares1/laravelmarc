<?php

namespace Tests\Unit;

use App\Models\Video;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideosTest extends TestCase
{
    use RefreshDatabase;

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

    /** @test */
    public function user_without_permissions_can_see_default_videos_page()
    {
        // Crear un usuario sin permisos
        $user = User::factory()->create();

        // Actuar como el usuario
        $this->actingAs($user);

        // Visitar la página de videos por defecto
        $response = $this->get(route('videos.index'));

        // Verificar que la respuesta es exitosa
        $response->assertStatus(200);
    }

    /** @test */
    public function user_with_permissions_can_see_default_videos_page()
    {
        // Crear un usuario con los permisos necesarios
        $user = User::factory()->create();
        $user->givePermissionTo('view videos');

        // Actuar como el usuario
        $this->actingAs($user);

        // Visitar la página de videos por defecto
        $response = $this->get(route('videos.index'));

        // Verificar que la respuesta es exitosa
        $response->assertStatus(200);
    }

    /** @test */
    public function not_logged_users_can_see_default_videos_page()
    {
        // Visitar la página de videos por defecto sin iniciar sesión
        $response = $this->get(route('videos.index'));

        // Verificar que la respuesta es exitosa
        $response->assertStatus(200);
    }
}
