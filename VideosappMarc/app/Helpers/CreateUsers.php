<?php

// app/Helpers/CreateUsers.php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateUsers
{
    /**
     * @throws ValidationException
     */
    public static function creacioUsuariDefecte(array $user)
    {
        Validator::make($user, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ])->validate();

        return DB::transaction(function () use ($user) {
            return tap(User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]), function (User $user) {
            });
        });
    }

    protected function creacioTeam(User $user): void
    {
        // Create a team for the user
        $user->ownedTeams()->create([
            'name' => "{$user->name}'s Team",
            'personal_team' => true, // Ensure the personal_team field is set
        ]);
    }
}
