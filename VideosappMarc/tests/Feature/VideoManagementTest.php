public function test_user_with_permissions_can_manage_videos()
{
$user = User::factory()->create();
$user->givePermissionTo('view videos', 'create videos', 'edit videos', 'delete videos');

$videos = Video::factory()->count(3)->create();

$this->actingAs($user);

// Visit the manage videos page
$response = $this->get(route('videos.index'));

// Assert the response is successful
$response->assertStatus(200);

// Assert the presence of the 3 videos
foreach ($videos as $video) {
$response->assertSee($video->title);
$response->assertSee($video->description);
}
}
