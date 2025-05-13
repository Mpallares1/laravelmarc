<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use App\Models\Video;
use App\Events\VideoCreated;
use App\Notifications\VideoCreatedNotification;

class VideoNotificationsTest extends TestCase
{
    public function test_video_created_event_is_dispatched()
    {
        // Arrange: Fake the event
        Event::fake();

        // Act: Create a video
        $video = Video::factory()->create();

        // Assert: Check if the VideoCreated event was dispatched
        Event::assertDispatched(VideoCreated::class, function ($event) use ($video) {
            return $event->video->id === $video->id;
        });
    }

    public function test_push_notification_is_sent_when_video_is_created()
    {
        // Arrange: Fake the notification
        Notification::fake();

        // Act: Create a video
        $video = Video::factory()->create();

        // Assert: Check if the notification was sent
        Notification::assertSentTo(
            [$video->user], // Assuming the video has a user relationship
            VideoCreatedNotification::class,
            function ($notification, $channels) use ($video) {
                return $notification->video->id === $video->id;
            }
        );
    }
}
