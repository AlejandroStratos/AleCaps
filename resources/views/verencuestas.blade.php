@extends('master')

@section('head')

@endsection

@section('body')

<div class="container">
    <h1 class="text-center">Listado de Encuestas</h1>

{{--     <!-- Formulario de búsqueda -->
    <form action="{{ route('encuesta.search') }}" method="GET" class="mb-4">
        <div class="form-group">
            <label for="search">Buscar por Domicilio:</label>
            <input type="text" name="search" id="search" class="form-control" placeholder="Ingrese el domicilio">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form> --}}
    
    @if(count($encuestas) > 0)
        <table class="table table-hover table-bordered table-light">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Domicilio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($encuestas as $encuesta)
                    <tr>
                        <td>{{ $encuesta->encuestaId }}</td>
                        <td>{{ $encuesta->familia->domicilio }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <a href="{{ route('encuesta.show', $encuesta->encuestaId) }}" class="btn btn-primary mr-2">Ver Encuesta Completa</a>
                                <a href="{{ route('familia.edit', $encuesta->famId) }}" class="btn btn-primary mr-2">Editar</a>
                                <form action="{{ route('encuesta.destroy', $encuesta->encuestaId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta encuesta?')">Borrar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay encuestas disponibles.</p>
    @endif
</div>


@endsection