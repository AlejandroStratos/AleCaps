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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Formulario de Encuesta</h1>
                <form action="{{ route('encuesta.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="famId" value="{{ $famId }}">

                    <!-- Agrega tus preguntas y selectores aquí -->
                    <div class="form-group">
                        <label for="accSalud1">¿Cómo considera que es el acceso a la atención en salud suyo y/o de su familia?</label>
                        <select name="accSalud1" id="accSalud1" class="form-control" required>
                            <option value="">Seleccionar</option>
                            <option value="Bueno">Bueno</option>
                            <option value="Regular">Regular</option>
                            <option value="Malo">Malo</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="accSalud2">¿Usted y/o su familia realizan controles preventivos de salud??</label>
                        <select name="accSalud2" id="accSalud2" class="form-control" required>
                                <option value="">Seleccionar</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                                <option value="Solo niños/niñas">Solo niños/niñas</option>
                        </select>

                    <div class="form-group">
                        <label for="accSalud3">Ante algún problema de Salud ¿A dónde concurren?</label>
                        <select name="accSalud3" id="accSalud3" class="form-control" required>
                                <option value="">Seleccionar</option>
                                <option value="Hospital público › ¿Cuál?">Hospital público › ¿Cuál?"</option>
                                <option value="Centro de salud > ¿ Cual?">Centro de salud > ¿ Cual?</option>
                                <option value="Clínica/consultorio privado">Clínica/consultorio privado</option>
                                <option value="Posta/operativo de salud">Posta/operativo de salud</option>
                                <option value="Medicina alternativa (curandero)">Medicina alternativa (curandero)</option>
                                <option value="Otros">Otros</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="accSalud4">¿Cómo los consiguen?</label>
                        <select name="accSalud4" id="accSalud4" class="form-control" required>
                                <option value="">Seleccionar</option>
                                <option value="Telefónicamente">Telefónicamente</option>
                                <option value="Personalmente">Personalmente</option>
                                <option value="Internet">Internet</option>
                                <option value="Por medio de la promotora de salud">Por medio de la promotora de salud</option>
                                <option value="Salita">Salita</option>
                                <option value="Otro, Cual?">Otro, Cual?</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="accSalud5">¿Cuál es el tiempo de espera de los turnos?</label>
                        <select name="accSalud5" id="accSalud5" class="form-control" required>
                                <option value="">Seleccionar</option>
                                <option value="Más de 1 semana">Más de 1 semana</option>
                                <option value="Un mes">Un mes</option>
                                <option value="Más de 3 meses">Más de 3 meses</option>
                                <option value="no">no</option>
                                <option value="no">no</option>
                                <option value="no">no</option>                        </select>
                    </div>


                    <div class="form-group">
                        <label for="accSalud6">¿Tiene indicada medicación?</label>
                        <select name="accSalud6" id="accSalud6" class="form-control" required>
                                <option value="">Seleccionar</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                                <option value="No sabe">No sabe</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="accSalud7">¿Tiene acceso a la medicación?</label>
                        <select name="accSalud7" id="accSalud7" class="form-control" required>
                                <option value="">Seleccionar</option>
                                <option value="Si, regularmente">Si, regularmente</option>
                                <option value="Si, pero no regularmente">Si, pero no regularmente</option>
                                <option value="No tiene acceso">No tiene acceso</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="accSalud8">¿Cómo la consigue?</label>
                        <select name="accSalud8" id="accSalud8" class="form-control" required>
                                <option value="">Seleccionar</option>
                                <option value="Hospital">Hospital</option>
                                <option value="Centro de salud">Centro de salud</option>
                                <option value="Posta/ operativo de salud">Posta/ operativo de salud</option>
                                <option value="Los compra">Los compra</option>
                                <option value="Obra social">Obra social</option>
                        </select>
                    </div>

        <div class="form-group">
        <label for="accSalud9">¿Toma la medicación acorde a la indicación médica?</label>
        <select name="accSalud9" id="accSalud9" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No > ¿cómo la toma?">No > ¿cómo la toma?</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accMental1">¿Alguien en el grupo familiar recibe tratamiento en Salud Mental (Psicológico y/o Psiquiátrico)?</label>
        <select name="accMental1" id="accMental1" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accMental2">¿Alguien en su familia lo necesitó y no lo obtuvo?</label>
        <select name="accMental2" id="accMental2" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
        </select>
        </div>

        <div class="form-group">
        <label for="prSoysa">De la siguiente lista de problemas sociales y de salud ¿cuáles son los 3 principales que identifica en el barrio?</label>
        <select name="prSoysa" id="prSoysa" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Personas en situación de calle">Personas en situación de calle</option>
                <option value="Consumo problemático">Consumo problemático</option>
                <option value="No finalizar la escuela secundaria">No finalizar la escuela secundaria</option>
                <option value="Situaciones de violencias">Situaciones de violencias</option>
                <option value="Inseguridad">Inseguridad</option>
                <option value="Desacupación">Desacupación</option>
                <option value="Problemas en el acceso a la salud">Problemas en el acceso a la salud</option>
                <option value="Suicidios/ Autolesión">Suicidios/ Autolesión</option>
                <option value="Embarazos no deseados">Embarazos no deseados</option>
                <option value="Desaparición de personas">Desaparición de personas</option>
                <option value="Venta de sustancias">Venta de sustancias</option>
                <option value="Otros">Otros</option>

        </select>
        </div>

        <div class="form-group">
        <label for="alimantacion1">¿Recibe asistencia alimentaria?</label>
        <select name="alimantacion1" id="alimantacion1" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
        </select>
        </div>

        <div class="form-group">
        <label for="alimentacion2">¿De qué tipo? (se puede responder más de una)</label>
        <select name="alimentacion2" id="alimentacion2" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Comida elaborada/vianda">Comida elaborada/vianda</option>
                <option value="Bolsón de alimentos">Bolsón de alimentos</option>
                <option value="Dinero">Dinero</option>
        </select>
        </div>

        <div class="form-group">
        <label for="alimentacion3">¿Tiene huerta en su casa?</label>
        <select name="alimentacion3" id="alimentacion3" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
        </select>
        </div>

        <div class="form-group">
        <label for="alimentacion4">¿Cría de animales para consumo?</label>
        <select name="alimentacion4" id="alimentacion4" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
        </select>
        </div>

        <div class="form-group">
        <label for="partSocial">¿Participa en alguna institución/organización?</label>
        <select name="partSocial" id="partSocial" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
        </select>
        </div>

        <div class="form-group">
        <label for="vivienda1">Carácter de la vivienda/lote</label>
        <select name="vivienda1" id="vivienda1" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Propia">Propia</option>
                <option value="Préstamo">Préstamo</option>
                <option value="Alquiler">Alquiler</option>
                <option value="Fiscal">Fiscal</option>
        </select>
        </div>

