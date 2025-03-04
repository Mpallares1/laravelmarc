<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideosManageController extends Controller
{
    /**
     * Retorna la classe del test.
     *
     * @return string
     */
    public function testedBy()
    {
        return \Tests\Feature\Videos\VideosManagerControllerTest::class;
    }

    /**
     * Mostra una llista de vídeos.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    /**
     * Emmagatzema un vídeo nou.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'published_at' => 'required|date',
        ]);

        $video = Video::create($validatedData);
        return redirect()->route('videos.show', $video->id);
    }

    /**
     * Mostra un vídeo específic.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    /**
     * Mostra el formulari per editar un vídeo.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    /**
     * Actualitza un vídeo específic.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Video $video)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'published_at' => 'required|date',
        ]);

        $video->update($validatedData);
        return redirect()->route('videos.show', $video->id);
    }

    /**
     * Mostra el formulari per eliminar un vídeo.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function delete(Video $video)
    {
        return view('videos.delete', compact('video'));
    }

    /**
     * Elimina un vídeo específic.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index');
    }
}
