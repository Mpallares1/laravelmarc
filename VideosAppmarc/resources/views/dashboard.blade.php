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

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 50;
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

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            padding: 2rem;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }
    </style>

    <div class="py-12 bg-[#080810] min-h-screen flex flex-col">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0a0a14] text-[#e6e6fa] overflow-hidden shadow-xl sm:rounded-lg p-6 border border-gray-700">

                <x-welcome />

                <h2 class="font-semibold text-xl text-[#12c2e9] leading-tight text-center mt-6">
                    {{ __('Dashboard') }}
                </h2>

                <div class="grid mt-6">
                    <x-card title="Sèries" description="Explora totes les sèries disponibles">
                        <a href="{{ route('series.index') }}" class="text-blue-400 hover:underline">Veure més</a>
                    </x-card>
                    <x-card title="Usuaris" description="Gestiona els usuaris de la plataforma">
                        <a href="{{ route('users.index') }}" class="text-blue-400 hover:underline">Veure perfil</a>
                    </x-card>
                    <x-card title="Vídeos" description="Descobreix els vídeos disponibles">
                        <a href="{{ route('videos.index') }}" class="text-blue-400 hover:underline">Reproduir</a>
                    </x-card>
                </div>

                <div class="overlay" id="modal-overlay" style="display: none;"></div>

                <div class="modal bg-white rounded-lg shadow-lg p-6 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-60" id="modal" style="display: none;">
                    <h2 class="text-xl font-bold">Títol del Modal</h2>
                    <p class="text-gray-600">Contingut del modal aquí.</p>
                    <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded" onclick="closeModal()">Tanca</button>
                </div>

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

    <script>
        function openModal() {
            document.getElementById('modal-overlay').style.display = 'block';
            document.getElementById('modal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('modal-overlay').style.display = 'none';
            document.getElementById('modal').style.display = 'none';
        }
    </script>
@endsection
