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
        <h1 class="text-2xl font-bold mb-4">Creacio nou usuari</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.manage.store') }}" method="POST" data-qa="form-create-user" class="bg-[#0a0a14] p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" data-qa="label-name" class="block text-white">Nom</label>
                <input type="text" name="name" id="name" class="form-control border border-gray-300 text-black p-2 w-full" data-qa="input-name" required>
            </div>
            <div class="mb-4">
                <label for="email" data-qa="label-email" class="block text-white">Email</label>
                <input type="email" name="email" id="email" class="form-control border border-gray-300 text-black p-2 w-full" data-qa="input-email" required>
            </div>
            <div class="mb-4">
                <label for="password" data-qa="label-password" class="block text-white">Contrasenya</label>
                <input type="password" name="password" id="password" class="form-control border border-gray-300 text-black p-2 w-full" data-qa="input-password" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" data-qa="label-password-confirmation" class="block text-white">Confirmar contrasenya</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control border border-gray-300 text-black p-2 w-full" data-qa="input-password-confirmation" required>
            </div>
            <div class="mb-4">
                <label for="roles" data-qa="label-roles" class="block text-white">Rols</label>
                <select name="roles[]" id="roles" class="form-control border border-gray-300 text-black p-2 w-full" data-qa="input-roles" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="permissions" data-qa="label-permissions" class="block text-white">Permissos</label>
                <select name="permissions[]" id="permissions" class="form-control border border-gray-300 text-black p-2 w-full" data-qa="input-permissions" multiple>
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="text-white font-bold py-2 px-4 rounded" data-qa="button-submit">Crear</button>
        </form>
    </div>

@endsection
