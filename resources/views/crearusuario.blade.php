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
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-12">

                <a href="{{ route('home') }}" class="btn btn-secondary position-absolute start-0 top-0 m-3">
                    <i class="bi bi-arrow-left-short"></i>Volver
                </a>
            </div>

            <div class="col-12 mt-5">

                <h1 class="text-center">Crear nuevo usuario</h1>
                <form action="{{ route('usuario.store') }}" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" for= "nombreusuario" name="nombreusuario" class="form-control"
                            placeholder="nombre de usuario" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        {{--  <span class="input-group-text" id="nombreusuario" name="nombreusuario"></span>  --}}
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" for= "nombre" name="nombre" class="form-control"
                            placeholder="Ingrese nombre" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        {{--  <span class="input-group-text" id="nombre" name="nombre"></span>  --}}
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" for= "apellido" name="apellido" class="form-control"
                            placeholder="Ingrese apellido" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        {{--  <span class="input-group-text" id="apellido" name="apellido"></span>  --}}
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" for= "email" name="email" class="form-control"
                            placeholder="Ingrese correo del usuario" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <span class="input-group-text" id="email" name="email">@Ejemplo.com</span>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" for= "password" name="password" class="form-control" placeholder="contraseña"
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="password" name="password">password</span>
                    </div>

                    <div class="form-group">
                        <select name="rol" id="rol" class="form-control">
                            <option value="">Seleccionar rol</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Encuestador">Encuestador</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" for= "capId" name= "capId" class="form-control"
                            placeholder="Ingrese numero de caps del usuario" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <span class="input-group-text" id="capId" name= "capId">numero de caps</span>
                    </div>

                    <button type="submit" class="btn btn-custom btn-block">Guardar</button>

            </div>


            <div class="col  mt-3">
                <h1 class="text-center">Listado de Usuarios</h1>

                <table class="table table-hover table-bordered table-light " style="border-radius: 10px; overflow: hidden;">
                    <thead>
                        <tr>
                            <th>Nombre de usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Rol</th>
                            <th>Caps</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="col-12 mt-1">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>

                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->nombreusuario }}</td>
                                <td>{{ $usuario->nombre }}</td>
                                <td>{{ $usuario->apellido }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->password }}</td>
                                <td>{{ $usuario->rol }}</td>
                                <td>{{ $usuario->capId }}</td>


                                <td style="text-align:center;">
                                    <a{{--   href="{{ Route('editar.edit', $usuario->userId) }}"  --}} class="btn btn-primary btn-sm active" role="button"
                                        aria-pressed="true"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                </td>
                                <td style="text-align:center;">
                                    {{--  <form action="{{ Route('usuario.destroy', $usuario->userId) }}" method="POST">  --}}
                                    {{--  @csrf
                                    @method ('DELETE')  --}}
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Desea eliminar el usuario??')"><i
                                            class="fas fa-window-close" aria-hidden="true"></i>
                                    </button>
                                    </form>
                                <td>

                                    <form action="{{ Route('usuario.asignar') }}" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="hidden" name="userId" value="{{ $usuario->userId }}">
                                                    <input type="hidden" name="email" value="{{ $usuario->email }}">
                                                    <select name="capId" aria-label="Re asginar" class="form-control">
                                                        <option value="" disabled selected>Re asginar a caps</option>
                                                        @foreach ($caps as $cap)
                                                            <option value="{{ $cap->capId }}">{{ $cap->capId }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col">
                                                    <button type="submit" class="btn btn-warning">Asignar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        <div class="row justify-content-center">
                            {{ $usuarios->onEachSide(1)->links('pagination::bootstrap-4') }}
                            <hr>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
