@extends('layouts.videos-app-layout')

@section('content')
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

        label {
            font-weight: bold;
            color: #e6e6fa;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: #12121a;
            color: white;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        button {
            text-decoration: none;
            font-weight: bold;
            padding: 10px 16px;
            border-radius: 6px;
            transition: background 0.3s ease, transform 0.2s ease;
            cursor: pointer;
        }

        .btn-edit {
            background: #f4a261;
            color: #080810;
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



        @can('manageseries')
            <div class="container mx-auto mt-8 p-6 bg-[#0a0a14] text-white rounded-lg shadow-lg max-w-2xl">
                <h1 class="text-3xl font-bold text-[#12c2e9] mb-6 text-center">Edit Series</h1>

                <form action="{{ route('series.manage.update', $serie->id) }}" method="POST" data-qa="edit-series-form">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="block text-[#e6e6fa] font-semibold mb-2" data-qa="title-label">Title</label>
                        <input type="text" name="title" id="title"
                               class="border border-gray-500 bg-white text-black p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-[#12c2e9]"
                               value="{{ $serie->title }}" required data-qa="title-input">
                        @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-[#e6e6fa] font-semibold mb-2" data-qa="description-label">Description</label>
                        <textarea name="description" id="description" rows="4"
                                  class="border border-gray-500 bg-white text-black p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-[#12c2e9]"
                                  required data-qa="description-textarea">{{ $serie->description }}</textarea>
                        @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-[#e6e6fa] font-semibold mb-2" data-qa="image-label">Image URL</label>
                        <input type="url" name="image" id="image"
                               class="border border-gray-500 bg-white text-black p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-[#12c2e9]"
                               value="{{ $serie->image }}" data-qa="image-input">
                        @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="user_name" class="block text-[#e6e6fa] font-semibold mb-2" data-qa="user_name-label">User Name</label>
                        <input type="text" name="user_name" id="user_name"
                               class="border border-gray-500 bg-white text-black p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-[#12c2e9]"
                               value="{{ $serie->user_name }}" required data-qa="user_name-input">
                        @error('user_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="user_photo_url" class="block text-[#e6e6fa] font-semibold mb-2" data-qa="user_photo_url-label">User Photo URL</label>
                        <input type="url" name="user_photo_url" id="user_photo_url"
                               class="border border-gray-500 bg-white text-black p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-[#12c2e9]"
                               value="{{ $serie->user_photo_url }}" data-qa="user_photo_url-input">
                        @error('user_photo_url')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                            class="bg-[#12c2e9] hover:bg-[#0b93d5] text-white font-bold py-3 px-6 rounded-lg transition-transform transform hover:-translate-y-1"
                            data-qa="submit-button">
                        Update Series
                    </button>
                </form>

                <div class="mt-4">
                    <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition-transform transform hover:-translate-y-1">
                        Volver
                    </a>
                </div>
            </div>
        @else
            <p class="text-center text-red-500 text-lg font-semibold mt-6">You do not have permission to edit this series.</p>
        @endcan
    @endsection
