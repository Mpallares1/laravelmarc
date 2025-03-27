<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use PHPUnit\Util\Test;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo_url',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'user_photo_url',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Accessor for user_photo_url.
     */
    public function getUserPhotoUrlAttribute()
    {
        return $this->photo_url;
    }

    /**
     * Define a relationship with the Test model.
     */
    public function testedBy()
    {
        return $this->hasMany(Test::class);
    }

    /**
     * Check if the user is a super admin.
     */
    public function isSuperAdmin(): bool
    {
        return $this->super_admin;
    }

    /**
     * Create a personal team for the user.
     */
    public function addPersonalTeam()
    {
        $team = Team::create([
            'user_id' => $this->id,
            'name' => "{$this->name}'s Team",
            'personal_team' => true,
        ]);

        $this->ownedTeams()->save($team);
        $this->switchTeam($team);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function tests(): HasMany
    {
        return $this->hasMany(Test::class);
    }
}
