<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'user_id', // Allows associating a series with a user
    ];

    /**
     * Relación N:M con el modelo Video.
     * Define la relación con los videos asociados a la serie.
     */
    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(Video::class, 'series_video', 'series_id', 'video_id');
    }

    /**
     * Relación con los usuarios que han probado la serie.
     * Define la relación con los usuarios que han interactuado con la serie.
     */
    public function testedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'series_user_tested', 'series_id', 'user_id');
    }

    /**
     * Relación con el usuario creador de la serie.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Obtener la fecha de creación formateada.
     */
    public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->format('d/m/Y');
    }

    /**
     * Obtener la fecha de creación en formato humano.
     */
    public function getFormattedForHumansCreatedAtAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Obtener la marca de tiempo de la fecha de creación.
     */
    public function getCreatedAtTimestampAttribute(): int
    {
        return $this->created_at->timestamp;
    }
}
