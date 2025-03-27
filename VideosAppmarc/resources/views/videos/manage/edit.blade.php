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

    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Editar Video</h1>
        <form action="{{ route('videos.manage.update', $video->id) }}" method="POST" data-qa="form-edit-video" class="bg-[#0a0a14] p-6 rounded shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" data-qa="label-title" class="block text-white">Titol</label>
                <input type="text" name="title" id="title" class="form-control border border-gray-300 text-black p-2 w-full" data-qa="input-title" value="{{ $video->title }}" required>
            </div>
            <div class="mb-4">
                <label for="description" data-qa="label-description" class="block text-white">Descripcio</label>
                <textarea name="description" id="description" class="form-control border border-gray-300 text-black p-2 w-full" data-qa="textarea-description" required>{{ $video->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="url" data-qa="label-url" class="block text-white">URL</label>
                <input type="url" name="url" id="url" class="form-control border border-gray-300 text-black p-2 w-full" data-qa="input-url" value="{{ $video->url }}" required>
            </div>
            <div class="mb-4">
                <label for="series_id" data-qa="label-series" class="block text-white">Sèrie</label>
                <select name="series_id" id="series_id" class="form-control border border-gray-300 text-black p-2 w-full" data-qa="select-series">
                    <option value="">Selecciona una sèrie</option>
                    @foreach($series as $serie)
                        <option value="{{ $serie->id }}" {{ $video->series_id == $serie->id ? 'selected' : '' }}>{{ $serie->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="text-white font-bold py-2 px-4 rounded" data-qa="button-submit">Actualitzar</button>
        </form>
    </div>
@endsection
