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
                    <option value="Actualizado" {{ $integrante->estadoDni === 'Actualizado' ? 'selected' : '' }}>Actualizado</option>
                    <option value="Requiero Actualización" {{ $integrante->estadoDni === 'Requiero Actualización' ? 'selected' : '' }}>Requiero Actualización</option>
                    <option value="Nunca lo tramitó/indocumentado/a" {{ $integrante->estadoDni === 'Nunca lo tramitó/indocumentado/a' ? 'selected' : '' }}>Nunca lo tramitó/indocumentado/a</option>
                    <option value="Residencia precaria" {{ $integrante->estadoDni === 'Residencia precaria' ? 'selected' : '' }}>Residencia precaria</option>
                    <option value="Radicación" {{ $integrante->estadoDni === 'Radicación' ? 'selected' : '' }}>Radicación</option>
                    <option value="Documentación extranjera" {{ $integrante->estadoDni === 'Documentación extranjera' ? 'selected' : '' }}>Documentación extranjera</option>
                </select>
                <br>

                <label>Género</label>
                <select name="integrantes[genero][{{ $integrante->intId }}]" required>
                    <option value="Mujer" {{ $integrante->genero === 'Mujer' ? 'selected' : '' }}>Mujer</option>
                    <option value="Mujer trans/travesti" {{ $integrante->genero === 'Mujer trans/travesti' ? 'selected' : '' }}>Mujer trans/travesti</option>
                    <option value="Varón" {{ $integrante->genero === 'Varón' ? 'selected' : '' }}>Varón</option>
                    <option value="Varón trans/masculinidad trans" {{ $integrante->genero === 'Varón trans/masculinidad trans' ? 'selected' : '' }}>Varón trans/masculinidad trans</option>
                    <option value="No binario" {{ $integrante->genero === 'No binario' ? 'selected' : '' }}>No binario</option>
                    <option value="" {{ $integrante->genero === '' ? 'selected' : '' }}></option>
                </select>
                <br>

                <label>Nacionalidad</label>
                <select name="integrantes[nacionalidad][{{ $integrante->intId }}]" required>
                    <option value="Argentino" {{ $integrante->nacionalidad === 'Argentino' ? 'selected' : '' }}>Argentino</option>
                    <option value="Paraguayo" {{ $integrante->nacionalidad === 'Paraguayo' ? 'selected' : '' }}>Paraguayo</option>
                    <option value="Boliviano" {{ $integrante->nacionalidad === 'Boliviano' ? 'selected' : '' }}>No</option>
                    <option value="Uruguayo" {{ $integrante->nacionalidad === 'Uruguayo' ? 'selected' : '' }}>Uruguayo</option>
                    <option value="Brasilero" {{ $integrante->nacionalidad === 'Brasilero' ? 'selected' : '' }}>Brasilero</option>
                    <option value="Chileno" {{ $integrante->nacionalidad === 'Chileno' ? 'selected' : '' }}>Chileno</option>
                    <option value="Peruano" {{ $integrante->nacionalidad === 'Peruano' ? 'selected' : '' }}>Peruano</option>
                    <option value="Otro" {{ $integrante->nacionalidad === 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
                <br>



                <label>Vinculo</label>
                <select name="integrantes[vinculo][{{ $integrante->intId }}]" required>
                    <option value="Esposo/a" {{ $integrante->vinculo === 'Esposo/a' ? 'selected' : '' }}>Esposo/a</option>
                    <option value="Concubino/a" {{ $integrante->vinculo === 'Concubino/a' ? 'selected' : '' }}>Concubino/a</option>
                    <option value="Hijo/a" {{ $integrante->vinculo === 'Hijo/a' ? 'selected' : '' }}>Hijo/a</option>
                    <option value="Padre" {{ $integrante->vinculo === 'Padre' ? 'selected' : '' }}>Padre</option>
                    <option value="Madre" {{ $integrante->vinculo === 'Madre' ? 'selected' : '' }}>Madre</option>
                    <option value="Abuelo/a" {{ $integrante->vinculo === 'Abuelo/a' ? 'selected' : '' }}>Abuelo/a</option>
                    <option value="Nieto/a" {{ $integrante->vinculo === 'Nieto/a' ? 'selected' : '' }}>Nieto/a</option>
                    <option value="Tío/a" {{ $integrante->vinculo === 'Tío/a' ? 'selected' : '' }}>Tío/a</option>
                    <option value="Sobrino/a" {{ $integrante->vinculo === 'Sobrino/a' ? 'selected' : '' }}>Sobrino/a</option>
                    <option value="Suegro/a" {{ $integrante->vinculo === 'Suegro/a' ? 'selected' : '' }}>Suegro/a</option>
                    <option value="Cuñado/a" {{ $integrante->vinculo === 'Cuñado/a' ? 'selected' : '' }}>Cuñado/a</option>
                    <option value="Unión civil" {{ $integrante->vinculo === 'Unión civil' ? 'selected' : '' }}>Unión civil</option>
                    <option value="Unión de hecho" {{ $integrante->vinculo === 'Unión de hecho' ? 'selected' : '' }}>Unión de hecho</option>
                    <option value="Otro" {{ $integrante->vinculo === 'Otro' ? 'selected' : '' }}><span class="octicon octicon-arrow-small-right"></span></option>
                </select>
                <br>



                <label>Nivel Educativo</label>
                <select name="integrantes[nivelEduc][{{ $integrante->intId }}]" required>
                    <select name="integrantes[nivelEduc][]">
                        <option value="Ninguno por edad" {{ $integrante->nivelEduc === 'Ninguno por edad' ? 'selected' : '' }}>Ninguno por edad</option>
                        <option value="Primaria incompleta" {{ $integrante->nivelEduc === 'Primaria incompleta' ? 'selected' : '' }}>Primaria incompleta</option>
                        <option value="Primaria completa" {{ $integrante->nivelEduc === 'Primaria completa' ? 'selected' : '' }}>Primaria completa</option>
                        <option value="Secundaria incompleta" {{ $integrante->nivelEduc === 'Secundaria incompleta' ? 'selected' : '' }}>Secundaria incompleta</option>
                        <option value="Secundaria completa" {{ $integrante->nivelEduc === 'Secundaria completa' ? 'selected' : '' }}>Secundaria completa</option>
                        <option value="Terciario completo" {{ $integrante->nivelEduc === 'Terciario completo' ? 'selected' : '' }}>Terciario completo</option>
                        <option value="Universitario completo" {{ $integrante->nivelEduc === 'Universitario completo' ? 'selected' : '' }}>Universitario completo</option>
                        <option value="Analfabeto: no lee ni escribe" {{ $integrante->nivelEduc === 'Analfabeto: no lee ni escribe' ? 'selected' : '' }}>Analfabeto: no lee ni escribe</option>
                        <option value="No sabe/no contesta" {{ $integrante->nivelEduc === 'No sabe/no contesta' ? 'selected' : '' }}>No sabe/no contesta</option>
                        <option value="Cursando primaria" {{ $integrante->nivelEduc === 'Cursando primaria' ? 'selected' : '' }}>Cursando primaria</option>
                        <option value="Cursando secundaria" {{ $integrante->nivelEduc === 'Cursando secundaria' ? 'selected' : '' }}>Cursando secundaria</option>
                        <option value="Cursando terciaria" {{ $integrante->nivelEduc === 'Cursando terciaria' ? 'selected' : '' }}>Cursando terciaria</option>
                        <option value="Cursando universidad" {{ $integrante->nivelEduc === 'Cursando universidad' ? 'selected' : '' }}>Cursando universidad</option>
                        <option value="Cursando inicial" {{ $integrante->nivelEduc === 'Cursando inicial' ? 'selected' : '' }}>Cursando inicial</option>
                    </select>

                </select>
                <br>

                <label>Ocupacion</label>
                <select name="integrantes[ocupacion][{{ $integrante->intId }}]" required>
                    <option value="Ninguno" {{ $integrante->ocupacion === 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                    <option value="Empleado dependencia" {{ $integrante->ocupacion === 'Empleado dependencia' ? 'selected' : '' }}>Empleado dependencia</option>
                    <option value="Changas, temporario" {{ $integrante->ocupacion === 'Changas, temporario' ? 'selected' : '' }}>Changas, temporario</option>
                    <option value="Cuentapropista, monotrib" {{ $integrante->ocupacion === 'Cuentapropista, monotrib' ? 'selected' : '' }}>Cuentapropista, monotrib</option>
                    <option value="Desocupado" {{ $integrante->ocupacion === 'Desocupado' ? 'selected' : '' }}>Desocupado</option>
                    <option value="Jubilado/pensionado" {{ $integrante->ocupacion === 'Jubilado/pensionado' ? 'selected' : '' }}>Jubilado/pensionado</option>
                    <option value="Beneficio plan social" {{ $integrante->ocupacion === 'Beneficio plan social' ? 'selected' : '' }}>Beneficio plan social</option>
                    <option value="No sabe, no contesta" {{ $integrante->ocupacion === 'No sabe, no contesta' ? 'selected' : '' }}>No sabe, no contesta</option>
                </select>
                <br>

                <label>Programa Social</label>
                <select name="integrantes[progSocial][{{ $integrante->intId }}]" required>
                    <option value="AUH" {{ $integrante->progSocial === 'AUH' ? 'selected' : '' }}>AUH</option>
                    <option value="Potenciar trabajo" {{ $integrante->progSocial === 'Potenciar trabajo' ? 'selected' : '' }}>Potenciar trabajo</option>
                    <option value="Becas progresar" {{ $integrante->obraSocial === 'Becas progresar' ? 'selected' : '' }}>Becas progresar</option>
                    <option value="Acompañar" {{ $integrante->obraSocial === 'Acompañar' ? 'selected' : '' }}>Acompañar</option>
                    <option value="Otros" {{ $integrante->obraSocial === 'Otros' ? 'selected' : '' }}>Otros</option>
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

        <a
href="{{ route('encuesta.edit', ['encuestaId' => $familia->encuesta->encuestaId]) }}" class="btn btn-primary">Editar encuesta</a>

    </form>
</div>

@endsection
