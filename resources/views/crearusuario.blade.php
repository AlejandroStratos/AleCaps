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
    <div class="container mt-5">


        <h1 class="text-center">Crear nuevo usuario</h1>
        <form action="{{ route('usuario.store') }}" method="POST">
            @csrf

            <div class="input-group mb-3">
                <input type="text" for= "email" name="email" class="form-control" placeholder="Ingrese correo del usuario"
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span class="input-group-text" id="email" name="email">@Ejemplo.com</span>
            </div>

            <div class="input-group mb-3">
                <input type="text" for= "password" name="password" class="form-control" placeholder="contraseña"
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span class="input-group-text" id="password" name="password">password</span>
            </div>

            <div class="form-group">
                <select name="rol" id="rol" class="form-control">
                        <option value="">Seleccionar rol del usuario</option>
                        <option value=>Administrador</option>
                        <option value=>Encuestador</option>
                </select>
                </div>

            <div class="input-group mb-3">
                <input type="text" for= "capId" name= "capId" class="form-control"
                    placeholder="Ingrese numero de caps del usuario" aria-label="Recipient's username"
                    aria-describedby="basic-addon2">
                <span class="input-group-text" id="capId" name= "capId">numero de caps</span>
            </div>

            <button type="submit" class="btn btn-custom btn-block">Guardar</button>

            <div class="container mt-5">
                <h1 class="text-center">Listado de Usuarios</h1>

                <table class="table table-hover table-bordered table-light">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Rol</th>
                            <th>Caps</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->password }}</td>
                                <td>{{ $usuario->rol }}</td>
                                <td>{{ $usuario->capId }}</td>
                                <td style="text-align:center;"><a{{--   href="{{ Route('editar.edit', $usuario->userId) }}"  --}} class="btn btn-primary btn-sm active"
                                    role="button" aria-pressed="true"><i class="fas fa-edit" aria-hidden="true"></i></a>
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
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        <div class="row justify-content-center">{{ $usuarios->onEachSide(1)->links('pagination::bootstrap-4') }}
                        <hr>
                    </div>
                </div>

        </div>
    </div>
@endsection
