@extends('layouts.videos-app-layout')

@section('content')
    @can('manageseries')
        <div class="container mx-auto mt-8 p-6 bg-[#0a0a14] text-white rounded-lg shadow-lg max-w-2xl">
            <h1 class="text-3xl font-bold text-[#12c2e9] mb-6 text-center">Create Series</h1>

            <form action="{{ route('series.manage.store') }}" method="POST" data-qa="create-series-form">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-[#e6e6fa] font-semibold mb-2" data-qa="title-label">Title</label>
                    <input type="text" name="title" id="title"
                           class="border border-gray-500 bg-[#1a1a2e] text-black p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-[#12c2e9]"
                           required data-qa="title-input">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-[#e6e6fa] font-semibold mb-2" data-qa="description-label">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="border border-gray-500 bg-[#1a1a2e] text-black p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-[#12c2e9]"
                              required data-qa="description-textarea"></textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-[#e6e6fa] font-semibold mb-2" data-qa="image-label">Image</label>
                    <input type="text" name="image" id="image"
                           class="border border-gray-500 bg-[#1a1a2e] text-black p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-[#12c2e9]"
                           data-qa="image-input">
                </div>

                <div class="mb-4">
                    <label for="user_name" class="block text-[#e6e6fa] font-semibold mb-2" data-qa="user_name-label">User Name</label>
                    <input type="text" name="user_name" id="user_name"
                           class="border border-gray-500 bg-[#1a1a2e] text-black p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-[#12c2e9]"
                           required data-qa="user_name-input">
                </div>

                <div class="mb-4">
                    <label for="user_photo_url" class="block text-[#e6e6fa] font-semibold mb-2" data-qa="user_photo_url-label">User Photo URL</label>
                    <input type="text" name="user_photo_url" id="user_photo_url"
                           class="border border-gray-500 bg-[#1a1a2e] text-black p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-[#12c2e9]"
                           data-qa="user_photo_url-input">
                </div>

                <button type="submit"
                        class="bg-[#12c2e9] hover:bg-[#0b93d5] text-white font-bold py-3 px-6 rounded-lg transition-transform transform hover:-translate-y-1"
                        data-qa="submit-button">
                    Create Series
                </button>
            </form>

            <div class="mt-4">
                <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition-transform transform hover:-translate-y-1">
                    Volver
                </a>
            </div>
        </div>
    @else
        <p class="text-center text-red-500 text-lg font-semibold mt-6">You do not have permission to create a series.</p>
    @endcan
@endsection

<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #080810 !important;
        color: #ffffff;
        font-family: 'Inter', 'Helvetica Neue', sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        overflow-x: hidden;
        line-height: 1.6;
    }

    .container {
        max-width: 900px;
        margin: 3rem auto;
        padding: 2rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
    }

    h1 {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(90deg, #c471ed, #f64f59);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 2rem;
    }

    table {
        width: 100%;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 8px;
        overflow: hidden;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        text-align: left;
    }

    th {
        background: rgba(255, 255, 255, 0.1);
    }

    td {
        color: #ffffff;
    }

    a, button {
        text-decoration: none;
        font-weight: bold;
        padding: 8px 12px;
        border-radius: 6px;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    a:hover, button:hover {
        transform: translateY(-2px);
    }

    .btn-create {
        display: inline-block;
        background: #12c2e9;
        color: #080810;
    }

    .btn-create:hover {
        background: #0b93d5;
    }

    .btn-edit {
        background: #f4a261;
        color: #080810;
    }

    .btn-edit:hover {
        background: #e76f51;
    }

    .btn-delete {
        background: #e63946;
        color: #fff;
    }

    .btn-delete:hover {
        background: #d62839;
    }
</style>
