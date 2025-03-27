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
}
