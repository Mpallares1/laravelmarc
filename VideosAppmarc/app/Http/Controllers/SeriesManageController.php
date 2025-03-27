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
        return view('series.index', compact('series'));
    }

    /**
     * Mostrar el formulario para crear una nueva serie.
     */
    public function create()
    {
        return view('series.create');
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

        return redirect()->route('series.index')->with('success', 'Serie creada exitosamente.');
    }

    /**
     * Mostrar el formulario para editar una serie existente.
     */
    public function edit(Series $series)
    {
        return view('series.edit', compact('series'));
    }

    /**
     * Actualizar una serie existente en la base de datos.
     */
    public function update(Request $request, Series $series)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'user_name' => 'required|string|max:255',
            'user_photo_url' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        $series->update($request->all());

        return redirect()->route('series.index')->with('success', 'Serie actualizada exitosamente.');
    }

    /**
     * Eliminar una serie existente de la base de datos.
     */
    public function destroy(Series $series)
    {
        $series->delete();

        return redirect()->route('series.index')->with('success', 'Serie eliminada exitosamente.');
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
