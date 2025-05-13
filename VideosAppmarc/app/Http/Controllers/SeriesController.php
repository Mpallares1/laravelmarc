<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Video;
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

        Series::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

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

    /**
     * Agregar un video a una serie existente.
     */
    public function addVideo(Request $request, Series $series)
    {
        $request->validate([
            'video_id' => 'required|exists:videos,id',
        ]);

        // Ensure the series belongs to the authenticated user
        if ($series->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $video = Video::find($request->video_id);
        $series->videos()->attach($video);

        return redirect()->route('series.show', $series->id)->with('success', 'Video added to series successfully.');
    }
}
