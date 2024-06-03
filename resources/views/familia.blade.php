@extends('master') <!-- Extiende la vista maestra -->


@section('head')

    <style>
    .btn-custom {
        background-color: #5451EF; 
        color: #FFFFFF; 
        border-radius: 40px;
    }
    </style>

@endsection

@section('body')


    <h1 class="text-center">NUEVA FAMILIA</h1>

    <div class="container text-center">
        @if ($errors->any())
        <div class="alert-container">  <!-- AGREGAR ESTO PARA QUE SE PONGAN LAS ALERTAS DEL MISMO TAMAÑO -->
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    <div class="container text-center">
        <form action="{{ route('familia.store') }}" method="POST">
        @csrf

        <label>Domicilio:</label>
        <input type="text" name="domicilio">

        <button type="submit" class="btn btn-custom">Agregar integrantes</button>

        </form> 
    </div>


@endsection











