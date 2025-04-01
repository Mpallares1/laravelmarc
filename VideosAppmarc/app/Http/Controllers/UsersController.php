<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Info usuari especific.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $videoCount = $user->videos()->count();

        return view('users.show', compact('user', 'videoCount'));
    }

    /**
     * Llista d'usuaris.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Crear un nou usuari.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'array',
            'permissions' => 'array',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Assignar un equip per defecte
        $team = Team::create(['name' => $user->name . "'s Team", 'user_id' => $user->id]);
        $user->team_id = $team->id;
        $user->save();

        // Assignar rols i permisos
        if (isset($validatedData['roles'])) {
            $user->syncRoles($validatedData['roles']);
        }

        if (isset($validatedData['permissions'])) {
            $user->syncPermissions($validatedData['permissions']);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
}
