<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Multimedia;

class ApiMultimediaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_upload_multimedia()
    {
        Storage::fake('local');

        $response = $this->postJson('/api/multimedia', [
            'file' => UploadedFile::fake()->image('photo.jpg'),
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['id', 'path', 'name', 'type']);

        Storage::disk('local')->assertExists('multimedia/' . $response->json('path'));
    }

    public function test_can_list_multimedia()
    {
        Multimedia::factory()->count(3)->create();

        $response = $this->getJson('/api/multimedia');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'name', 'path', 'type', 'created_at', 'updated_at'],
            ])
            ->assertJsonCount(3);
    }

    public function test_can_show_multimedia()
    {
        $multimedia = Multimedia::factory()->create();

        $response = $this->getJson('/api/multimedia/' . $multimedia->id);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $multimedia->id,
                'name' => $multimedia->name,
                'path' => $multimedia->path,
            ]);
    }

    public function test_can_update_multimedia()
    {
        Storage::fake('local');
        $multimedia = Multimedia::factory()->create();

        $response = $this->putJson('/api/multimedia/' . $multimedia->id, [
            'file' => UploadedFile::fake()->image('new_photo.jpg'),
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['id', 'path', 'name', 'type']);

        Storage::disk('local')->assertExists('multimedia/' . $response->json('path'));
    }

    public function test_can_delete_multimedia()
    {
        Storage::fake('local');
        $multimedia = Multimedia::factory()->create([
            'path' => 'multimedia/photo.jpg',
        ]);

        // Simula que el archivo existe en el almacenamiento
        Storage::disk('local')->put($multimedia->path, 'dummy content');

        $response = $this->deleteJson('/api/multimedia/' . $multimedia->id);

        $response->assertStatus(204);

        Storage::disk('local')->assertMissing($multimedia->path);
    }
}
