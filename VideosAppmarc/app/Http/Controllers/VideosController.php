<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideosController extends Controller
{
    /**
     * Show a specific video.
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.show', compact('video'));
    }

    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
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


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'series_id' => 'nullable|exists:series,id',
        ]);

        $video = new Video();
        $video->title = $request->title;
        $video->url = $request->url;
        $video->series_id = $request->series_id;
        $video->save();

        return redirect()->route('videos.index');
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'series_id' => 'nullable|exists:series,id',
        ]);

        $video->title = $request->title;
        $video->url = $request->url;
        $video->series_id = $request->series_id;
        $video->save();

        return redirect()->route('videos.index');
    }


}


