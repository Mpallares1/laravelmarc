<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\VideoCreated;

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
        $this->authorize('create', Video::class);

        return view('videos.create');
    }

    /**
     * Store a newly created video in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Video::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
            'series_id' => 'nullable|exists:series,id',
        ]);

        $video = new Video(array_merge($validated, ['user_id' => Auth::id()]));

        if ($video->save()) {
            event(new VideoCreated($video));
            return redirect()->route('videos.index')->with('success', 'Video created successfully.');
        }

        return redirect()->route('videos.create')->with('error', 'Failed to create video.');
    }

    /**
     * Display the specified video.
     */
    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified video.
     */
    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    /**
     * Update the specified video in storage.
     */
    public function update(Request $request, Video $video)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
            'series_id' => 'nullable|exists:series,id',
        ]);

        $video->update($validated);

        return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
    }

    /**
     * Remove the specified video from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    }

    /**
     * Display a list of users who have tested the video.
     */
    public function testedBy(Video $video)
    {
        $users = $video->testedByUsers;

        if ($users->isEmpty()) {
            return response()->json(['message' => 'No users have tested this video.'], 404);
        }

        return response()->json($users);
    }

    /**
     * Authorize the action for the given resource.
     *
     * @param string $action
     * @param string $model
     * @return void
     */
    private function authorize(string $action, string $model)
    {
        if (!Auth::user()->can($action, $model)) {
            abort(403, 'Unauthorized action.');
        }
    }
}
