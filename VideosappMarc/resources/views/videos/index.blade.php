@extends('layouts.videosapp')

@section('content')
    <h1>Videos</h1>
    <ul>
        @foreach($videos as $video)
            <li>{{ $video->title }}</li>
        @endforeach
    </ul>
@endsection
