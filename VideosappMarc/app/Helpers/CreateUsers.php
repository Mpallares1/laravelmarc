<?php

// app/Helpers/CreateUsers.php

namespace App\Helpers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
                'super_admin' => false, // Agregar el campo super_admin
            ]), function (User $user) {
                self::creacioTeam($user);
            });
        });
    }

    protected static function creacioTeam(User $user): void
    {
        // Create a team for the user
        $user->ownedTeams()->create([
            'name' => "{$user->name}'s Team",
            'personal_team' => true, // Ensure the personal_team field is set
        ]);
    }

    public static function createRegularUser()
    {
        return self::createUser([
            'name' => 'Regular',
            'email' => 'regular@videosapp.com',
            'password' => '123456789',
        ]);
    }

    public static function createVideoManagerUser()
    {
        return self::createUser([
            'name' => 'Video Manager',
            'email' => 'videosmanager@videosapp.com',
            'password' => '123456789',
        ]);
    }

    public static function createSuperAdminUser()
    {
        return self::createUser([
            'name' => 'Super Admin',
            'email' => 'superadmin@videosapp.com',
            'password' => '123456789',
            'super_admin' => true,
        ]);
    }

    protected static function createUser(array $user)
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
                'super_admin' => $user['super_admin'] ?? false,
            ]), function (User $user) {
                self::creacioTeam($user);
            });
        });
    }

    public static function defineGates()
    {
        Gate::define('manage-videos', function (User $user) {
            return $user->hasRole('Video Manager');
        });

        Gate::define('super-admin', function (User $user) {
            return $user->isSuperAdmin();
        });
    }

      static public function create_role_and_permissions()
    {
        $permissions = [
            'super_admin',
            'video_manager',
        ];

        foreach ($permissions as $perm) {
            if (!Permission::where('name', $perm)->exists()) {
                Permission::create(['name' => $perm]);
            }
        }

        Role::firstOrCreate(['name' => 'regular_user']);
        $adminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $videoManagerRole = Role::firstOrCreate(['name' => 'video_manager']);

        if (!$adminRole->hasPermissionTo('super_admin')) {
            $adminRole->givePermissionTo('super_admin');
        }
        if (!$adminRole->hasPermissionTo('video_manager')) {
            $adminRole->givePermissionTo('video_manager');
        }
        if (!$videoManagerRole->hasPermissionTo('video_manager')) {
            $videoManagerRole->givePermissionTo('video_manager');
        }
    }

}

