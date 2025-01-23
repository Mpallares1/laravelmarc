<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Video extends Model
{
    use HasFactory;

    protected $dates = ['published_at'];

    /**
     * Retorna la data en format "13 de gener de 2025".
     *
     * @return string
     */
    public function getFormattedPublishedAtAttribute()
    {
        return Carbon::parse($this->published_at)->translatedFormat('d \d\e F \d\e Y');
    }

    /**
     * Retorna la data en format "fa 2 hores".
     *
     * @return string
     */
    public function getFormattedForHumansPublishedAtAttribute()
    {
        return Carbon::parse($this->published_at)->diffForHumans();
    }

    /**
     * Retorna el valor Unix timestamp de published_at.
     *
     * @return int
     */
    public function getPublishedAtTimestampAttribute()
    {
        return Carbon::parse($this->published_at)->timestamp;
    }
}
