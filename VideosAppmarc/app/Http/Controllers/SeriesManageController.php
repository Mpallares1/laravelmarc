<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\User; // Add this line to import the User model
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SeriesManageController extends Controller
{
    /**
     * Mostrar una lista de todas las series.
     */
    public function index()
    {
        $series = Series::all();
        return view('series.manage.index', compact('series'));
    }

    /**
     * Mostrar el formulario para crear una nueva serie.
     */
    public function create()
    {
        $users = User::all();
        return view('series.manage.create', compact('users'));
    }

    /**
     * Almacenar una nueva serie en la base de datos.
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
            'user_name' => 'required|string',
            'user_photo_url' => 'nullable|url',
            'published_at' => 'nullable|date',
        ]);

        $user = User::where('name', $request->user_name)->first();

        if (!$user) {
            throw ValidationException::withMessages(['user_name' => 'The user name does not exist.']);
        }

        $userPhotoUrl = $request->user_photo_url ?? $user->photo_url;

        Series::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_name' => $user->name,
            'user_photo_url' => $userPhotoUrl,
        ]);

        if ($request->user_photo_url) {
            $user->photo_url = $request->user_photo_url;
            $user->save();
        }

        return redirect()->route('series.manage.index')->with('success', 'Serie creada exitosamente.');
    }
    /**
     * Mostrar el formulario para editar una serie existente.
     */
    public function edit($id)
    {
        $serie = Series::findOrFail($id);
        return view('series.manage.edit', compact('serie'));
    }

    /**
     * Actualizar una serie existente en la base de datos.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|url',
            'user_name' => 'required|string',
            'user_photo_url' => 'nullable|url',
        ]);

        $user = User::where('name', $request->user_name)->first();

        if (!$user) {
            throw ValidationException::withMessages(['user_name' => 'The user name does not exist.']);
        }

        $serie = Series::findOrFail($id);

        $serie->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_name' => $user->name,
            'user_photo_url' => $request->user_photo_url,
        ]);

        return redirect()->route('series.manage.index')->with('success', 'Serie actualizada exitosamente.');
    }
    /**
     * Eliminar una serie existente de la base de datos.
     */
    public function destroy($id)
    {
        $serie = Series::findOrFail($id);
        $serie->delete();

        return redirect()->route('series.manage.index')->with('success', 'Series deleted successfully.');
    }

    /**
     * Mostrar los usuarios que han probado la serie.
     */
    public function testedBy(Series $series)
    {
        $users = $series->testedBy;
        return view('series.testedby', compact('users'));
    }
}
