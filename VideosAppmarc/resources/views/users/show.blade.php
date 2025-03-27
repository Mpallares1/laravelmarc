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

        .user-photo {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin: 0 auto 1rem;
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
    </style>
    <div class="container">
        <h1>User Information</h1>
        <div class="text-center mb-4">
            @if($user->user_photo_url)
                <img src="{{ $user->user_photo_url }}" alt="User Photo" class="user-photo">
            @else
                <div class="user-photo bg-gray-500 flex items-center justify-center">
                    <span class="text-white">No Image</span>
                </div>
            @endif
        </div>
        <div>
            <strong>Name:</strong> {{ $user->name }}
        </div>
        <div>
            <strong>Email:</strong> {{ $user->email }}
        </div>
        <div>
            <strong>Videos: </strong> {{ $videoCount }}
        </div>
        <a href="{{ url()->previous() }}" class="btn-back">Volver Atrás</a>
    </div>
@endsection
