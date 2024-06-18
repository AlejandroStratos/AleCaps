
@extends('master') <!-- Extiende la vista maestra -->

@section('head')

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <style>
        .btn-custom {
            background-color: #5451EF;
            color: #FFFFFF;
            border-radius: 40px;
        }
        </style>

@endsection

@section('body')

        <h1 class="text-center">INGRESAR INTEGRANTES</h1>
        <div class="container text-center">
             <!-- Mensajes de éxito y error -->
             @if (session('success'))
             <div class="alert alert-success">
                 {{ session('success') }}
             </div>
            @endif

            @if (session('error'))
             <div class="alert alert-danger">
                 {{ session('error') }}
             </div>
            @endif

                <form action="{{ route('integrante.store') }}" method="POST">
                @csrf
                <input type="hidden" name="famId" value="{{ $famId }}">

                <div id="integrantes-container">

                <div class="integrante">
                <label>Apellido</label>
                <input type="text" name="integrantes[apellido][]" required>
                <label>Nombre</label>
                <input type="text" name="integrantes[nombre][]" required>
                <br>
                <label>Fecha de nacimiento</label>
                <input type="date" name="integrantes[fechaNac][]" required>

                <br>

                <label>Estado Dni</label>
                <select name="integrantes[estadoDni][]" required>
                        <option value="">Seleccionar</option>
                        <option value="Actualizado">Actualizado</option>
                        <option value="Requiero Actualización">Requiero Actualización</option>
                        <option value="Nunca lo tramitó/indocumentado/a">Nunca lo tramitó/indocumentado/a</option>
                        <option value="Residencia precaria">Residencia precaria</option>
                        <option value="Radicación">Radicación</option>
                        <option value="Documentación extranjera">'Documentación extranjera' </option>
                </select>

                <br>

                <label>Género</label>
                <select name="integrantes[genero][]" required>
                        <option value="">Seleccionar</option>
                        <option value=" Mujer">Mujer</option>
                        <option value="Mujer trans/travesti">Mujer trans/travesti</option>
                        <option value="Varón">Varón</option>
                        <option value="Varón trans/masculinidad trans">Varón trans/masculinidad trans</option>
                        <option value="No binario">No binario</option>

                </select>

                <br>

                <label>Nacionalidad</label>
                <select name="integrantes[nacionalidad][]" required>
                        <option value="">Seleccionar</option>
                        <option value="Argentino">Argentino</option>
                        <option value="Paraguayo">Paraguayo</option>
                        <option value="Boliviano">Boliviano</option>
                        <option value="Uruguayo">Uruguayo</option>
                        <option value="Brasilero">Brasilero</option>
                        <option value="Chileno">Chileno</option>
                        <option value="Peruano">Peruano</option>
                        <option value="Otro">Otro</option>
                </select>

                <br>

                <label>Vínculo</label>
                <select name="integrantes[vinculo][]" required>
                        <option value="">Seleccionar</option>
                        <option value="Esposo/a">Esposo/a</option>
                        <option value="Concubino/a">Concubino/a</option>
                        <option value="Hijo/a">Hijo/a</option>
                        <option value="Padre">Padre</option>
                        <option value="Madre">Madre</option>
                        <option value="Abuelo/a">Abuelo/a</option>
                        <option value="Nieto/a">Nieto/a</option>
                        <option value="Tío/a">Tío/a</option>
                        <option value="Sobrino/a">Sobrino/a</option>
                        <option value="Suegro/a">Suegro/a</option>
                        <option value="Cuñado/a">Cuñado/a</option>
                        <option value="Unión civil">Unión civil</option>
                        <option value="Unión de hecho">Unión de hecho</option>
                        <option value="Otro">Otro</option>
                </select>

                <br>

                <label>Nivel Educativo</label>
                <select name="integrantes[nivelEduc][]" required>
                        <option value="">Seleccionar</option>
                        <option value="Ninguno por edad">Ninguno por edad</option>
                        <option value="Primaria incompleta">Primaria incompleta</option>
                        <option value="Primaria completa">Primaria completa</option>
                        <option value="Secundaria incompleta">Secundaria incompleta</option>
                        <option value="Secundaria completa">Secundaria completa</option>
                        <option value="Terciario completo">Terciario completo</option>
                        <option value="Universitario completo">Universitario completo</option>
                        <option value="Analfabeto: no lee ni escribe">Analfabeto: no lee ni escribe</option>
                        <option value="No sabe/no contesta">No sabe/no contesta</option>
                        <option value="Cursando primaria"> Cursando primaria</option>
                        <option value="Cursando secundaria">Cursando secundaria</option>
                        <option value="Cursando terciaria">Cursando terciaria</option>
                        <option value="Cursando universidad">Cursando universidad</option>
                        <option value="Cursando inicial">Cursando inicial</option>
                </select>

                <br>

                <label>Ocupación</label>
                <select name="integrantes[ocupacion][]" required>
                        <option value="">Seleccionar</option>
                        <option value="Ninguno">Ninguno</option>
                        <option value="Empleado dependencia">Empleado dependencia</option>
                        <option value="Changas, temporario">Changas, temporario</option>
                        <option value="Cuentapropista, monotrib">Cuentapropista, monotrib</option>
                        <option value="Desocupado">Desocupado</option>
                        <option value="Jubilado/pensionado">Jubilado/pensionado</option>
                        <option value="Beneficio plan social">Beneficio plan social</option>
                        <option value="No sabe, no contesta">No sabe, no contesta</option>
                </select>

                <br>

                <label>Programa social</label>
                <select name="integrantes[progSocial][]" required>
                        <option value="">Seleccionar</option>
                        <option value="AUH">AUH</option>
                        <option value="Potenciar trabajo">Potenciar trabajo</option>
                        <option value="Becas progresar">Becas progresar</option>
                        <option value="Acompañar">Acompañar</option>
                        <option value="Otros">Otros</option>
                </select>

                <br>

                <label>Obra social</label>
                <select name="integrantes[obraSocial][]" required>
                        <option value="">Seleccionar</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                </select>

                <br>

                <br>
                <label>Enfermedades Crónicas</label><br>

                <input type="checkbox" name="integrantes[Cardiovasculares][]" value="Cardiovasculares"> Cardiovasculares<br>
                <input type="checkbox" name="integrantes[Respiratorios][]" value="Respiratorios"> Respiratorios<br>
                <input type="checkbox" name="integrantes[En la piel][]" value="En la piel"> En la piel<br>
                <input type="checkbox" name="integrantes[En la vista][]" value="En la vista"> En la vista<br>
                <input type="checkbox" name="integrantes[Gástricos][]" value="Gástricos"> Gástricos<br>
                <input type="checkbox" name="integrantes[Ginecológicos][]" value="Ginecológicos"> Ginecológicos<br>
                <input type="checkbox" name="integrantes[Alergias][]" value="Alergias"> Alergias<br>
                <input type="checkbox" name="integrantes[En los huesos/articulaciones][]" value="En los huesos/articulaciones"> En los huesos/articulaciones<br>
                <input type="checkbox" name="integrantes[Salud mental][]" value="Salud mental"> Salud mental<br>
                <input type="checkbox" name="integrantes[Situaciones de violencia][]" value="Situaciones de violencia"> Situaciones de violencia<br>
                <input type="checkbox" name="integrantes[Consumo problemático de sustancias][]" value="Consumo problemático de sustancias"> Consumo problemático de sustancias<br>
                <input type="checkbox" name="integrantes[Diabetes][]" value="Diabetes"> Diabetes<br>
                <input type="checkbox" name="integrantes[Hipertensión][]" value="Hipertensión"> Hipertensión<br>
                <input type="checkbox" name="integrantes[Problemas de tiroides][]" value="Problemas de tiroides"> Problemas de tiroides<br>
                <input type="checkbox" name="integrantes[Odontológicos][]" value="Odontológicos"> Odontológicos<br>
                <input type="checkbox" name="integrantes[Cáncer][]" value="Cáncer"> Cáncer<br>
                <input type="checkbox" name="integrantes[Infecciones de transmisión sexual][]" value="Infecciones de transmisión sexual"> Infecciones de transmisión sexual<br>
                <input type="checkbox" name="integrantes[Discapacidad ¿tiene certificado único de discapacidad?][]" value="Discapacidad ¿tiene certificado único de discapacidad?"> Discapacidad ¿tiene certificado único de discapacidad?<br>
                <br>


                <br>
                <label>Último control</label>
                <input type="date" name="integrantes[ultimoControl][]" required>
                <br>

                </div>
        </div>

        <button type="button" id="agregar-integrante" class="btn btn-custom">Agregar Integrante</button>
        <button type="submit" class="btn btn-custom">Guardar Integrantes</button>
        </form>
     </div>

    <script>
        $(document).ready(function() {
            var i = 0;
            $("#agregar-integrante").click(function() {
                ++i;
                var $integranteClonado = $(".integrante").first().clone();
                $integranteClonado.find("input").each(function() {
                    var name = $(this).attr("name").replace("[]", "[" + i + "]");
                    $(this).attr("name", name).val("");
                });
                $("#integrantes-container").append($integranteClonado);
            });
        });
    </script>

@endsection






