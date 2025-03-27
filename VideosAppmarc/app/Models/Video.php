<?php
// app/Models/Video.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'url', 'user_id', 'series_id'];

    public function series(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    protected $dates = ['published_at'];

    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at ? Carbon::parse($this->published_at)->format('F j, Y') : 'Not Published';
    }

    public function getFormattedForHumansPublishedAtAttribute()
    {
        return Carbon::parse($this->published_at)->diffForHumans();
    }

    public function getPublishedAtTimestampAttribute()
    {
        return Carbon::parse($this->published_at)->timestamp;
    }
}
