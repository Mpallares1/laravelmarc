@extends('layouts.app')

@section('content')
    <div class="container">
        @can('create videos')
            <h1>Create Video</h1>
            <form action="{{ route('videos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" data-qa="video-title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" data-qa="video-description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="url" class="form-control" id="url" name="url" data-qa="video-url" required>
                </div>
                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="datetime-local" class="form-control" id="published_at" name="published_at" data-qa="video-published-at" required>
                </div>
                <button type="submit" class="btn btn-primary" data-qa="video-submit">Submit</button>
            </form>
        @else
            <p>You do not have permission to create videos.</p>
        @endcan
    </div>
@endsection
