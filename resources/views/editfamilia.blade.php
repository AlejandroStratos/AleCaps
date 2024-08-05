@extends('master')

 @section('head')
 <style>
     @media (max-width: 768px) {
         .form-group {
             text-align: center;
         }
         .form-group label {
             display: block;
         }
     }
 </style>
 @endsection

 @section('body')

 <div class="container mt-5">
     <h1 class="text-center">Editar Domicilio de la Familia</h1>
    <br>
     <form method="post" action="{{ route('familia.update', ['famId' => $familia->famId]) }}">
         @csrf
         @method('PUT')

         <div class="form-group row justify-content-center">
             <label for="domicilio" class="col-md-2 col-form-label text-md-right">Domicilio:</label>
             <div class="col-md-6">
                 <input type="text" class="form-control" id="domicilio" name="domicilio" value="{{ $familia->domicilio }}">
             </div>
         </div>

         <div class="text-center mt-3">
             <button type="submit" class="btn btn-primary">Guardar Cambios</button>
             <a href="{{ route('integrante.edit', ['famId' => $familia->famId]) }}" class="btn btn-secondary">Editar integrantes</a>
         </div>
     </form>
 </div>

 @endsection

