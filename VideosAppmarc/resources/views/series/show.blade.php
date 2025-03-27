@extends('layouts.app')

@section('content')

        <div class="container mx-auto mt-8">
            <h1 class="text-2xl font-bold mb-4">{{ $serie->title }}</h1>
            <p class="mb-4">{{ $serie->description }}</p>
            <h2 class="text-xl font-bold mb-4">Videos</h2>
            <div class="flex justify-center">
                <table>
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($serie->videos as $video)
                        <tr>
                            <td>{{ $video->title }}</td>
                            <td>{{ $video->description }}</td>
                            <td>
                                <a href="{{ route('videos.show', $video->id) }}" class="btn-view">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection
