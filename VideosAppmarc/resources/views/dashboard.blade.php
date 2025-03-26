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
    <div class="py-12 bg-[#080810] min-h-screen flex flex-col">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0a0a14] text-[#e6e6fa] overflow-hidden shadow-xl sm:rounded-lg p-6 border border-gray-700">

                <x-welcome />



                <!-- Dashboard con botones de administración -->
                <h2 class="font-semibold text-xl text-[#12c2e9] leading-tight text-center mt-6">
                    {{ __('Dashboard') }}
                </h2>

                <div class="flex justify-center space-x-4 mt-6">
                    @can('manage-videos')
                        <a href="{{ route('videos.manage.index') }}"
                           class="bg-[#12c2e9] hover:bg-[#0b93d5] text-white font-bold py-2 px-4 rounded transition-colors">
                            Manage Videos
                        </a>
                    @endcan

                    @can('admmistradorUsuaris')
                        <a href="{{ route('users.manage.index') }}"
                           class="bg-[#c471ed] hover:bg-[#a45bbf] text-white font-bold py-2 px-4 rounded transition-colors">
                            Administrar Usuaris
                        </a>
                    @endcan

                    <a href="{{ route('videos.index') }}"
                       class="bg-[#c471ed] hover:bg-[#a45bbf] text-white font-bold py-2 px-4 rounded transition-colors">
                        Volver a Videos
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
