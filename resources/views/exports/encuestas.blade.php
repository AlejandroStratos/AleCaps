<div class="table-responsive table-responsive-custom">
    <table class="table table-hover table-bordered table-light">
        <thead>
            <tr>
                <th>ID de Encuesta</th>
                <th>Domicilio de la Familia</th>
                <th>Acceso a la atención en salud</th>
                <th>Controles preventivos de salud</th>
                <th>Ante algún problema de Salud ¿A dónde concurren?</th>
                <th>Nombre del lugar</th>
                <th>¿Cómo los consiguen?</th>
                <th>¿De qué otra forma los consiguen?</th>
                <th>Tiempo de espera de los turnos</th>
                <th>¿Tiene indicada medicación?</th>
                <th>¿Tiene acceso a la medicación?</th>
                <th>¿Cómo la consigue?</th>
                <th>¿Toma la medicación acorde a la indicación médica?</th>
                <th>¿Cómo la toma?</th>
                <th>Salud Mental</th>
                <th>Necesidad no obtenida</th>
                <th>Problemas sociales en el barrio</th>
                <th>Asistencia alimentaria</th>
                <th>Tipo de asistencia</th>
                <th>Huerta en casa</th>
                <th>Cría de animales</th>
                <th>Participación en instituciones</th>
                <th>Carácter de la vivienda</th>
                <th>Materiales predominantes en la vivienda</th>
                <th>Especificar materiales</th>
                <th>Materiales en el piso</th>
                <th>Revestimiento interior del techo</th>
                <th>Habitaciones para dormir</th>
                <th>Baño/letrina ubicación</th>
                <th>Desagüe del inodoro</th>
                <th>Tiene agua</th>
                <th>Para cocinar utiliza</th>
                <th>El agua proviene de</th>
                <th>Para calefaccionarse utiliza</th>
                <th>CAPS</th>
                <th>Barrio</th>

                <!-- Integrantes -->
                <th>Apellido Integrante</th>
                <th>Nombre Integrante</th>
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
                <th>Edad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($encuestas as $encuesta)
                <tr>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->encuestaId }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->familia->domicilio }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accSalud1 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accSalud2 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accSalud3 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accSalud3_otro }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accSalud4 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accSalud4_otro }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accSalud5 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accSalud6 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accSalud7 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accSalud8 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accSalud9 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accSalud9_otro }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accMental1 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accMental2 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->prSoysa }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->alimantacion1 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->alimentacion2 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->alimentacion3 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->alimentacion4 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->partSocial }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->vivienda1 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->vivienda2 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->vivienda2_otro }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->vivienda3 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->vivienda4 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->vivienda5 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->vivienda6 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->vivienda7 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accBas1 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accBas2 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accBas3 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->accBas4 }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->capId }}</td>
                    <td rowspan="{{ $encuesta->integrantes->count() }}">{{ $encuesta->familia && $encuesta->familia->barrio ? $encuesta->familia->barrio->nombreBarrio : 'No asignado' }}</td>

                    <!-- La primera fila muestra los datos del primer integrante -->
                    <td>{{ $encuesta->integrantes->first()->apellido }}</td>
                    <td>{{ $encuesta->integrantes->first()->nombre }}</td>
                    <td>{{ $encuesta->integrantes->first()->fechaNac }}</td>
                    <td>{{ $encuesta->integrantes->first()->estadoDni }}</td>
                    <td>{{ $encuesta->integrantes->first()->genero }}</td>
                    <td>{{ $encuesta->integrantes->first()->nacionalidad }}</td>
                    <td>{{ $encuesta->integrantes->first()->vinculo }}</td>
                    <td>{{ $encuesta->integrantes->first()->nivelEduc }}</td>
                    <td>{{ $encuesta->integrantes->first()->ocupacion }}</td>
                    <td>{{ $encuesta->integrantes->first()->progSocial }}</td>
                    <td>{{ $encuesta->integrantes->first()->obraSocial }}</td>
                    <td>{{ $encuesta->integrantes->first()->enfermedadesCronicas }}</td>
                    <td>{{ $encuesta->integrantes->first()->ultimoControl }}</td>
                    <td>{{ $encuesta->integrantes->first()->edad }}</td>
                </tr>

                <!-- Las filas adicionales muestran los datos de los otros integrantes, si los hay -->
                @foreach($encuesta->integrantes->slice(1) as $integrante)
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
                    <td>{{ $integrante->edad }}</td>
                </tr>
                @endforeach

            @endforeach
        </tbody>
    </table>
</div>