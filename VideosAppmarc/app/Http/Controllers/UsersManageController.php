<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersManageController extends Controller
{
    /**
     * Llista d'usuaris.
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%')
                ->orWhere('email', 'like', '%' . $request->input('search') . '%');
        }

        $users = $query->get();
        return view('users.manage.index', compact('users'));
    }

    /**
     * Formulari creacio ususari.
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('users.manage.create', compact('roles', 'permissions'));
    }

    /**
     * Guardar usuari.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'array',
            'permissions' => 'array',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Assign a default team
        $team = Team::create(['name' => $user->name . "'s Team", 'user_id' => $user->id]);
        $user->team_id = $team->id;
        $user->save();

        // Assign roles and permissions
        if (isset($validatedData['roles'])) {
            $user->syncRoles($validatedData['roles']);
        }

        if (isset($validatedData['permissions'])) {
            $user->syncPermissions($validatedData['permissions']);
        }

        // Redirect to the manage users page with a success message
        return redirect()->route('users.manage.index')->with('success', 'User created successfully.');
    }

    /**
     * Formulari edicio usuari.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('users.manage.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Actualitzar usuari.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'roles' => 'array',
            'permissions' => 'array',
        ]);

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        // Assign roles and permissions
        if (isset($validatedData['roles'])) {
            $user->syncRoles($validatedData['roles']);
        }

        if (isset($validatedData['permissions'])) {
            $user->syncPermissions($validatedData['permissions']);
        }

        // Redirect to the manage users page with a success message
        return redirect()->route('users.manage.index');
    }

    /**
     * Esborrar usuari
     */
    public function destroy(User $user, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.manage.index');
    }
}
