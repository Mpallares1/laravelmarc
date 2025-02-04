<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $description
 * @property \Carbon\Carbon $published_at
 * @property int|null $previous
 * @property int|null $next
 * @property int $series_id
 */
class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'description',
        'published_at',
        'previous',
        'next',
        'series_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Retorna la data en format "13 de gener de 2025".
     *
     * @return string
     */
    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at->translatedFormat('d \d\e F \d\e Y');
    }

    /**
     * Retorna la data en format "fa 2 hores".
     *
     * @return string
     */
    public function getFormattedForHumansPublishedAtAttribute()
    {
        return $this->published_at->diffForHumans();
    }

    /**
     * Retorna el valor Unix timestamp de published_at.
     *
     * @return int
     */
    public function getPublishedAtTimestampAttribute()
    {
        return $this->published_at->timestamp;
    }

    /**
     * Retorna la classe del test.
     *
     * @return string
     */
    public function testedBy()
    {
        return \Tests\Unit\VideosTest::class;
    }
}
