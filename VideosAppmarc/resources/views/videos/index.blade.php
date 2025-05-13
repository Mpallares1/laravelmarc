@extends('layouts.videos-app-layout')

@section('content')
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #080810;
            color: #e6e6fa;
            font-family: 'Inter', 'Helvetica Neue', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
            line-height: 1.6;
        }

        .video-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 3rem 1.5rem;
        }

        .video-card {
            width: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .video-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
        }

        .video-card img {
            width: 100%;
            height: auto;
            border-bottom: 3px solid #c471ed;
        }

        .video-card h3 {
            font-size: 1.2rem;
            margin: 15px 0;
            background: linear-gradient(90deg, #fff, #c9c9c9);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .video-card a {
            text-decoration: none;
            color: #e6e6fa;
            display: block;
            padding: 10px;
            transition: color 0.3s ease;
        }

        .video-card a:hover {
            color: #f64f59;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, #c471ed, #f64f59);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 2rem;
        }
    </style>
    <h1>All Videos</h1>
    <div class="video-grid">
        @foreach($videos as $video)
            <div class="video-card">
                <a href="{{ route('videos.show', $video->id) }}">
                    <img src="https://img.youtube.com/vi/{{ getYoutubeId($video->url) }}/0.jpg" alt="{{ $video->title }}">
                    <h3>{{ $video->title }}</h3>
                </a>
            </div>
        @endforeach
    </div>
    @auth
        @if(auth()->user()->hasRole('videosmanager'))
            <div class="flex justify-center mb-4">
                <a href="{{ route('videos.create') }}" class="btn btn-primary">Create Video</a>
            </div>
        @endif
    @endauth
@endsection

@php
    function getYoutubeId($url) {
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $url, $matches);
        return $matches[1] ?? null;
    }
@endphp

