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

        .custom-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        }

        .custom-form .form-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .custom-form .select-small {
            width: 200px; /* Ajusta el valor según el tamaño deseado */
        }

    </style>
@endsection



@section('body')
    <div class="container">
        <h1 class="text-center">Centros de Atención Primaria de la Salud</h1>

        @if(session('error'))
            <div class="alert alert-danger">
            {{ session('error') }}
            </div>
        @endif

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

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger rounded-pill">
                <i class="bi bi-box-arrow-left"></i> Cerrar Sesión
            </button>
        </form>

        <br>
        <br>
        

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

            <br>

            <form action="{{ route('encuesta.export.view') }}" method="GET" class="custom-form">
                @csrf
                <label for="fecha_inicio">Fecha Inicio:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio">
            
                <label for="fecha_fin">Fecha Fin:</label>
                <input type="date" id="fecha_fin" name="fecha_fin">
            
                <br>
            
                <div class="form-group">
                    <label for="cap_id">Seleccionar Caps:</label>
                    <select name="cap_id" id="cap_id" class="form-control select-small">
                        <option value="">Todos los Caps</option>
                        @for ($i = 1; $i <= 13; $i++)
                            <option value="{{ $i }}">Caps {{ $i }}</option>
                        @endfor
                    </select>
                </div>
            
                <button type="submit" class="btn btn-secondary">Exportar Info</button>
            </form>            
            

        </div>
    </div>
@endsection