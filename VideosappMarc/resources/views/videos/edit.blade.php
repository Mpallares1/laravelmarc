@extends('layouts.app')

@section('content')
    <div class="container">
        @can('edit videos')
            <h1>Edit Video</h1>
            <form action="{{ route('videos.update', $video->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $video->title }}" data-qa="video-title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" data-qa="video-description" required>{{ $video->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="url" class="form-control" id="url" name="url" value="{{ $video->url }}" data-qa="video-url" required>
                </div>
                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ $video->published_at->format('Y-m-d\TH:i') }}" data-qa="video-published-at" required>
                </div>
                <button type="submit" class="btn btn-primary" data-qa="video-submit">Update</button>
            </form>

            <h2 class="mt-5">Manage Videos</h2>
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
        @else
            <p>You do not have permission to edit videos.</p>
        @endcan
    </div>
@endsection
