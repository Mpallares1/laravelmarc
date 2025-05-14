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
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            text-align: center;
            text-transform: uppercase;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            h1 {
                font-size: 2rem;
            }

            table {
                font-size: 0.9rem;
            }

            th, td {
                padding: 8px;
            }

            .btn-create, .btn-edit, .btn-delete {
                padding: 6px 10px;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 1rem;
            }

            h1 {
                font-size: 1.8rem;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            th, td {
                display: block;
                text-align: left;
                padding: 8px 4px;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                color: #c471ed;
                display: inline-block;
                width: 100px;
            }

            .btn-create, .btn-edit, .btn-delete {
                display: block;
                margin: 0.5rem 0;
                text-align: center;
            }
        }
    </style>

    <div class="container">
        <h1>Administrar usuaris</h1>
        <a href="{{ route('users.manage.create') }}" class="btn-create">Crear nou usuari</a>
        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Accions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td data-label="Nom">{{ $user->name }}</td>
                    <td data-label="Email">{{ $user->email }}</td>
                    <td data-label="Accions">
                        <a href="{{ route('users.manage.edit', $user->id) }}" class="btn-edit">Editar</a>
                        <form action="{{ route('users.manage.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
