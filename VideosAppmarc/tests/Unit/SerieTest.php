<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Series;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SerieTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function serie_have_videos()
    {
        // Create a series
        $serie = Series::factory()->create();

        // Create videos associated with the series
        $video1 = Video::factory()->create(['series_id' => $serie->id]);
        $video2 = Video::factory()->create(['series_id' => $serie->id]);

        // Assert that the series has videos
        $this->assertTrue($serie->videos->contains($video1));
        $this->assertTrue($serie->videos->contains($video2));
    }
}
