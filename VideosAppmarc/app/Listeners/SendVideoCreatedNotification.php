<?php

namespace App\Listeners;

use App\Events\VideoCreated;
use App\Models\User;
use App\Notifications\VideoCreatedNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendVideoCreatedNotification
{
    /**
     * Handle the event.
     *
     * @param \App\Events\VideoCreated $event
     * @return void
     */
    public function handle(VideoCreated $event)
    {
        $video = $event->video;

        // Retrieve all admin users
        $admins = User::where('role', 'admin')->get();

        // Send email to all admins
        Mail::to($admins->pluck('email'))->send(new \App\Mail\VideoCreatedMail($video));

        // Send notification to all admins
        Notification::send($admins, new VideoCreatedNotification($video));

        // Broadcast the event
        broadcast($event);
    }
}
