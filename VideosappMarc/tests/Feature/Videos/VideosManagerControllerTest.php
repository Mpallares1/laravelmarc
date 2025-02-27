<?php

namespace Tests\Feature\Videos;

use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideosManagerControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_with_permissions_can_manage_videos()
    {
        $this->loginAsVideoManager();

        $response = $this->get('/videos');
        $response->assertStatus(200);
    }

    /** @test */
    public function regular_users_cannot_manage_videos()
    {
        $this->loginAsRegularUser();

        $response = $this->get('/videos');
        $response->assertStatus(403);
    }

    /** @test */
    public function guest_users_cannot_manage_videos()
    {
        $response = $this->get('/videos');
        $response->assertRedirect('/login');
    }

    /** @test */
    public function superadmins_can_manage_videos()
    {
        $this->loginAsSuperAdmin();

        $response = $this->get('/videos');
        $response->assertStatus(200);
    }

    protected function loginAsVideoManager()
    {
        $user = User::factory()->create();
        $user->assignRole('Video Manager');
        $this->actingAs($user);
    }

    protected function loginAsSuperAdmin()
    {
        $user = User::factory()->create(['super_admin' => true]);
        $this->actingAs($user);
    }

    protected function loginAsRegularUser()
    {
        $user = User::factory()->create();
        $user->assignRole('Regular User');
        $this->actingAs($user);
    }

    /** @test */
    public function user_with_permissions_can_see_add_videos()
    {
        $this->loginAsVideoManager();
        $response = $this->get(route('videos.create'));
        $response->assertStatus(200);
    }

    /** @test */
    public function user_without_videos_manage_create_cannot_see_add_videos()
    {
        $this->loginAsRegularUser();
        $response = $this->get(route('videos.create'));
        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_store_videos()
    {
        $this->loginAsVideoManager();
        $response = $this->post(route('videos.store'), [
            'title' => 'Test Video',
            'description' => 'Test Description',
        ]);
        $response->assertStatus(302);
    }

    /** @test */
    public function user_without_permissions_cannot_store_videos()
    {
        $this->loginAsRegularUser();
        $response = $this->post(route('videos.store'), [
            'title' => 'Test Video',
            'description' => 'Test Description',
        ]);
        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_destroy_videos()
    {
        $this->loginAsVideoManager();
        $video = Video::factory()->create();
        $response = $this->delete(route('videos.destroy', $video));
        $response->assertStatus(302);
    }

    /** @test */
    public function user_without_permissions_cannot_destroy_videos()
    {
        $this->loginAsRegularUser();
        $video = Video::factory()->create();
        $response = $this->delete(route('videos.destroy', $video));
        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_see_edit_videos()
    {
        $this->loginAsVideoManager();
        $video = Video::factory()->create();
        $response = $this->get(route('videos.edit', $video));
        $response->assertStatus(200);
    }

    /** @test */
    public function user_without_permissions_cannot_see_edit_videos()
    {
        $this->loginAsRegularUser();
        $video = Video::factory()->create();
        $response = $this->get(route('videos.edit', $video));
        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_update_videos()
    {
        $this->loginAsVideoManager();
        $video = Video::factory()->create();
        $response = $this->put(route('videos.update', $video), [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
        ]);
        $response->assertStatus(302);
    }

    /** @test */
    public function user_without_permissions_cannot_update_videos()
    {
        $this->loginAsRegularUser();
        $video = Video::factory()->create();
        $response = $this->put(route('videos.update', $video), [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
        ]);
        $response->assertStatus(403);
    }
}
