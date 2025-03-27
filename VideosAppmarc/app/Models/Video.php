<?php
// app/Models/Video.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'url', 'user_id', 'series_id'
    ];

    protected $dates = ['published_at'];

    /**
     * Relación inversa 1:N con el modelo Series.
     */
    public function series()
    {
        return $this->belongsTo(Series::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Obtener la fecha de publicación formateada.
     */
    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at ? Carbon::parse($this->published_at)->format('F j, Y') : 'Not Published';
    }

    /**
     * Obtener la fecha de publicación en formato humano.
     */
    public function getFormattedForHumansPublishedAtAttribute()
    {
        return Carbon::parse($this->published_at)->diffForHumans();
    }

    /**
     * Obtener la marca de tiempo de la fecha de publicación.
     */
    public function getPublishedAtTimestampAttribute()
    {
        return Carbon::parse($this->published_at)->timestamp;
    }
}
