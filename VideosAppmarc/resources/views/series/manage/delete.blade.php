@extends('layouts.app')

@section('content')
    @can('manageseries')
        <div class="container mx-auto mt-8">
            <h1 class="text-2xl font-bold mb-4">Delete Series</h1>
            <p>Are you sure you want to delete the series titled "{{ $serie->title }}"?</p>
            <form action="{{ route('series.manage.destroy', $serie->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="mb-4">
                    <input type="checkbox" name="delete_videos" id="delete_videos" value="1">
                    <label for="delete_videos" class="text-white">Also delete associated videos</label>
                </div>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Yes, Delete</button>
                <a href="{{ route('series.manage.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
            </form>
        </div>
    @else
        <p>You do not have permission to delete this series.</p>
    @endcan
@endsection
