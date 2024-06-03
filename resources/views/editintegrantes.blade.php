@extends('master')

@section('head')

@endsection

@section('body')

<h1 class="text-center">Editar Integrantes</h1>
<br>


<div class="container text-center">
    <form action="{{ route('integrante.update', ['famId' => $familia->famId]) }}" method="POST">
        @csrf
        @method('PUT')

        @foreach ($familia->integrantes as $integrante)
            <!-- Campos de edición para cada integrante -->
            <div class="integrante">
                <label>Apellido</label>
                <input type="text" name="integrantes[apellido][{{ $integrante->intId }}]" value="{{ $integrante->apellido }}" required>
                <br>
                <label>Nombre</label>
                <input type="text" name="integrantes[nombre][{{ $integrante->intId }}]" value="{{ $integrante->nombre }}" required>
                <br>
                <label>Fecha de nacimiento</label>
                <input type="date" name="integrantes[fechaNac][{{ $integrante->intId }}]" value="{{ $integrante->fechaNac }}" required>       
                <br>

                <label>Estado DNI</label>
                <select name="integrantes[estadoDni][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->estadoDni === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->estadoDni === 'no' ? 'selected' : '' }}>No</option>
                </select>                      
                <br>

                <label>Género</label>
                <select name="integrantes[genero][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->genero === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->genero === 'no' ? 'selected' : '' }}>No</option>
                </select>   
                <br>

                <label>Nacionalidad</label>
                <select name="integrantes[nacionalidad][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->nacionalidad === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->nacionalidad === 'no' ? 'selected' : '' }}>No</option>
                </select>   
                <br>

                <label>Vinculo</label>
                <select name="integrantes[vinculo][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->vinculo === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->vinculo === 'no' ? 'selected' : '' }}>No</option>
                </select>       
                <br>

                <label>Nivel Educativo</label>
                <select name="integrantes[nivelEduc][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->nivelEduc === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->nivelEduc === 'no' ? 'selected' : '' }}>No</option>
                </select>          
                <br>

                <label>Ocupacion</label>
                <select name="integrantes[ocupacion][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->ocupacion === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->ocupacion === 'no' ? 'selected' : '' }}>No</option>
                </select>         
                <br>

                <label>Programa Social</label>
                <select name="integrantes[progSocial][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->progSocial === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->progSocial === 'no' ? 'selected' : '' }}>No</option>
                </select>         
                <br>

                <label>Obra Social</label>
                <select name="integrantes[obraSocial][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->obraSocial === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->obraSocial === 'no' ? 'selected' : '' }}>No</option>
                </select>         
                <br>

                <label>Enfermedades Cronicas</label>
                <select name="integrantes[enfermedadesCronicas][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->enfermedadesCronicas === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->enfermedadesCronicas === 'no' ? 'selected' : '' }}>No</option>
                </select>        
                <br>

                <label>Ultimo Control</label>
                <input type="date" name="integrantes[ultimoControl][{{ $integrante->intId }}]" value="{{ $integrante->ultimoControl }}" required>   

                <!-- Otros campos de integrante -->
            </div>

            <br>
            <h2>----------------------------------------------------</h2>
            <br>

        @endforeach



        <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        <a href="{{ route('encuesta.edit', ['encuestaId' => $familia->encuesta->encuestaId]) }}" class="btn btn-primary">Editar encuesta</a>

    </form>
</div>

@endsection