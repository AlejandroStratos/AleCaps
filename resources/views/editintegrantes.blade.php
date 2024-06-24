@extends('master')

@section('head')
<style>
    .integrante {
        margin-bottom: 30px;
    }
    @media (max-width: 768px) {
        .integrante {
            text-align: center;
        }
        .integrante label {
            display: block;
        }
    }
</style>
@endsection

@section('body')

<div class="container mt-5">
    <h1 class="text-center">Editar Integrantes</h1>
    <br>

    <form action="{{ route('integrante.update', ['famId' => $familia->famId]) }}" method="POST">
        @csrf
        @method('PUT')

        @foreach ($familia->integrantes as $integrante)
            <div class="integrante border p-3">
                <label>Apellido</label>
                <input type="text" class="form-control" name="integrantes[apellido][{{ $integrante->intId }}]" value="{{ $integrante->apellido }}" required>

                <label>Nombre</label>
                <input type="text" class="form-control" name="integrantes[nombre][{{ $integrante->intId }}]" value="{{ $integrante->nombre }}" required>

                <label>Fecha de nacimiento</label>
                <input type="date" class="form-control" name="integrantes[fechaNac][{{ $integrante->intId }}]" value="{{ $integrante->fechaNac }}" required>       

                <label>Estado DNI</label>
                <select class="form-control" name="integrantes[estadoDni][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->estadoDni === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->estadoDni === 'no' ? 'selected' : '' }}>No</option>
                </select>                      

                <label>Género</label>
                <select class="form-control" name="integrantes[genero][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->genero === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->genero === 'no' ? 'selected' : '' }}>No</option>
                </select>   

                <label>Nacionalidad</label>
                <select class="form-control" name="integrantes[nacionalidad][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->nacionalidad === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->nacionalidad === 'no' ? 'selected' : '' }}>No</option>
                </select>   

                <label>Vinculo</label>
                <select class="form-control" name="integrantes[vinculo][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->vinculo === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->vinculo === 'no' ? 'selected' : '' }}>No</option>
                </select>       

                <label>Nivel Educativo</label>
                <select class="form-control" name="integrantes[nivelEduc][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->nivelEduc === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->nivelEduc === 'no' ? 'selected' : '' }}>No</option>
                </select>          

                <label>Ocupacion</label>
                <select class="form-control" name="integrantes[ocupacion][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->ocupacion === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->ocupacion === 'no' ? 'selected' : '' }}>No</option>
                </select>         

                <label>Programa Social</label>
                <select class="form-control" name="integrantes[progSocial][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->progSocial === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->progSocial === 'no' ? 'selected' : '' }}>No</option>
                </select>         

                <label>Obra Social</label>
                <select class="form-control" name="integrantes[obraSocial][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->obraSocial === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->obraSocial === 'no' ? 'selected' : '' }}>No</option>
                </select>         

                <label>Enfermedades Cronicas</label>
                <select class="form-control" name="integrantes[enfermedadesCronicas][{{ $integrante->intId }}]" required>
                    <option value="si" {{ $integrante->enfermedadesCronicas === 'si' ? 'selected' : '' }}>Si</option>
                    <option value="no" {{ $integrante->enfermedadesCronicas === 'no' ? 'selected' : '' }}>No</option>
                </select>        

                <label>Ultimo Control</label>
                <input type="date" class="form-control" name="integrantes[ultimoControl][{{ $integrante->intId }}]" value="{{ $integrante->ultimoControl }}" required>   
            </div>

            
            <h2>----------------------------------------------------</h2>
            <br>

        @endforeach

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('encuesta.edit', ['encuestaId' => $familia->encuesta->encuestaId]) }}" class="btn btn-secondary">Editar encuesta</a>
        </div>
    </form>
</div>

@endsection
