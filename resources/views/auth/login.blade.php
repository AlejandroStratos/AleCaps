@extends('master')

@section('head')
    <title>Login</title>
@endsection

@section('body')
<h1 class="text-center">Centros de Atención Primaria de la Salud</h1>
<div class="login-container d-flex justify-content-center align-items-center" style="margin-top: 180px;">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Iniciar Sesión</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="nombreusuario">Nombre de Usuario</label>
                <input type="text" class="form-control" id="nombreusuario" name="nombreusuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection