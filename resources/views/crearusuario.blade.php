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
<div class="container">
    

    <div class="row mt-4 mb-3">
        <!-- boton de volver al home-->
        <div class="col-12">
            <a href="{{ route('home') }}" class="btn btn-secondary position-absolute start-0 top-0 m-3">
                <i class="bi bi-arrow-left-short"></i>Volver
            </a>
        </div>
    </div>

    <br>
    <!-- formulario post para crear un nuevo usuario -->
    <div class="row">
        <div class="col-md-12 col-lg-12 ">
            <div class="card mt-4">
                <div class="card-header">
                    <h1 class="text-center">Crear nuevo usuario</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('usuario.store') }}" method="POST">
                        @csrf
            
                        <div class="input-group mb-3">
                            <input type="text" for= "nombreusuario" name="nombreusuario" class="form-control" placeholder="nombre de usuario"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            {{--  <span class="input-group-text" id="nombreusuario" name="nombreusuario"></span>  --}}
                        </div>
            
                        <div class="input-group mb-3">
                            <input type="text" for= "nombre" name="nombre" class="form-control" placeholder="Ingrese nombre"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            {{--  <span class="input-group-text" id="nombre" name="nombre"></span>  --}}
                        </div>
            
                        <div class="input-group mb-3">
                            <input type="text" for= "apellido" name="apellido" class="form-control" placeholder="Ingrese apellido"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            {{--  <span class="input-group-text" id="apellido" name="apellido"></span>  --}}
                        </div>
            
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
                    </form>
                    </div>
                
            </div> 
        </div>
    </div>
    
    <!-- mensaje -->
    <div class="col-12 mt-1">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

     @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    </div>
<!-- lista para ver todo los usuarios del sistema y opciones -->
    <div class="row">
    <div class="col-md-12 col-lg-12">
    <div class="card mt-4 mb-1">
        <div class="card-header">
            <h3 class="text-center">Listado de Usuarios</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-light " style="border-radius: 10px;">
                    <thead>
                        <tr>
                            <th >Nombre de usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Caps</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->nombreusuario}}</td>
                            <td>{{ $usuario->nombre}}</td>
                            <td>{{ $usuario->apellido}}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->rol }}</td>
                            <td>{{ $usuario->capId }}</td>
                            <td style="text-align:center;">
                                <a class="btn btn-primary btn-sm active" role="button" aria-pressed="true">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td style="text-align:center;">
                                
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar el usuario?')">
                                        <i class="fas fa-window-close" aria-hidden="true"></i>
                                    </button>
                              
                            </td>
                            <td>
                          <!-- select para reagsignar un caps(traidos de la base de datos en json) a un usuario -->     
                                <form action="{{Route('usuario.asignar')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="userId" value="{{$usuario->userId}}">
                                    <input type="hidden" name="email"  value="{{$usuario->email}}">
                                <div class="input-group mb-3">
                                    <div class="input-group mb-1">    
                                        <select name="capId" aria-label="Reasignar" class="form-control">
                                            <option value="" disabled selected>Reasignar</option>
                                            @foreach ($caps as $cap)
                                                <option value="{{$cap->capId}}">{{$cap->capId}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-warning">Asignar</button>
                                    </div>
                                        
                                </div>    
                                    
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    
    </div>
    </div>
</div>    

@endsection