<form method="post" action="guardar_datos.php">
        <div class="form-group">
        <label for="vivienda2">Materiales que predominan en la vivienda</label>
        <select name="vivienda2" id="vivienda2" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Material, ladrillo">Material, ladrillo</option>
                <option value="Madera">Madera</option>
                <option value="Chapa">Chapa</option>
                <option value="Mixto">Mixto</option>
                <option value="Otros">Otros</option>
        </select>
        </div>

        <div class="form-group" id="otrosField" style="display:none;">
                <label for="otroscampos">Especificar otros materiales</label>
                <input type="text" name="otroscampos" id="otroscampos" class="form-control">
        </div>
</form>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#vivienda2').on('change', function() {
                        if (this.value === 'Otros') {
                            $('#otrosField').show();
                        } else {
                            $('#otrosField').hide();
                        }
                    });
                });
            </script>

        <div class="form-group">
        <label for="vivienda3">Materiales predominantes en el piso</label>
        <select name="vivienda3" id="vivienda3" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Cerámico (revestimiento)">Cerámico (revestimiento)</option>
                <option value="Cemento">Cemento</option>
                <option value="Tierra">Tierra</option>
                <option value="Mixto">Mixto</option>
        </select>
        </div>

        <div class="form-group">
        <label for="vivienda4">El techo ¿tiene revestimiento interior o cielorraso?</label>
        <select name="vivienda4" id="vivienda4" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
                <option value="No sabe">No sabe</option>
        </select>
        </div>

        <div class="form-group">
        <label for="vivienda5">¿Cuántas habitaciones o piezas para dormir tiene este hogar?</label>
        <select name="vivienda5" id="vivienda5" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Ninguna">Ninguna</option>
                <option value="Una">Una</option>
                <option value="Dos">Dos</option>
                <option value="Tres o más">Tres o más</option>
        </select>
        </div>

        <div class="form-group">
        <label for="vivienda6">El baño/letrina se encuentra:</label>
        <select name="vivienda6" id="vivienda6" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="Dentro de la vivienda">Dentro de la vivienda</option>
                <option value="Fuera de la vivienda, pero dentro del terreno">Fuera de la vivienda, pero dentro del terreno</option>
                <option value="No tiene">No tiene</option>
        </select>
        </div>

        <div class="form-group">
        <label for="vivienda7">El desagüe del inodoro es:</label>
        <select name="vivienda7" id="vivienda7" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="A cámara séptica y pozo ciego">A cámara séptica y pozo ciego</option>
                <option value="Sólo a pozo ciego">Sólo a pozo ciego</option>
                <option value="A hoyo, excavación en la tierra, etc.">A hoyo, excavación en la tierra, etc.</option>

        </select>
        </div>

        <div class="form-group">
        <label for="accBas1">Tiene agua...</label>
        <select name="accBas1" id="accBas1" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="por cañería dentro de la vivienda">por cañería dentro de la vivienda</option>
                <option value="fuera de la vivienda pero dentro del terreno">fuera de la vivienda pero dentro del terreno</option>
                <option value="fuera del terreno">fuera del terreno</option>

        </select>
        </div>

        <div class="form-group">
        <label for="accBas2">Para cocinar utiliza…</label>
        <select name="accBas2" id="accBas2" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="gas de red">gas de red</option>
                <option value="gas envasado (tubo/garrafa)">gas envasado (tubo/garrafa)</option>
                <option value="artefacto eléctrico">artefacto eléctrico</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accBas3">El agua que usa, proviene de...</label>
        <select name="accBas3" id="accBas3" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="red pública">red pública</option>
                <option value="perforación con bomba a motor">perforación con bomba a motor</option>
                <option value="perforación con bomba manual">perforación con bomba manual</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accBas4">Para calefaccionarse utiliza…</label>
        <select name="accBas4" id="accBas4" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="gas de red">gas de red</option>
                <option value="gas envasado (tubo/garrafa)">gas envasado (tubo/garrafa)</option>
                <option value="artefacto eléctrico">artefacto eléctrico</option>
                <option value="leña">leña</option>
        </select>
        </div>

                    <div class="form-group">
                        <label for="capId">CAP ID</label>
                        <select name="capId" id="capId" class="form-control" required>
                                <option value="">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>

                        </select>
                    </div>

                    {{-- BARRIO--------------------------------------------------------------- --}}
                    <div class="form-group">
                        <label for="barrioId">Barrio</label>
                        <select name="barrioId" id="barrioId" class="form-control" required>
                            <option value="">Seleccionar</option>
                            <!-- Los barrios se cargarán aquí mediante AJAX -->
                        </select>
                    </div>
                    
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('#capId').on('change', function() {
                                var capId = $(this).val();
                                if (capId) {
                                    $.ajax({
                                        url: '/barrios/' + capId,
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(data) {
                                            $('#barrioId').empty();
                                            $('#barrioId').append('<option value="">Seleccionar</option>');
                                            $.each(data, function(key, value) {
                                                $('#barrioId').append('<option value="' + key + '">' + value + '</option>');
                                            });
                                        }
                                    });
                                } else {
                                    $('#barrioId').empty();
                                    $('#barrioId').append('<option value="">Seleccionar</option>');
                                }
                            });
                        });
                    </script>
                    {{-- BARRIO--------------------------------------------------------------- --}}

                    <button type="submit" class="btn btn-custom btn-block">Guardar Encuesta</button>
                </form>
            </div>
        </div>
    </div>


