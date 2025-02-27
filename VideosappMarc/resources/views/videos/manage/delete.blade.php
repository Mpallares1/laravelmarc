@extends('layouts.app')

@section('content')
    <div class="container">
        @can('delete videos')
            <h1>Delete Video</h1>
            <form action="{{ route('videos.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this video?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @else
            <p>You do not have permission to delete videos.</p>
        @endcan
    </div>
@endsection
