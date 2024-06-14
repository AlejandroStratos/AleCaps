@extends('master') <!-- Extiende la vista maestra -->

@section('head')
    <!-- INTRODUCIR ACA LO QUE QUERES QUE SE AGREGUE DEL HEAD -->

    <style>
        .btn-custom {
            background-color: #5451EF;
            color: #FFFFFF;
            border-radius: 40px;
            display: block;
            margin: 0 auto;
        }
    </style>

    <style>
        .alert-container {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>
@endsection


@section('body') <!-- INTRODUCIR ACA LO QUE QUERES QUE SE AGREGUE DEL BODY -->



    <h1 class="text-center">Centros de Atención Primaria de la Salud</h1>

    @if (session('success'))
        <div class="alert-container">
            <div class="alert alert-success">
                {{ session('success') }}
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

    <a href="{{ route('familia.create') }}">
        <button type="button" class="btn btn-custom">CREAR NUEVA ENCUESTA</button>
    </a>

    <br>

    <a href="{{ route('encuesta.index') }}">
        <button type="button" class="btn btn-custom">VER LISTADO DE ENCUESTAS</button>
    </a>

    <br>
    <a href="{{ route('usuario.index') }}">
        <button type="button" class="btn btn-custom">Ver USUARIOS</button>
    </a>

@endsection
