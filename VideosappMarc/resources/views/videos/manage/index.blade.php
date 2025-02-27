@extends('layouts.app')

@section('content')
    <div class="container">
        @can('view videos')
            <h1>Manage Videos</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>URL</th>
                    <th>Published At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($videos as $video)
                    <tr>
                        <td>{{ $video->title }}</td>
                        <td>{{ $video->description }}</td>
                        <td><a href="{{ $video->url }}" target="_blank">View</a></td>
                        <td>{{ $video->published_at }}</td>
                        <td>
                            @can('edit videos')
                                <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-primary">Edit</a>
                            @endcan
                            @can('delete videos')
                                <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h1 class="mt-5">All Videos</h1>
            <div class="row">
                @foreach($videos as $video)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="{{ $video->thumbnail_url }}" class="card-img-top" alt="{{ $video->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $video->title }}</h5>
                                <p class="card-text">{{ Str::limit($video->description, 100) }}</p>
                                <a href="{{ route('videos.show', $video->id) }}" class="btn btn-primary">Watch</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>You do not have permission to view videos.</p>
        @endcan
    </div>
@endsection