@endsection




{{-- @extends('master') <!-- Extiende la vista maestra -->


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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Formulario de Encuesta</h1>
                <form action="{{ route('encuesta.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="famId" value="{{ $famId }}">

                    <!-- Agrega tus preguntas y selectores aquí -->
                    <div class="form-group">
                        <label for="accSalud1">Tenes baño?</label>
                        <select name="accSalud1" id="accSalud1" class="form-control">
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="accSalud2">Tenes patio?</label>
                        <select name="accSalud2" id="accSalud2" class="form-control">
                                <option value="si">si</option>
                                <option value="no">no</option>
                        </select>

                    <div class="form-group">
                        <label for="accSalud3">Tenes patio?</label>
                        <select name="accSalud3" id="accSalud3" class="form-control">
                                <option value="si">si</option>
                                <option value="no">no</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="accSalud4">Tenes patio?</label>
                        <select name="accSalud4" id="accSalud4" class="form-control">
                                <option value="si">si</option>
                                <option value="no">no</option>
                        </select>
                    </div>

        <div class="form-group">
        <label for="accSalud5">Tenes patio?</label>
        <select name="accSalud5" id="accSalud5" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accSalud6">Tenes patio?</label>
        <select name="accSalud6" id="accSalud6" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accSalud7">Tenes patio?</label>
        <select name="accSalud7" id="accSalud7" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accSalud8">Tenes patio?</label>
        <select name="accSalud8" id="accSalud8" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accSalud9">Tenes patio?</label>
        <select name="accSalud9" id="accSalud9" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accMental1">Tenes patio?</label>
        <select name="accMental1" id="accMental1" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accMental2">Tenes patio?</label>
        <select name="accMental2" id="accMental2" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="prSoysa">Tenes patio?</label>
        <select name="prSoysa" id="prSoysa" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="alimantacion1">Tenes patio?</label>
        <select name="alimantacion1" id="alimantacion1" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="alimentacion2">Tenes patio?</label>
        <select name="alimentacion2" id="alimentacion2" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="alimentacion3">Tenes patio?</label>
        <select name="alimentacion3" id="alimentacion3" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="alimentacion4">Tenes patio?</label>
        <select name="alimentacion4" id="alimentacion4" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="partSocial">Tenes patio?</label>
        <select name="partSocial" id="partSocial" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="vivienda1">Tenes patio?</label>
        <select name="vivienda1" id="vivienda1" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="vivienda2">Tenes patio?</label>
        <select name="vivienda2" id="vivienda2" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="vivienda3">Tenes patio?</label>
        <select name="vivienda3" id="vivienda3" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="vivienda4">Tenes patio?</label>
        <select name="vivienda4" id="vivienda4" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="vivienda5">Tenes patio?</label>
        <select name="vivienda5" id="vivienda5" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="vivienda6">Tenes patio?</label>
        <select name="vivienda6" id="vivienda6" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="vivienda7">Tenes patio?</label>
        <select name="vivienda7" id="vivienda7" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accBas1">Tenes patio?</label>
        <select name="accBas1" id="accBas1" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accBas2">Tenes patio?</label>
        <select name="accBas2" id="accBas2" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accBas3">Tenes patio?</label>
        <select name="accBas3" id="accBas3" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

        <div class="form-group">
        <label for="accBas4">Tenes patio?</label>
        <select name="accBas4" id="accBas4" class="form-control">
                <option value="si">si</option>
                <option value="no">no</option>
        </select>
        </div>

                    <div class="form-group">
                        <label for="capId">CAP ID</label>
                        <select name="capId" id="capId" class="form-control">
                            <option value="1">1</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-custom btn-block">Guardar Encuesta</button>
                </form>
            </div>
        </div>
    </div>


@endsection
 --}}


