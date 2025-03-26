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
    <div class="max-w-4xl mx-auto bg-[#0a0a14] p-8 rounded-lg shadow-lg border border-gray-700 mt-10">
        <h1 class="text-2xl font-bold mb-6 text-center text-[#12c2e9]">Usuaris</h1>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="{{ route('users.index') }}" class="mb-6 flex items-center space-x-2">
            <input type="text" name="search" placeholder="Cercar usuaris..." value="{{ request('search') }}"
                   class="bg-[#12121a] border border-gray-600 text-black p-2 w-full rounded focus:ring-2 focus:ring-[#12c2e9]"
                   data-qa="search-input">
            <button type="submit" class="bg-[#12c2e9] hover:bg-[#0b93d5] text-yellow-300  font-bold py-2 px-4 rounded transition-colors"
                    data-qa="search-button">Cercar</button>
        </form>

        <!-- Tabla de usuarios -->
        <div class="overflow-x-auto">
            <table class="w-full bg-[#12121a] border border-gray-700 rounded-lg overflow-hidden text-left">
                <thead class="bg-[#1a1a2e] text-[#12c2e9]">
                <tr>
                    <th class="px-4 py-3">Nom</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Accions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="border-b border-gray-700 hover:bg-[#1e1e2e] transition">
                        <td class="px-4 py-3 text-[#e6e6fa]">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-[#e6e6fa]">{{ $user->email }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('users.show', $user->id) }}" class="bg-[#c471ed] hover:bg-[#a45bbf] text-yellow-300 font-bold py-2 px-4 rounded transition-colors"
                               data-qa="user-details-link">Informació Usuari</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
