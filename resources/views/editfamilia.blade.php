@extends('master')

@section('head')

@endsection

@section('body')

<div class="container">
    <h1 class="text-center">Editar Domicilio de la Familia</h1>

    <form method="post" action="{{ route('familia.update', ['famId' => $familia->famId]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="domicilio">Domicilio:</label>
            <input type="text" class="form-control" id="domicilio" name="domicilio" value="{{ $familia->domicilio }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        <a href="{{ route('integrante.edit', ['famId' => $familia->famId]) }}" class="btn btn-primary">Editar integrantes</a>
    </form>
</div>

@endsection
