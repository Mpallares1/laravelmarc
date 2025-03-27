<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideosController extends Controller
{
    /**
     * Display a listing of the videos.
     */
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new video.
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created video in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
            'series_id' => 'nullable|exists:series,id',
        ]);

        $video = new Video([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'url' => $request->input('url'),
            'user_id' => Auth::id(),
            'series_id' => $request->input('series_id'),
        ]);

        if ($video->save()) {
            return redirect()->route('videos.index')->with('success', 'Video created successfully.');
        } else {
            return redirect()->route('videos.create')->with('error', 'Failed to create video.');
        }
    }

    /**
     * Display the specified video.
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified video.
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.edit', compact('video'));
    }

    /**
     * Update the specified video in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
            'series_id' => 'nullable|exists:series,id',
        ]);

        $video = Video::findOrFail($id);
        $video->update($request->all());

        return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
    }

    /**
     * Remove the specified video from storage.
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    }

    /**
     * Display a list of users who have tested the video.
     */
    public function testedBy($id)
    {
        $video = Video::findOrFail($id);
        $users = $video->testedByUsers;
        return response()->json($users);
    }
}
