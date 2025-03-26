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

    <div class="container mx-auto mt-8 text-[#e6e6fa] flex justify-center">
        <div class="bg-[#0a0a14] p-8 rounded-lg shadow-lg border border-gray-700 max-w-lg w-full">
            <h1 class="text-2xl font-bold mb-6 text-center">Creació nou vídeo</h1>
            <form action="{{ route('videos.manage.store') }}" method="POST" data-qa="form-create-video">
                @csrf
                <div class="mb-4">
                    <label for="title" data-qa="label-title" class="block text-[#e6e6fa] font-medium">Títol</label>
                    <input type="text" name="title" id="title" class="bg-[#12121a] border border-gray-600 text-black p-2 w-full rounded focus:ring-2 focus:ring-[#12c2e9]" data-qa="input-title" required>
                </div>
                <div class="mb-4">
                    <label for="description" data-qa="label-description" class="block text-[#e6e6fa] font-medium">Descripció</label>
                    <textarea name="description" id="description" class="bg-[#12121a] border border-gray-600 text-black p-2 w-full rounded focus:ring-2 focus:ring-[#12c2e9]" data-qa="textarea-description" required></textarea>
                </div>
                <div class="mb-6">
                    <label for="url" data-qa="label-url" class="block text-[#e6e6fa] font-medium">URL</label>
                    <input type="url" name="url" id="url" class="bg-[#12121a] border border-gray-600 text-black p-2 w-full rounded focus:ring-2 focus:ring-[#12c2e9]" data-qa="input-url" required>
                </div>
                <div class="flex justify-between">
                    <a href="{{ route('videos.manage.index') }}" class="bg-[#c471ed] hover:bg-[#a45bbf] text-white font-bold py-2 px-4 rounded transition-colors">Volver</a>
                    <button type="submit" class="bg-[#12c2e9] hover:bg-[#0b93d5] text-white font-bold py-2 px-4 rounded transition-colors" data-qa="button-submit">Crear</button>
                </div>
            </form>
        </div>
    </div>

@endsection
