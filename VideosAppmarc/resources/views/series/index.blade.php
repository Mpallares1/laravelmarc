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
            font-size: 2rem;
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

        .series-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 10px;
        }

        .series-title {
            display: flex;
            align-items: center;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            table {
                font-size: 0.9rem;
            }

            th, td {
                padding: 8px;
            }

            .btn-back {
                font-size: 0.9rem;
                padding: 8px 16px;
            }
        }
    </style>

    <div class="container">
        <h1>All Series</h1>
        <div class="flex justify-center mb-4">
            <input type="text" id="search" placeholder="Search series..." class="form-control border border-gray-300 text-black p-2 w-full sm:w-1/2">
        </div>
        <div class="overflow-x-auto">
            <table>
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="seriesTable">
                @foreach($series as $serie)
                    <tr>
                        <td class="series-title">
                            @if($serie->image)
                                <img src="{{ $serie->image }}" alt="Series Image" class="series-image">
                            @else
                                <div class="series-image bg-gray-500 flex items-center justify-center">
                                    <span class="text-white">No Image</span>
                                </div>
                            @endif
                            {{ $serie->title }}
                        </td>
                        <td>{{ $serie->description }}</td>
                        <td>
                            <a href="{{ route('series.show', $serie->id) }}" class="btn-edit">View Videos</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ url()->previous() }}" class="btn-back">Volver Atrás</a>
    </div>

    <script>
        document.getElementById('search').addEventListener('keyup', function() {
            var searchValue = this.value.toLowerCase();
            var rows = document.querySelectorAll('#seriesTable tr');

            rows.forEach(function(row) {
                var title = row.querySelector('.series-title').textContent.toLowerCase();
                var description = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

                if (title.includes(searchValue) || description.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
