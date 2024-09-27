@extends('master')

@section('head')
<style>
    .table-responsive-custom {
        display: block;
    }

    @media (max-width: 767px) {
        .table-responsive-custom {
            overflow-x: auto;
        }

        .table-responsive-custom th,
        .table-responsive-custom td {
            white-space: nowrap;
        }
    }

    @media (min-width: 768px) {
        .table-responsive-custom {
            display: table;
        }
    }

    .btn-group-custom {
        display: flex;
        flex-direction: row;
        overflow-x: auto;
    }

    .btn-group-custom .btn {
        flex-shrink: 0;
    }
</style>
@endsection

@section('body')

<div class="container">

    <h1 class="text-center">Encuesta Completa</h1>
    <br>

    <a href="{{ route('encuesta.index') }}" class="btn btn-secondary mb-2 mb-md-0"><i class="bi bi-arrow-left-short"></i> Volver</a>
    <br>
    <br>

    @if($encuesta)
            <div class="section-title">
            <h2>Información general de la encuesta</h2>
            </div>
            <div class="table-responsive table-responsive-custom">
            <table class="table table-hover table-bordered table-light">
            <tbody>

                <tr>
                    <th>ID de Encuesta</th>
                    <td>{{ $encuesta->encuestaId }}</td>
                </tr>
                <tr>
                    <th>Domicilio de la Familia</th>
                    <td>{{ $encuesta->familia->domicilio }}</td>
                </tr>

                <tr>
                    <th>CAPS</th>
                    <td>{{ $encuesta->capId }}</td>
                </tr>
                <tr>
                    <th>Barrio</th>
                    <td>{{ $encuesta->familia && $encuesta->familia->barrio ? $encuesta->familia->barrio->nombreBarrio : 'No asignado' }}</td>
                </tr>

                </tbody>
                </table>
                </div>

                <div class="section-title">
                    <h2>Acceso a la salud</h2>
                </div>
                <div class="table-responsive table-responsive-custom">
                    <table class="table table-hover table-bordered table-light">
                <tbody>

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
                @if($encuesta->accSalud3_otro)
                <tr>
                    <th>Nombre del lugar:</th>
                    <td>{{ $encuesta->accSalud3_otro }}</td>
                </tr>
            @endif
                <tr>
                    <th>¿Cómo consiguen los turnos?</th>
                    <td>{{ $encuesta->accSalud4 }}</td>
                </tr>
                @if($encuesta->accSalud4_otro)
                <tr>
                    <th>¿De qué otra forma los consiguen?</th>
                    <td>{{ $encuesta->accSalud4_otro }}</td>
                </tr>
                @endif
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
                    <th>¿Cómo la toma?</th>
                    <td>{{ $encuesta->accSalud9 }}</td>
                </tr>
                @if($encuesta->accSalud9_otro)
                <tr>
                    <th>¿Toma la medicación acorde a la indicación médica?</th>
                    <td>{{ $encuesta->accSalud9_otro }}</td>
                </tr>
                @endif

                </tbody>
                </table>
                </div>
                <div class="section-title">
                    <h2>Acceso a servicios en salud mental</h2>
                </div>
                <div class="table-responsive table-responsive-custom">
                    <table class="table table-hover table-bordered table-light">
                        <tbody>

                <tr>
                    <th>¿Alguien en el grupo familiar recibe tratamiento en Salud Mental (Psicológico y/o Psiquiátrico)?</th>
                    <td>{{ $encuesta->accMental1 }}</td>
                </tr>
                <tr>
                    <th>¿Alguien en su familia lo necesitó y no lo obtuvo?</th>
                    <td>{{ $encuesta->accMental2 }}</td>
                </tr>

                </tbody>
                </table>
                </div>

                <div class="section-title">
                    <h2>Problemas sociales y de salud</h2>
                </div>
                <div class="table-responsive table-responsive-custom">
                <table class="table table-hover table-bordered table-light">
                <tbody>

                <tr>
                    <th>De la siguiente lista de problemas sociales y de salud ¿cuáles son los 3 principales que identifica en el barrio?</th>
                    <td>{{ $encuesta->prSoysa }}</td>
                </tr>
                @if($encuesta->prSoysa_otro)
                <tr>
                    <th>Especificar otros problemas</th>
                    <td>{{ $encuesta->prSoysa_otro }}</td>

                </tr>
                @endif

                </tbody>
                </table>
                </div>
                <div class="section-title">
                    <h2>Alimentación</h2>
                </div>
                <div class="table-responsive table-responsive-custom">
                <table class="table table-hover table-bordered table-light">
                <tbody>

                <tr>
                    <th>¿Recibe asistencia alimentaria?</th>
                    <td>{{ $encuesta->alimantacion1 }}</td>
                </tr>
                @if($encuesta->alimentacion2)
                <tr>
                    <th>¿De qué tipo? (se puede responder más de una)</th>
                    <td>{{ $encuesta->alimentacion2 }}</td>
                </tr>
                @endif
                <tr>
                    <th>¿Tiene huerta en su casa?</th>
                    <td>{{ $encuesta->alimentacion3 }}</td>
                </tr>
                <tr>
                    <th>¿Cría de animales para consumo? </th>
                    <td>{{ $encuesta->alimentacion4 }}</td>
                </tr>

                </tbody>
                </table>
                </div>
                <div class="section-title">
                <h2>Participación social</h2>
                </div>
                <div class="table-responsive table-responsive-custom">
                <table class="table table-hover table-bordered table-light">
                <tbody>

                <tr>
                    <th>¿Participa en alguna institución/organización?</th>
                    <td>{{ $encuesta->partSocial }}</td>
                </tr>

                </tbody>
                </table>
                </div>
                <div class="section-title">
                    <h2>Vivienda</h2>
                </div>
                <div class="table-responsive table-responsive-custom">
                <table class="table table-hover table-bordered table-light">
                <tbody>

                <tr>
                    <th>Carácter de la vivienda / lote</th>
                    <td>{{ $encuesta->vivienda1 }}</td>
                </tr>
                <tr>
                    <th>Materiales que predominan en la vivienda</th>
                    <td>{{ $encuesta->vivienda2 }}</td>
                </tr>
                @if($encuesta->vivienda2_otro)
                <tr>
                    <th>Especificar:</th>
                    <td>{{ $encuesta->vivienda2_otro }}</td>
                </tr>
                @endif
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

                </tbody>
                </table>
                </div>
                <div class="section-title">
                <h2>Acceso a servicios básicos</h2>
                </div>
                <div class="table-responsive table-responsive-custom">
                <table class="table table-hover table-bordered table-light">
                <tbody>

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

                </tbody>
            </table>
        </div>

        <br><br>
        <h2 class="text-center">Integrantes</h2>

        <div class="table-responsive table-responsive-custom">
            <table class="table table-hover table-bordered table-light">
                <thead>
                    <tr>
                        @php
                            // Array de encabezados y valores
                            $headers = [
                                'Apellido' => 'apellido',
                                'Nombre' => 'nombre',
                                'Fecha de Nacimiento' => 'fechaNac',
                                'Estado DNI' => 'estadoDni',
                                'Genero' => 'genero',
                                'Nacionalidad' => 'nacionalidad',
                                'Especificar otra nacionalidad' => 'nacionalidad_otro',
                                'Vínculo' => 'vinculo',
                                'Especificar otro vínculo' => 'vinculo_otro',
                                'Gestante' => 'gestante',
                                'Meses de gestación' => 'gestacionMeses',
                                'Nivel Educativo' => 'nivelEduc',
                                'Ocupacion' => 'ocupacion',
                                'Programa Social' => 'progSocial',
                                'Especificar otro programa social' => 'progSocial_otro',
                                'Obra Social' => 'obraSocial',
                                'Enfermedades Cronicas' => 'enfermedadesCronicas',
                                'Número de Certificado Único de Discapacidad' => 'numCertificado',
                                'Ultimo Control' => 'ultimoControl',
                                'Edad' => 'edad'
                            ];
                            
                            // Filtramos los encabezados que tienen datos no nulos, asegurando que "Edad" siempre esté
                            $filteredHeaders = collect($headers)->filter(function($field) use ($edad) {
                                return $field === 'edad' || $edad->contains($field, '!=', null);
                            });
                        @endphp
        
                        @foreach($filteredHeaders as $header => $field)
                            <th>{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($edad as $integrante)
                        <tr>
                            @foreach($filteredHeaders as $header => $field)
                                <td>{{ !is_null($integrante->$field) ? $integrante->$field : '-' }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        
        
    @else
        <p>Encuesta no encontrada.</p>
    @endif
</div>


@endsection