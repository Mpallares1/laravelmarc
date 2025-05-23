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

        .user-photo {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-name {
            display: flex;
            align-items: center;
        }
    </style>

    <div class="max-w-4xl mx-auto bg-[#0a0a14] p-8 rounded-lg shadow-lg border border-gray-700 mt-10">
        <h1 class="text-2xl font-bold mb-6 text-center text-[#12c2e9]">Usuaris</h1>

        <!-- Formulario de búsqueda -->
        <input type="text" id="search" placeholder="Cercar usuaris..." class="bg-[#12121a] border border-gray-600 text-black p-2 w-full rounded focus:ring-2 focus:ring-[#12c2e9]" data-qa="search-input">

        <!-- Tabla de usuarios -->
        <div class="overflow-x-auto mt-4">
            <table class="w-full bg-[#12121a] border border-gray-700 rounded-lg overflow-hidden text-left">
                <thead class="bg-[#1a1a2e] text-[#12c2e9]">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Accions</th>
                </tr>
                </thead>
                <tbody id="userTable">
                @foreach($users as $user)
                    <tr class="border-b border-gray-700 hover:bg-[#1e1e2e] transition">
                        <td class="user-name">
                            @if($user->photo_url)
                                <img src="{{ $user->photo_url }}" alt="User Photo" class="user-photo">
                            @else
                                <div class="user-photo bg-gray-500 flex items-center justify-center">
                                    <span class="text-white">No Image</span>
                                </div>
                            @endif
                            {{ $user->name }}
                        </td>
                        <td class="px-4 py-3 text-[#e6e6fa]">{{ $user->email }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('users.show', $user->id) }}" class="bg-[#c471ed] hover:bg-[#a45bbf] text-yellow-300 font-bold py-2 px-4 rounded transition-colors" data-qa="user-details-link">Informació Usuari</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('search').addEventListener('keyup', function() {
            var searchValue = this.value.toLowerCase();
            var rows = document.querySelectorAll('#userTable tr');

            rows.forEach(function(row) {
                var name = row.querySelector('.user-name').textContent.toLowerCase();
                var email = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

                if (name.includes(searchValue) || email.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
