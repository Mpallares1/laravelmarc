<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VideoCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $video;

    /**
     * Create a new message instance.
     *
     * @param mixed $video
     */
    public function __construct($video)
    {
        $this->video = $video;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.video_created')
            ->with(['video' => $this->video]);
    }
}
