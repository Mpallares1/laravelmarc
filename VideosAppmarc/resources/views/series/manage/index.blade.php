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

    @can('manageseries')
        <div class="container">
            <h1>Administrar Series</h1>
            <div class="flex justify-center mb-4">
                <a href="{{ route('series.manage.create') }}" class="btn-create">Crear Nueva Serie</a>
            </div>
            <table>
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>User Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($series as $serie)
                    <tr>
                        <td data-label="Title">{{ $serie->title }}</td>
                        <td data-label="Description">{{ $serie->description }}</td>
                        <td data-label="User Name">{{ $serie->user_name }}</td>
                        <td data-label="Actions">
                            <a href="{{ route('series.manage.edit', $serie->id) }}" class="btn-edit">Editar</a>
                            <form action="{{ route('series.manage.destroy', $serie->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar esta serie?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>No tienes permiso para ver esta página.</p>
    @endcan
@endsection
