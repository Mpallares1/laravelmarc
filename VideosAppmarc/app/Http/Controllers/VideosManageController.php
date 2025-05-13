<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideosManageController extends Controller
{
    /**
     * List all videos.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->can('videosManager')) {
            $videos = Video::with('series')->get(); // Eager load 'series' relationship
            return view('videos.manage.index', compact('videos'));
        }

        // If the user lacks permissions, return a 403 error
        abort(403);
    }

    /**
     * Show a specific video.
     */
    public function show($id)
    {
        $video = Video::with('series')->findOrFail($id); // Eager load 'series'
        return view('videos.show', compact('video'));
    }

    /**
     * Store a new video.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
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
            return redirect()->route('videos.manage.index')->with('success', 'Video created successfully.');
        }

        return redirect()->route('videos.manage.create')->with('error', 'Failed to create video.');
    }

    /**
     * Edit a video.
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        $series = Series::all();
        return view('videos.manage.edit', compact('video', 'series'));
    }

    /**
     * Update a video.
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
        $video->update($request->only(['title', 'description', 'url', 'series_id']));

        return redirect()->route('videos.manage.index')->with('success', 'Video updated successfully.');
    }

    /**
     * Delete a video.
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('videos.manage.index')->with('success', 'Video deleted successfully.');
    }

    /**
     * Show the form for creating a new video.
     */
    public function create()
    {
        $series = Series::all();
        return view('videos.manage.create', compact('series'));
    }

    /**
     * Get users who tested a video.
     */
    public function testedBy($id)
    {
        $video = Video::with('testedByUsers')->findOrFail($id); // Eager load 'testedByUsers'
        $users = $video->testedByUsers;
        return response()->json($users);
    }
}
