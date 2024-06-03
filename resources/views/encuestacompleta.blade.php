@extends('master')

@section('head')

@endsection

@section('body')

<div class="container">
<h1 class="text-center">Encuesta Completa</h1>
<br>
    
@if($encuesta)

 <table class="table table-hover table-bordered table-light">
    <tr>
        <th>ID de Encuesta</th>
        <td>{{ $encuesta->encuestaId }}</td>
    </tr>
    <tr>
        <th>Domicilio de la Familia</th>
        <td>{{ $encuesta->familia->domicilio }}</td>
    </tr>
    <tr>
        <th>¿Cómo considera que es el acceso a la atención en salud suyo y/o de su familia?</th>
        <td>{{ $encuesta->accSalud1 }}</td>
    </tr>
    <tr>
        <th>¿Usted y/o su familia realizan controles preventivos de salud?</th>
        <td>{{ $encuesta->accSalud2 }}</td>
    </tr>
    <tr>
        <th>Ante algún problema de Salud ¿A dónde concurren?</th>
        <td>{{ $encuesta->accSalud3 }}</td>
    </tr>
    <tr>
        <th>¿Cómo los consiguen?</th>
        <td>{{ $encuesta->accSalud4 }}</td>
    </tr>
    <tr>
        <th>¿Cuál es el tiempo de espera de los turnos?</th>
        <td>{{ $encuesta->accSalud5 }}</td>
    </tr>
    <tr>
        <th>¿Tiene indicada medicación?</th>
        <td>{{ $encuesta->accSalud6 }}</td>
    </tr>
    <tr>
        <th>¿Tiene acceso a la medicación?</th>
        <td>{{ $encuesta->accSalud7 }}</td>
    </tr>
    <tr>
        <th>¿Cómo la consigue?</th>
        <td>{{ $encuesta->accSalud8 }}</td>
    </tr>
    <tr>
        <th>¿Toma la medicación acorde a la indicación médica?</th>
        <td>{{ $encuesta->accSalud9 }}</td>
    </tr>
    <tr>
        <th>¿Alguien en el grupo familiar recibe tratamiento en Salud Mental (Psicológico y/o Psiquiátrico)?</th>
        <td>{{ $encuesta->accMental1 }}</td>
    </tr>
    <tr>
        <th>¿Alguien en su familia lo necesitó y no lo obtuvo?</th>
        <td>{{ $encuesta->accMental2 }}</td>
    </tr>
    <tr>
        <th>De la siguiente lista de problemas sociales y de salud ¿cuáles son los 3 principales que identifica en el barrio?</th>
        <td>{{ $encuesta->prSoysa }}</td>
    </tr>
    <tr>
        <th>¿Recibe asistencia alimentaria?</th>
        <td>{{ $encuesta->alimantacion1 }}</td>
    </tr>
    <tr>
        <th>¿De qué tipo? (se puede responder más de una)</th>
        <td>{{ $encuesta->alimentacion2 }}</td>
    </tr>
    <tr>
        <th>¿Tiene huerta en su casa?</th>
        <td>{{ $encuesta->alimentacion3 }}</td>
    </tr>
    <tr>
        <th>¿Cría de animales para consumo? </th>
        <td>{{ $encuesta->alimentacion4 }}</td>
    </tr>
    <tr>
        <th>¿Participa en alguna institución/organización?</th>
        <td>{{ $encuesta->partSocial }}</td>
    </tr>
    <tr>
        <th>Carácter de la vivienda / lote</th>
        <td>{{ $encuesta->vivienda1 }}</td>
    </tr>
    <tr>
        <th>Materiales que predominan en la vivienda</th>
        <td>{{ $encuesta->vivienda2 }}</td>
    </tr>
    <tr>
        <th>Materiales predominantes en el piso</th>
        <td>{{ $encuesta->vivienda3 }}</td>
    </tr>
    <tr>
        <th>El techo ¿tiene revestimiento interior o cielorraso?</th>
        <td>{{ $encuesta->vivienda4 }}</td>
    </tr>
    <tr>
        <th>¿Cuántas habitaciones o piezas para dormir tiene este hogar?</th>
        <td>{{ $encuesta->vivienda5 }}</td>
    </tr>
    <tr>
        <th>El baño/letrina se encuentra:</th>
        <td>{{ $encuesta->vivienda6 }}</td>
    </tr>
    <tr>
        <th>El desagüe del inodoro es:</th>
        <td>{{ $encuesta->vivienda7 }}</td>
    </tr>
    <tr>
        <th>Tiene agua...</th>
        <td>{{ $encuesta->accBas1 }}</td>
    </tr>
    <tr>
        <th>Para cocinar utiliza…</th>
        <td>{{ $encuesta->accBas2 }}</td>
    </tr>
    <tr>
        <th>El agua que usa, proviene de...</th>
        <td>{{ $encuesta->accBas3 }}</td>
    </tr>
    <tr>
        <th>Para calefaccionarse utiliza…</th>
        <td>{{ $encuesta->accBas4 }}</td>
    </tr>

     
    <!-- Agrega aquí más campos de la encuesta -->
</table>
    
<br>
<br>
    <h2>Integrantes</h2>

    @else
    <p>Encuesta no encontrada.</p>
    @endif

    <table class="table table-hover table-bordered table-light">
        <thead>
            <tr>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Fecha de Nacimiento</th>
                <th>Estado DNI</th>
                <th>Genero</th>
                <th>Nacionalidad</th>
                <th>Vinculo</th>
                <th>Nivel Educativo</th>
                <th>Ocupacion</th>
                <th>Programa Social</th>
                <th>Obra Social</th>
                <th>Enfermedades Cronicas</th>
                <th>Ultimo Control</th>
                <!-- Agrega aquí los encabezados para los demás campos -->
            </tr>
        </thead>
        <tbody>
            @foreach($encuesta->integrantes as $integrante)
                <tr>
                    <td>{{ $integrante->apellido }}</td>
                    <td>{{ $integrante->nombre }}</td>
                    <td>{{ $integrante->fechaNac }}</td>
                    <td>{{ $integrante->estadoDni }}</td>
                    <td>{{ $integrante->genero }}</td>
                    <td>{{ $integrante->nacionalidad }}</td>
                    <td>{{ $integrante->vinculo }}</td>
                    <td>{{ $integrante->nivelEduc }}</td>
                    <td>{{ $integrante->ocupacion }}</td>
                    <td>{{ $integrante->progSocial }}</td>
                    <td>{{ $integrante->obraSocial }}</td>
                    <td>{{ $integrante->enfermedadesCronicas }}</td>
                    <td>{{ $integrante->ultimoControl }}</td>
                    <!-- Agrega aquí las celdas para los demás campos -->
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection