@extends('master') <!-- Extiende la vista maestra -->

@section('head')
    <style>
        .btn-custom {
            background-color: #5451EF;
            color: #FFFFFF;
            border-radius: 40px;
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 10px auto;
        }

        @media (min-width: 768px) {
            .btn-custom {
                max-width: 200px;
            }
        }

        .alert-container {
            max-width: 90%;
            margin: 0 auto;
        }

        .form-control-custom {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        @media (min-width: 768px) {
            .form-control-custom {
                max-width: 400px;
            }
        }

        @media (min-width: 1024px) {
            .form-control-custom {
                max-width: 400px;
            }
        }
    </style>
@endsection

@section('body')
    <div class="container">
        <h1 class="text-center">NUEVA FAMILIA</h1>
        <br>

        <div class="text-center">
            @if ($errors->any())
                <div class="alert-container">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('familia.store') }}" method="POST">
                @csrf

                <label for="domicilio">Domicilio:</label>
                <input type="text" id="domicilio" name="domicilio" class="form-control form-control-custom mb-3">

                <button type="submit" class="btn btn-custom">Agregar integrantes</button>
            </form>

            <br>

            <a href="{{ route('home') }}" class="btn btn-danger">
                <i class="bi bi-x"></i> Cancelar
            </a>
        </div>
    </div>
@endsection










