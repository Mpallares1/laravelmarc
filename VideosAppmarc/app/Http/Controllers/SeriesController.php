<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
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
     * Mostrar una serie específica.
     */
    public function show($id)
    {
        $serie = Series::with('videos')->findOrFail($id);
        return view('series.show', compact('serie'));
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
            'description' => 'required|string',
        ]);

        Series::create($request->all());

        return redirect()->route('series.index');
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
            'description' => 'required|string',
        ]);

        $series->update($request->all());

        return redirect()->route('series.index');
    }

    /**
     * Eliminar una serie existente de la base de datos.
     */
    public function destroy(Series $series)
    {
        $series->delete();

        return redirect()->route('series.index');
    }
}
