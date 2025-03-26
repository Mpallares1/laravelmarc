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
    <div class="max-w-lg mx-auto bg-[#0a0a14] p-8 rounded-lg shadow-lg border border-gray-700 mt-10">
        <h1 class="text-2xl font-bold mb-6 text-center text-[#12c2e9]">Editar Usuari</h1>
        <form action="{{ route('users.manage.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-[#e6e6fa] font-medium">Nom:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required
                       class="bg-[#12121a] border border-gray-600 text-black p-2 w-full rounded focus:ring-2 focus:ring-[#12c2e9]">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-[#e6e6fa] font-medium">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required
                       class="bg-[#12121a] border border-gray-600 text-black p-2 w-full rounded focus:ring-2 focus:ring-[#12c2e9]">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-[#e6e6fa] font-medium">Contrasenya:</label>
                <input type="password" id="password" name="password"
                       class="bg-[#12121a] border border-gray-600 text-black  p-2 w-full rounded focus:ring-2 focus:ring-[#12c2e9]">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-[#e6e6fa] font-medium">Confirmar Contrasenya:</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                       class="bg-[#12121a] border border-gray-600 text-black  p-2 w-full rounded focus:ring-2 focus:ring-[#12c2e9]">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('users.manage.index') }}" class="bg-[#c471ed] hover:bg-[#a45bbf] text-white font-bold py-2 px-4 rounded transition-colors">Cancelar</a>
                <button type="submit" class="bg-[#12c2e9] hover:bg-[#0b93d5] text-white font-bold py-2 px-4 rounded transition-colors">
                    Actualitzar
                </button>
            </div>
        </form>
    </div>

@endsection
