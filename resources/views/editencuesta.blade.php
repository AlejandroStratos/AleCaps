@extends('master')

@section('head')

@endsection

@section('body')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Editar Encuesta</h1>
            <form action="{{ route('encuesta.update', ['encuestaId' => $encuesta->encuestaId]) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Aquí debes agregar los campos y selectores con los valores actuales de la encuesta -->

                <!-- Por ejemplo, para accSalud1 sería algo comoo -->

                <div class="form-group">
                    <label for="accSalud1">¿Cómo considera que es el acceso a la atención en salud suyo y/o de su familia?</label>
                    <select name="accSalud1" id="accSalud1" class="form-control" required>
                        <option value="" {{ $encuesta->accSalud1 === '' ? 'selected' : '' }}>Seleccionar</option>
                        <option value="Bueno" {{ $encuesta->accSalud1 === 'Bueno' ? 'selected' : '' }}>Bueno</option>
                        <option value="Regular" {{ $encuesta->accSalud1 === 'Regular' ? 'selected' : '' }}>Regular</option>
                        <option value="Malo" {{ $encuesta->accSalud1 === 'Malo' ? 'selected' : '' }}>Malo</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="accSalud2">¿Usted y/o su familia realizan controles preventivos de salud?</label>
                    <select name="accSalud2" id="accSalud2" class="form-control" required>
                        <option value="" {{ $encuesta->accSalud2 === '' ? 'selected' : '' }}>Seleccionar</option>
                        <option value="Si" {{ $encuesta->accSalud2 === 'Si' ? 'selected' : '' }}>Si</option>
                        <option value="No" {{ $encuesta->accSalud2 === 'No' ? 'selected' : '' }}>No</option>
                        <option value="Solo niños/niñas" {{ $encuesta->accSalud2 === 'Solo niños/niñas' ? 'selected' : '' }}>Solo niños/niñas</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="accSalud3">Ante algún problema de Salud ¿A dónde concurren?</label>
                    <select name="accSalud3" id="accSalud3" class="form-control" required>
                        <option value="" {{ $encuesta->accSalud3 === '' ? 'selected' : '' }}>Seleccionar</option>
                        <option value="Hospital publico › ¿Cual?" {{ $encuesta->accSalud3 === 'Hospital publico › ¿Cual?' ? 'selected' : '' }}>Hospital público › ¿Cuál?</option>
                        <option value="Centro de salud > ¿ Cual?" {{ $encuesta->accSalud3 === 'Centro de salud > ¿ Cual?' ? 'selected' : '' }}>Centro de salud > ¿Cuál?</option>
                        <option value="Clínica/consultorio privado" {{ $encuesta->accSalud3 === 'Clínica/consultorio privado' ? 'selected' : '' }}>Clínica/consultorio privado</option>
                        <option value="Posta/operativo de salud" {{ $encuesta->accSalud3 === 'Posta/operativo de salud' ? 'selected' : '' }}>Posta/operativo de salud</option>
                        <option value="Medicina alternativa (curandero)" {{ $encuesta->accSalud3 === 'Medicina alternativa (curandero)' ? 'selected' : '' }}>Medicina alternativa (curandero)</option>
                        <option value="Otros" {{ $encuesta->accSalud3 === 'Otros' ? 'selected' : '' }}>Otros</option>
                    </select>
                </div>
                
                <div id="accSalud3-textbox" class="form-group" style="display: none;">
                    <label for="accSalud3_otro">Nombre del lugar:</label>
                    <input type="text" name="accSalud3_otro" id="accSalud3_otro" class="form-control" value="{{ $encuesta->accSalud3_otro }}">
                </div>
                
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var accSalud3Select = document.getElementById('accSalud3');
                    var accSalud3Textbox = document.getElementById('accSalud3-textbox');
                
                    function toggleTextbox() {
                        var selectedOption = accSalud3Select.value;
                        if (selectedOption === 'Hospital publico › ¿Cual?' ||
                            selectedOption === 'Centro de salud > ¿ Cual?' ||
                            selectedOption === 'Otros') {
                            accSalud3Textbox.style.display = 'block';
                        } else {
                            accSalud3Textbox.style.display = 'none';
                        }
                    }
                
                    // Initialize visibility on page load
                    toggleTextbox();
                
                    // Update visibility on change
                    accSalud3Select.addEventListener('change', toggleTextbox);
                });
                </script>
                
                
                <div class="form-group">
                    <label for="accSalud4">¿Cómo los consiguen?</label>
                    <select name="accSalud4" id="accSalud4" class="form-control" required>
                        <option value="" {{ $encuesta->accSalud4 === '' ? 'selected' : '' }}>Seleccionar</option>
                        <option value="Telefónicamente" {{ $encuesta->accSalud4 === 'Telefónicamente' ? 'selected' : '' }}>Telefónicamente</option>
                        <option value="Personalmente" {{ $encuesta->accSalud4 === 'Personalmente' ? 'selected' : '' }}>Personalmente</option>
                        <option value="Internet" {{ $encuesta->accSalud4 === 'Internet' ? 'selected' : '' }}>Internet</option>
                        <option value="Por medio de la promotora de salud" {{ $encuesta->accSalud4 === 'Por medio de la promotora de salud' ? 'selected' : '' }}>Por medio de la promotora de salud</option>
                        <option value="Salita" {{ $encuesta->accSalud4 === 'Salita' ? 'selected' : '' }}>Salita</option>
                        <option value="Otro, Cual?" {{ $encuesta->accSalud4 === 'Otro, Cual?' ? 'selected' : '' }}>Otro, Cual?</option>
                    </select>
                </div>
                

                <div id="accSalud4-textbox" class="form-group" style="display: none;">
                    <label for="accSalud4_otro">¿De qué otra forma los consiguen?</label>
                    <input type="text" name="accSalud4_otro" id="accSalud4_otro" class="form-control" value="{{ $encuesta->accSalud4_otro }}">
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var accSalud4Select = document.getElementById('accSalud4');
                        var accSalud4Textbox = document.getElementById('accSalud4-textbox');
                
                        function toggleTextbox() {
                            var selectedOption = accSalud4Select.value;
                            if (selectedOption === 'Otro, Cual?') {
                                accSalud4Textbox.style.display = 'block';
                            } else {
                                accSalud4Textbox.style.display = 'none';
                            }
                        }
                
                        // Initialize visibility on page load
                        toggleTextbox();
                
                        // Update visibility on change
                        accSalud4Select.addEventListener('change', toggleTextbox);
                    });
                </script>
                


                <div class="form-group">
                    <label for="accSalud5">¿Cuál es el tiempo de espera de los turnos?</label>
                    <select name="accSalud5" id="accSalud5" class="form-control" required>
                        <option value="" {{ $encuesta->accSalud5 === '' ? 'selected' : '' }}>Seleccionar</option>
                        <option value="Más de 1 semana" {{ $encuesta->accSalud5 === 'Más de 1 semana' ? 'selected' : '' }}>Más de 1 semana</option>
                        <option value="Un mes" {{ $encuesta->accSalud5 === 'Un mes' ? 'selected' : '' }}>Un mes</option>
                        <option value="Más de 3 meses" {{ $encuesta->accSalud5 === 'Más de 3 meses' ? 'selected' : '' }}>Más de 3 meses</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="accSalud6">¿Tiene indicada medicación?</label>
                    <select name="accSalud6" id="accSalud6" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="Si" {{ $encuesta->accSalud6 === 'Si' ? 'selected' : '' }}>Si</option>
                        <option value="No" {{ $encuesta->accSalud6 === 'No' ? 'selected' : '' }}>No</option>
                        <option value="No sabe" {{ $encuesta->accSalud6 === 'No sabe' ? 'selected' : '' }}>No sabe</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="accSalud7">¿Tiene acceso a la medicación?</label>
                    <select name="accSalud7" id="accSalud7" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="Si, regularmente" {{ $encuesta->accSalud7 === 'Si, regularmente' ? 'selected' : '' }}>Si, regularmente</option>
                        <option value="Si, pero no regularmente" {{ $encuesta->accSalud7 === 'Si, pero no regularmente' ? 'selected' : '' }}>Si, pero no regularmente</option>
                        <option value="No tiene acceso" {{ $encuesta->accSalud7 === 'No tiene acceso' ? 'selected' : '' }}>No tiene acceso</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="accSalud8">¿Cómo la consigue?</label>
                    <select name="accSalud8" id="accSalud8" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="Hospital" {{ $encuesta->accSalud8 === 'Hospital' ? 'selected' : '' }}>Hospital</option>
                        <option value="Centro de salud" {{ $encuesta->accSalud8 === 'Centro de salud' ? 'selected' : '' }}>Centro de salud</option>
                        <option value="Posta/ operativo de salud" {{ $encuesta->accSalud8 === 'Posta/ operativo de salud' ? 'selected' : '' }}>Posta/ operativo de salud</option>
                        <option value="Los compra" {{ $encuesta->accSalud8 === 'Los compra' ? 'selected' : '' }}>Los compra</option>
                        <option value="Obra social" {{ $encuesta->accSalud8 === 'Obra social' ? 'selected' : '' }}>Obra social</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="accSalud9">¿Toma la medicación acorde a la indicación médica?</label>
                    <select name="accSalud9" id="accSalud9" class="form-control" required>
                        <option value="" {{ $encuesta->accSalud9 === '' ? 'selected' : '' }}>Seleccionar</option>
                        <option value="Si" {{ $encuesta->accSalud9 === 'Si' ? 'selected' : '' }}>Si</option>
                        <option value="No > ¿cómo la toma?" {{ $encuesta->accSalud9 === 'No > ¿cómo la toma?' ? 'selected' : '' }}>No > ¿cómo la toma?</option>
                    </select>
                </div>
                
                <div id="accSalud9-textbox" class="form-group" style="display: none;">
                    <label for="accSalud9_otro">¿Cómo la toma?</label>
                    <input type="text" name="accSalud9_otro" id="accSalud9_otro" class="form-control" value="{{ $encuesta->accSalud9_otro }}">
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var accSalud9Select = document.getElementById('accSalud9');
                        var accSalud9Textbox = document.getElementById('accSalud9-textbox');
                
                        function toggleTextbox() {
                            var selectedOption = accSalud9Select.value;
                            if (selectedOption === 'No > ¿cómo la toma?') {
                                accSalud9Textbox.style.display = 'block';
                            } else {
                                accSalud9Textbox.style.display = 'none';
                            }
                        }
                
                        // Initialize visibility on page load
                        toggleTextbox();
                
                        // Update visibility on change
                        accSalud9Select.addEventListener('change', toggleTextbox);
                    });
                </script>

                <div class="form-group">
                    <label for="accMental1">¿Alguien en el grupo familiar recibe tratamiento en Salud Mental (Psicológico y/o Psiquiátrico)?</label>
                    <select name="accMental1" id="accMental1" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="si" {{ $encuesta->accMental1 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accMental1 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="accMental2">¿Alguien en su familia lo necesitó y no lo obtuvo?</label>
                    <select name="accMental2" id="accMental2" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="Si" {{ $encuesta->accMental2 === 'Si' ? 'selected' : '' }}>Si</option>
                        <option value="No" {{ $encuesta->accMental2 === 'No' ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="prSoysa">De la siguiente lista de problemas sociales y de salud ¿cuáles son los 3 principales que identifica en el barrio?</label>
                    <div>
                        @foreach(['Personas en situación de calle', 'Consumo problemático', 'No finalizar la escuela secundaria', 'Situaciones de violencias', 'Inseguridad', 'Desocupación', 'Problemas en el acceso a la salud', 'Suicidios/ Autolesión', 'Embarazos no deseados', 'Desaparición de personas', 'Venta de sustancias', 'Otros'] as $problema)
                        <div class="checkbox-container">
                            <label>
                                <input type="checkbox" name="prSoysa[]" value="{{ $problema }}" {{ in_array($problema, $encuesta->prSoysa ?? []) ? 'checked' : '' }}>
                                {{ $problema }}
                            </label><br>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                
                {{-- Script para asegurar que se seleccionen exactamente 3 opciones --}}
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const checkboxes = document.querySelectorAll('input[name="prSoysa[]"]');
                        const minChecked = 3;
                        const maxChecked = 3;
                        const submitButton = document.querySelector('button[type="submit"]');
                
                        checkboxes.forEach(checkbox => {
                            checkbox.addEventListener('change', function () {
                                let checkedCount = 0;
                                checkboxes.forEach(cb => {
                                    if (cb.checked) {
                                        checkedCount++;
                                    }
                                });
                
                                if (checkedCount > maxChecked) {
                                    this.checked = false;
                                    alert(`Solo puedes seleccionar hasta ${maxChecked} opciones.`);
                                }
                            });
                        });
                
                        // Añadir evento al botón de envío
                        submitButton.addEventListener('click', function (event) {
                            let checkedCount = 0;
                            checkboxes.forEach(cb => {
                                if (cb.checked) {
                                    checkedCount++;
                                }
                            });
                
                            if (checkedCount < minChecked) {
                                event.preventDefault(); // Prevenir el envío del formulario
                                alert(`Debes seleccionar al menos ${minChecked} opciones en la pregunta de problemas sociales y de salud.`);
                            }
                        });
                    });
                </script>                
                {{-- Script para asegurar que se seleccionen exactamente 3 opciones --}}
                
                

                <div class="form-group">
                    <label for="alimantacion1">¿Recibe asistencia alimentaria?</label>
                    <select name="alimantacion1" id="alimantacion1" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="Si" {{ $encuesta->alimantacion1 === 'Si' ? 'selected' : '' }}>Si</option>
                        <option value="No" {{ $encuesta->alimantacion1 === 'No' ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="alimentacion2">¿De qué tipo? (se puede responder más de una)</label>
                    <div>
                        @foreach(['Comida elaborada/vianda', 'Bolsón de alimentos', 'Dinero'] as $opcion)
                        <div class="checkbox-container">
                            <label>
                                <input type="checkbox" name="alimentacion2[]" value="{{ $opcion }}" {{ in_array($opcion, $encuesta->alimentacion2 ?? []) ? 'checked' : '' }}>
                                {{ $opcion }}
                            </label><br>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                
                {{-- Script para validar que al menos una opción esté marcada --}}
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const form = document.querySelector('form');
                        const checkboxes = document.querySelectorAll('input[name="alimentacion2[]"]');
                        const minChecked = 1; // Mínimo de opciones a seleccionar
                        
                        form.addEventListener('submit', function (e) {
                            let checkedCount = 0;
                            checkboxes.forEach(checkbox => {
                                if (checkbox.checked) {
                                    checkedCount++;
                                }
                            });
                    
                            if (checkedCount < minChecked) {
                                e.preventDefault();
                                alert(`Debes seleccionar al menos ${minChecked} opción en la pregunta "¿De qué tipo?".`);
                            }
                        });
                    });
                </script>
                

                <div class="form-group">
                    <label for="alimentacion3">¿Tiene huerta en su casa?</label>
                    <select name="alimentacion3" id="alimentacion3" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="Si" {{ $encuesta->alimentacion3 === 'Si' ? 'selected' : '' }}>Si</option>
                        <option value="No" {{ $encuesta->alimentacion3 === 'No' ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="alimentacion4">¿Cría de animales para consumo?</label>
                    <select name="alimentacion4" id="alimentacion4" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="Si" {{ $encuesta->alimentacion4 === 'Si' ? 'selected' : '' }}>Si</option>
                        <option value="No" {{ $encuesta->alimentacion4 === 'No' ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="partSocial">¿Participa en alguna institución/organización?</label>
                    <select name="partSocial" id="partSocial" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="Si" {{ $encuesta->partSocial === 'Si' ? 'selected' : '' }}>Si</option>
                        <option value="No" {{ $encuesta->partSocial === 'No' ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                
                
                <div class="form-group">
                    <label for="vivienda1">Carácter de la vivienda/lote</label>
                    <select name="vivienda1" id="vivienda1" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="Propia" {{ $encuesta->vivienda1 === 'Propia' ? 'selected' : '' }}>Propia</option>
                        <option value="Préstamo" {{ $encuesta->vivienda1 === 'Préstamo' ? 'selected' : '' }}>Préstamo</option>
                        <option value="Alquiler" {{ $encuesta->vivienda1 === 'Alquiler' ? 'selected' : '' }}>Alquiler</option>
                        <option value="Fiscal" {{ $encuesta->vivienda1 === 'Fiscal' ? 'selected' : '' }}>Fiscal</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="vivienda2">Materiales que predominan en la vivienda</label>
                    <select name="vivienda2" id="vivienda2" class="form-control" required>
                        <option value="" {{ $encuesta->vivienda2 === '' ? 'selected' : '' }}>Seleccionar</option>
                        <option value="Material, ladrillo" {{ $encuesta->vivienda2 === 'Material, ladrillo' ? 'selected' : '' }}>Material, ladrillo</option>
                        <option value="Madera" {{ $encuesta->vivienda2 === 'Madera' ? 'selected' : '' }}>Madera</option>
                        <option value="Chapa" {{ $encuesta->vivienda2 === 'Chapa' ? 'selected' : '' }}>Chapa</option>
                        <option value="Mixto" {{ $encuesta->vivienda2 === 'Mixto' ? 'selected' : '' }}>Mixto</option>
                        <option value="Otros" {{ $encuesta->vivienda2 === 'Otros' ? 'selected' : '' }}>Otros</option>
                    </select>
                </div>
                
                <div id="vivienda2-textbox" class="form-group" style="display: none;">
                    <label for="vivienda2_otro">Especificar:</label>
                    <input type="text" name="vivienda2_otro" id="vivienda2_otro" class="form-control" value="{{ $encuesta->vivienda2_otro }}">
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var vivienda2Select = document.getElementById('vivienda2');
                        var vivienda2Textbox = document.getElementById('vivienda2-textbox');
                
                        function toggleTextbox() {
                            var selectedOption = vivienda2Select.value;
                            if (selectedOption === 'Otros') {
                                vivienda2Textbox.style.display = 'block';
                            } else {
                                vivienda2Textbox.style.display = 'none';
                            }
                        }
                
                        // Initialize visibility on page load
                        toggleTextbox();
                
                        // Update visibility on change
                        vivienda2Select.addEventListener('change', toggleTextbox);
                    });
                </script>
                
                

                <div class="form-group">
                    <label for="vivienda3">Materiales predominantes en el piso</label>
                    <select name="vivienda3" id="vivienda3" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="Cerámico (revestimiento)" {{ $encuesta->vivienda3 === 'Cerámico (revestimiento)' ? 'selected' : '' }}>Cerámico (revestimiento)</option>
                        <option value="Cemento" {{ $encuesta->vivienda3 === 'Cemento' ? 'selected' : '' }}>Cemento</option>
                        <option value="Tierra" {{ $encuesta->vivienda3 === 'Tierra' ? 'selected' : '' }}>Tierra</option>
                        <option value="Mixto" {{ $encuesta->vivienda3 === 'Mixto' ? 'selected' : '' }}>Mixto</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="vivienda4">El techo ¿tiene revestimiento interior o cielorraso?</label>
                    <select name="vivienda4" id="vivienda4" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="Si" {{ $encuesta->vivienda4 === 'Si' ? 'selected' : '' }}>Si</option>
                        <option value="No" {{ $encuesta->vivienda4 === 'No' ? 'selected' : '' }}>No</option>
                        <option value="No sabe" {{ $encuesta->vivienda4 === 'No sabe' ? 'selected' : '' }}>No sabe</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="vivienda5">¿Cuántas habitaciones o piezas para dormir tiene este hogar?</label>
                    <select name="vivienda5" id="vivienda5" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="Ninguna" {{ $encuesta->vivienda5 === 'Ninguna' ? 'selected' : '' }}>Ninguna</option>
                        <option value="Una" {{ $encuesta->vivienda5 === 'Una' ? 'selected' : '' }}>Una</option>
                        <option value="Dos" {{ $encuesta->vivienda5 === 'Dos' ? 'selected' : '' }}>Dos</option>
                        <option value="Tres o más" {{ $encuesta->vivienda5 === 'Tres o más' ? 'selected' : '' }}>Tres o más</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="vivienda6">El baño/letrina se encuentra:</label>
                    <select name="vivienda6" id="vivienda6" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="Dentro de la vivienda" {{ $encuesta->vivienda6 === 'Dentro de la vivienda' ? 'selected' : '' }}>Dentro de la vivienda</option>
                        <option value="Fuera de la vivienda, pero dentro del terreno" {{ $encuesta->vivienda6 === 'Fuera de la vivienda, pero dentro del terreno' ? 'selected' : '' }}>Fuera de la vivienda, pero dentro del terreno</option>
                        <option value="No tiene" {{ $encuesta->vivienda6 === 'No tiene' ? 'selected' : '' }}>No tiene</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="vivienda7">El desagüe del inodoro es:</label>
                    <select name="vivienda7" id="vivienda7" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="A cámara séptica y pozo ciego" {{ $encuesta->vivienda7 === 'A cámara séptica y pozo ciego' ? 'selected' : '' }}>A cámara séptica y pozo ciego</option>
                        <option value="Sólo a pozo ciego" {{ $encuesta->vivienda7 === 'Sólo a pozo ciego' ? 'selected' : '' }}>Sólo a pozo ciego</option>
                        <option value="A hoyo, excavación en la tierra, etc." {{ $encuesta->vivienda7 === 'A hoyo, excavación en la tierra, etc.' ? 'selected' : '' }}>A hoyo, excavación en la tierra, etc.</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="accBas1">Tiene agua...</label>
                    <select name="accBas1" id="accBas1" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="por cañería dentro de la vivienda" {{ $encuesta->accBas1 === 'por cañería dentro de la vivienda' ? 'selected' : '' }}>por cañería dentro de la vivienda</option>
                        <option value="fuera de la vivienda pero dentro del terreno" {{ $encuesta->accBas1 === 'fuera de la vivienda pero dentro del terreno' ? 'selected' : '' }}>fuera de la vivienda pero dentro del terreno</option>
                        <option value="fuera del terreno" {{ $encuesta->accBas1 === 'fuera del terreno' ? 'selected' : '' }}>fuera del terreno</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="accBas2">Para cocinar utiliza...</label>
                    <select name="accBas2" id="accBas2" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="gas de red" {{ $encuesta->accBas2 === 'gas de red' ? 'selected' : '' }}>gas de red</option>
                        <option value="gas envasado (tubo/garrafa)" {{ $encuesta->accBas2 === 'gas envasado (tubo/garrafa)' ? 'selected' : '' }}>gas envasado (tubo/garrafa)</option>
                        <option value="artefacto eléctrico" {{ $encuesta->accBas2 === 'artefacto eléctrico' ? 'selected' : '' }}>artefacto eléctrico</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="accBas3">El agua que usa, proviene de...</label>
                    <select name="accBas3" id="accBas3" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="red pública" {{ $encuesta->accBas3 === 'red pública' ? 'selected' : '' }}>red pública</option>
                        <option value="perforación con bomba a motor" {{ $encuesta->accBas3 === 'perforación con bomba a motor' ? 'selected' : '' }}>perforación con bomba a motor</option>
                        <option value="perforación con bomba manual" {{ $encuesta->accBas3 === 'perforación con bomba manual' ? 'selected' : '' }}>perforación con bomba manual</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="accBas4">Para calefaccionarse utiliza...</label>
                    <select name="accBas4" id="accBas4" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="gas de red" {{ $encuesta->accBas4 === 'gas de red' ? 'selected' : '' }}>gas de red</option>
                        <option value="gas envasado (tubo/garrafa)" {{ $encuesta->accBas4 === 'gas envasado (tubo/garrafa)' ? 'selected' : '' }}>gas envasado (tubo/garrafa)</option>
                        <option value="artefacto eléctrico" {{ $encuesta->accBas4 === 'artefacto eléctrico' ? 'selected' : '' }}>artefacto eléctrico</option>
                        <option value="leña" {{ $encuesta->accBas4 === 'leña' ? 'selected' : '' }}>leña</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="capId">CAP ID</label>
                    <select name="capId" id="capId" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="1" {{ $encuesta->capId == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $encuesta->capId == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $encuesta->capId == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $encuesta->capId == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $encuesta->capId == '5' ? 'selected' : '' }}>5</option>
                        <option value="6" {{ $encuesta->capId == '6' ? 'selected' : '' }}>6</option>
                        <option value="8" {{ $encuesta->capId == '8' ? 'selected' : '' }}>8</option>
                        <option value="9" {{ $encuesta->capId == '9' ? 'selected' : '' }}>9</option>
                        <option value="11" {{ $encuesta->capId == '11' ? 'selected' : '' }}>11</option>
                        <option value="12" {{ $encuesta->capId == '12' ? 'selected' : '' }}>12</option>
                        <option value="13" {{ $encuesta->capId == '13' ? 'selected' : '' }}>13</option>
                    </select>
                </div>
                

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>  
</div>

@endsection
