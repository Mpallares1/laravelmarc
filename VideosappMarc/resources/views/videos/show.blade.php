<!-- resources/views/videos/show.blade.php -->
@extends('layouts.videos-app-layout')

@section('content')
    <h1>{{ $video->title }}</h1>
    <p>{{ $video->description }}</p>
    <a href="{{ $video->url }}" target="_blank">Watch Video</a>
@endsection
