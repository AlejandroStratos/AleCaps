@extends('master')

@section('head')
    <style>
        .btn-custom {
            background-color: #5451EF;
            color: #FFFFFF;
            border-radius: 40px;
            width: 100%; /* Asegurar que el botón ocupe todo el ancho disponible */
            max-width: 300px; /* Limitar el ancho máximo del botón */
            white-space: nowrap; /* Evitar que el texto se divida en varias líneas */
            overflow: hidden; /* Ocultar cualquier texto que se desborde */
            text-overflow: ellipsis; /* Mostrar puntos suspensivos si el texto se desborda */
        }

        .alert-container {
            max-width: 90%;
            margin: 0 auto;
        }

        .centered-link {
            display: flex;
            justify-content: center;
            margin-bottom: 10px; /* Espacio entre los botones */
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
            <div class="centered-link">
                <a href="{{ route('familia.create') }}">
                    <button type="button" class="btn btn-custom">CREAR NUEVA ENCUESTA</button>
                </a>
            </div>

            <div class="centered-link">
                <a href="{{ route('encuesta.index') }}">
                    <button type="button" class="btn btn-custom">VER LISTADO DE ENCUESTAS</button>
                </a>
            </div>

            <div class="centered-link">
                <a href="{{ route('usuario.index') }}">
                    <button type="button" class="btn btn-custom">Ver USUARIOS</button>
                </a>
            </div>
        </div>
    </div>
@endsection

