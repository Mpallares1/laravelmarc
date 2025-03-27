<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'user_name',
        'user_photo_url',
        'published_at',
    ];

    /**
     * Relación 1:N con el modelo Video.
     */
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    /**
     * Relación con los usuarios que han probado la serie.
     */
    public function testedBy()
    {
        return $this->belongsToMany(User::class, 'series_user_tested');
    }

    /**
     * Obtener la fecha de creación formateada.
     */
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    /**
     * Obtener la fecha de creación en formato humano.
     */
    public function getFormattedForHumansCreatedAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Obtener la marca de tiempo de la fecha de creación.
     */
    public function getCreatedAtTimestampAttribute()
    {
        return $this->created_at->timestamp;
    }
}
