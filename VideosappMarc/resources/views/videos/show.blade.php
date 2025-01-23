@extends('layouts.videos-app-layout')

@section('title', $video->title . ' - Videos App')

@section('content')
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-3xl font-bold mb-6" style="color: #ffff00; text-shadow: 0 0 10px #ffff00, 0 0 20px #ff00e0;">
            {{ $video->title }}
        </h1>

        <div class="video-container">
            <div class="video-wrapper">
                <iframe
                    src="{{ $video->url }}"
                    frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture"
                    allowfullscreen
                    class="w-full h-full">
                </iframe>
            </div>
        </div>

        <p class="mt-6 text-lg" style="color: #ccc;">
            {{ $video->description }}
        </p>

    </div>
@endsection
