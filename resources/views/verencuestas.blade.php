@extends('master')

@section('head')
    <style>
        .table-responsive-custom {
            overflow-x: auto;
        }

        .btn-group-custom {
            display: flex;
            flex-direction: row;
            overflow-x: auto;
        }

        .btn-group-custom .btn {
            flex-shrink: 0;
        }

        .form-inline-custom {
            display: flex;
            flex-wrap: nowrap;
            justify-content: flex-end;
        }

        @media (max-width: 767px) {
            .form-inline-custom {
                flex-direction: column;
                align-items: stretch;
            }

            .form-inline-custom .form-control,
            .form-inline-custom .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
@endsection

@section('body')

<div class="container">
    <h1 class="text-center">Listado de Encuestas</h1>

    <br>

    <!-- Botón de volver a la izquierda y formulario de búsqueda a la derecha -->
    <div class="d-flex justify-content-between mb-3 flex-wrap align-items-center">
        <a href="{{ route('home') }}" class="btn btn-secondary mb-2 mb-md-0"><i class="bi bi-arrow-left-short"></i> Volver</a>
        <form action="{{ route('buscarEncuestas') }}" method="GET" class="form-inline form-inline-custom">
            <input type="text" name="domicilio" class="form-control mr-2 mb-2 mb-md-0" placeholder="Buscar por domicilio" value="{{ request('domicilio') }}">
            <button type="submit" class="btn btn-primary mb-2 mb-md-0">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <br>

    @if(count($encuestas) > 0)
        <div class="table-responsive table-responsive-custom">
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
                                <div class="btn-group btn-group-custom" role="group" aria-label="Acciones">
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
        </div>
    @else
        <p>No hay encuestas disponibles.</p>
    @endif
</div>

@endsection


