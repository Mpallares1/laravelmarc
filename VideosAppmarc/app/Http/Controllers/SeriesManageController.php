<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

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
        return view('series.manage.create');
    }

    /**
     * Almacenar una nueva serie en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'user_name' => 'required|string|max:255',
            'user_photo_url' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        Series::create($request->all());

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
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'user_name' => 'required|string|max:255',
            'user_photo_url' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        $serie = Series::findOrFail($id);
        $serie->update($request->all());

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
