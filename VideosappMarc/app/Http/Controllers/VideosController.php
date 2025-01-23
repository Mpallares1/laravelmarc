<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VideosController extends Controller
{
    /**
     * Display the specified video.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): Response
    {
        $video = Video::findOrFail($id);
        return response()->view('videos.show', compact('video'));
    }

    /**
     * Display the videos tested by a specific user.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function testedBy($userId): Response
    {
        $videos = Video::where('tested_by', $userId)->get();
        return response()->view('videos.tested_by', compact('videos'));
    }
}
