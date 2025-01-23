<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    /**
     * Muestra el video especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.show', compact('video'));
    }

    /**
     * Muestra los videos probados por un usuario específico.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function testedBy($userId)
    {
        $videos = Video::where('tested_by', $userId)->get();
        return view('videos.tested_by', compact('videos'));
    }
}
