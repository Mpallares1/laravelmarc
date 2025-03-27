<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Series;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeriesManageControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function loginAsVideoManager()
    {
        $user = User::factory()->create();
        $user->assignRole('videosmanager');
        $this->actingAs($user);
    }

    protected function loginAsSuperAdmin()
    {
        $user = User::factory()->create();
        $user->assignRole('superadmin');
        $this->actingAs($user);
    }

    protected function loginAsRegularUser()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    /** @test */
    public function user_with_permissions_can_see_add_series()
    {
        $this->loginAsVideoManager();
        $response = $this->get(route('series.create'));
        $response->assertStatus(200);
    }

    /** @test */
    public function user_without_series_manage_create_cannot_see_add_series()
    {
        $this->loginAsRegularUser();
        $response = $this->get(route('series.create'));
        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_store_series()
    {
        $this->loginAsVideoManager();
        $response = $this->post(route('series.store'), [
            'title' => 'New Series',
            'description' => 'Series Description',
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('series', ['title' => 'New Series']);
    }

    /** @test */
    public function user_without_permissions_cannot_store_series()
    {
        $this->loginAsRegularUser();
        $response = $this->post(route('series.store'), [
            'title' => 'New Series',
            'description' => 'Series Description',
        ]);
        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_destroy_series()
    {
        $this->loginAsVideoManager();
        $series = Series::factory()->create();
        $response = $this->delete(route('series.destroy', $series));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('series', ['id' => $series->id]);
    }

    /** @test */
    public function user_without_permissions_cannot_destroy_series()
    {
        $this->loginAsRegularUser();
        $series = Series::factory()->create();
        $response = $this->delete(route('series.destroy', $series));
        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_see_edit_series()
    {
        $this->loginAsVideoManager();
        $series = Series::factory()->create();
        $response = $this->get(route('series.edit', $series));
        $response->assertStatus(200);
    }

    /** @test */
    public function user_without_permissions_cannot_see_edit_series()
    {
        $this->loginAsRegularUser();
        $series = Series::factory()->create();
        $response = $this->get(route('series.edit', $series));
        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_update_series()
    {
        $this->loginAsVideoManager();
        $series = Series::factory()->create();
        $response = $this->put(route('series.update', $series), [
            'title' => 'Updated Series',
            'description' => 'Updated Description',
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('series', ['title' => 'Updated Series']);
    }

    /** @test */
    public function user_without_permissions_cannot_update_series()
    {
        $this->loginAsRegularUser();
        $series = Series::factory()->create();
        $response = $this->put(route('series.update', $series), [
            'title' => 'Updated Series',
            'description' => 'Updated Description',
        ]);
        $response->assertStatus(403);
    }

    /** @test */
    public function user_with_permissions_can_manage_series()
    {
        $this->loginAsVideoManager();
        $response = $this->get(route('series.index'));
        $response->assertStatus(200);
    }

    /** @test */
    public function regular_users_cannot_manage_series()
    {
        $this->loginAsRegularUser();
        $response = $this->get(route('series.index'));
        $response->assertStatus(403);
    }

    /** @test */
    public function guest_users_cannot_manage_series()
    {
        $response = $this->get(route('series.index'));
        $response->assertStatus(403);
    }

    /** @test */
    public function videomanagers_can_manage_series()
    {
        $this->loginAsVideoManager();
        $response = $this->get(route('series.index'));
        $response->assertStatus(200);
    }

    /** @test */
    public function superadmins_can_manage_series()
    {
        $this->loginAsSuperAdmin();
        $response = $this->get(route('series.index'));
        $response->assertStatus(200);
    }
}
