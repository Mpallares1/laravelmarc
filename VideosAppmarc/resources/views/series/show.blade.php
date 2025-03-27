@extends('layouts.videos-app-layout')

@section('content')
    <div class="container mx-auto mt-8 p-6 bg-[#0a0a14] text-white rounded-lg shadow-lg max-w-4xl">
        <h1 class="text-3xl font-bold text-gradient mb-6 text-center">{{ $serie->title }}</h1>
        <p class="mb-6 text-lg">{{ $serie->description }}</p>
        <p class="mb-6"><strong>User:</strong> {{ $serie->user_name }}</p>
        <div class="mb-6">
            @if($serie->image)
                <img src="{{ $serie->image }}" alt="Series Image" class="rounded-full w-32 h-32 object-cover mx-auto">
            @else
                <div class="rounded-full w-32 h-32 bg-gray-500 flex items-center justify-center mx-auto">
                    <span class="text-white">No Image</span>
                </div>
            @endif
        </div>

        <h2 class="text-2xl font-bold text-gradient mb-4">Videos</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-[#1a1a2e] text-white rounded-lg">
                <thead>
                <tr>
                    <th class="py-3 px-4 border-b border-gray-500 text-left">Title</th>
                    <th class="py-3 px-4 border-b border-gray-500 text-left">Description</th>
                    <th class="py-3 px-4 border-b border-gray-500 text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($serie->videos as $video)
                    <tr>
                        <td class="py-3 px-4 border-b border-gray-500">{{ $video->title }}</td>
                        <td class="py-3 px-4 border-b border-gray-500">{{ $video->description }}</td>
                        <td class="py-3 px-4 border-b border-gray-500">
                            <a href="{{ route('videos.show', $video->id) }}" class="bg-[#12c2e9] hover:bg-[#0b93d5] text-white font-bold py-2 px-4 rounded-lg transition-transform transform hover:-translate-y-1">View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition-transform transform hover:-translate-y-1">
                Volver
            </a>
        </div>
    </div>
@endsection

<style>
    /* Base Styles */
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

    /* Layout Components */
    header, footer {
        padding: 1.2rem 2rem;
        background-color: rgba(10, 10, 20, 0.8);
        backdrop-filter: blur(10px);
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        position: relative;
        z-index: 100;
    }

    header nav a, footer a {
        color: #e6e6fa;
        text-decoration: none;
        margin: 0 15px;
        transition: all 0.3s ease;
        font-weight: 500;
        position: relative;
        padding: 5px 0;
    }

    header nav a::after, footer a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 0;
        background: linear-gradient(90deg, #c471ed, #f64f59);
        transition: width 0.3s ease;
    }

    header nav a:hover, footer a:hover {
        color: #fff;
    }

    header nav a:hover::after, footer a:hover::after {
        width: 100%;
    }

    /* Gradient Text */
    .text-gradient {
        background: linear-gradient(90deg, #c471ed, #f64f59);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    /* Video Page Layout */
    .video-page {
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 1.5rem;
        gap: 3rem;
    }

    /* Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    th, td {
        padding: 1rem;
        text-align: left;
    }

    th {
        background-color: #181a24;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #12121a;
    }

    tr:hover {
        background-color: #1a1a2e;
    }

    /* Button Styling */
    .btn-edit {
        background: #f4a261;
        color: #080810;
        padding: 10px 16px;
        border-radius: 6px;
    }

    .btn-edit:hover {
        background: #e76f51;
    }

    .btn-back {
        display: inline-block;
        background: #c471ed;
        color: #fff;
        padding: 10px 20px;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .btn-back:hover {
        background: #a45bbf;
    }
</style>
