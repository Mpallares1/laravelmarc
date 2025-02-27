<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos')); // Ensure 'videos.index' is a valid view name
    }

    public function create()
    {
        return view('videos.create'); // Ensure 'videos.create' is a valid view name
    }

    public function store(Request $request)
    {
        $video = Video::create($request->all());
        return redirect()->route('videos.index');
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.show', compact('video')); // Ensure 'videos.show' is a valid view name
    }

    public function edit(Video $video)
    {
        return view('videos.edit', compact('video')); // Ensure 'videos.edit' is a valid view name
    }

    public function update(Request $request, Video $video)
    {
        $video->update($request->all());
        return redirect()->route('videos.index');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index');
    }
}
