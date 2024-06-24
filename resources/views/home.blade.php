@extends('master')

@section('head')
    <style>
        .btn-custom {
            background-color: #5451EF;
            color: #FFFFFF;
            border-radius: 40px;
            display: block;
            margin: 10px auto;
            width: 100%;
            max-width: 300px;
        }

        @media (min-width: 768px) {
            .btn-custom {
                max-width: 300px;
            }
        }

        .alert-container {
            max-width: 90%;
            margin: 0 auto;
        }
    </style>
@endsection

@section('body')
    <div class="container">
        <h1 class="text-center">Centros de Atención Primaria de la Salud</h1>

        @if (session('success'))
            <div class="alert-container">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="text-center">
            <a href="{{ route('familia.create') }}" class="d-block mb-3">
                <button type="button" class="btn btn-custom">CREAR NUEVA ENCUESTA</button>
            </a>

            <a href="{{ route('encuesta.index') }}" class="d-block mb-3">
                <button type="button" class="btn btn-custom">VER LISTADO DE ENCUESTAS</button>
            </a>

            <a href="{{ route('usuario.index') }}" class="d-block mb-3">
                <button type="button" class="btn btn-custom">Ver USUARIOS</button>
            </a>
        </div>
    </div>
@endsection
