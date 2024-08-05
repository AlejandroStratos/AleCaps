  @extends('master')

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
  <div class="container">
      <div class="row mt-4 mb-5">
          <div class="col-12">
              <a href="{{ route('home') }}" class="btn btn-secondary position-absolute start-0 top-0 m-3">
                  <i class="bi bi-arrow-left-short"></i>Volver
              </a>
          </div>
      </div>
      <br>
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
  
      <div class="card mt-3 mb-3">
          <div class="card-header">
              <h1 class="text-center">EDITAR INTEGRANTES DE LA FAMILIA</h1>
          </div>
          <form action="{{ route('integrante.update', $famId) }}" method="POST" class="form-floating">
              @csrf
              @method('PUT')
              <input type="hidden" name="famId" value="{{ $famId }}">
  
              <div class="card-body">
                  @foreach ($integrantes as $integrante)
                      <div class="row mb-3">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="nombre_{{ $integrante->intId }}" class="form-label">Nombre</label>
                                  <input type="text" class="form-control" id="nombre_{{ $integrante->intId }}" name="integrantes[{{ $integrante->intId }}][nombre]" value="{{ $integrante->nombre }}" required>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="apellido_{{ $integrante->intId }}" class="form-label">Apellido</label>
                                  <input type="text" class="form-control" id="apellido_{{ $integrante->intId }}" name="integrantes[{{ $integrante->intId }}][apellido]" value="{{ $integrante->apellido }}" required>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="fechaNac_{{ $integrante->intId }}" class="form-label">Fecha de nacimiento</label>
                                  <input class="form-control" type="date" id="fechaNac_{{ $integrante->intId }}" name="integrantes[{{ $integrante->intId }}][fechaNac]" value="{{ $integrante->fechaNac }}" required>
                              </div>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="estadoDni_{{ $integrante->intId }}" class="form-label">Estado DNI</label>
                                  <select class="form-control" id="estadoDni_{{ $integrante->intId }}" name="integrantes[{{ $integrante->intId }}][estadoDni]" required>
                                      <option value="">Seleccionar</option>
                                      <option value="Actualizado" {{ $integrante->estadoDni == 'Actualizado' ? 'selected' : '' }}>Actualizado</option>
                                      <option value="Requiero Actualización" {{ $integrante->estadoDni == 'Requiero Actualización' ? 'selected' : '' }}>Requiero Actualización</option>
                                      <option value="Nunca lo tramitó/indocumentado/a" {{ $integrante->estadoDni == 'Nunca lo tramitó/indocumentado/a' ? 'selected' : '' }}>Nunca lo tramitó/indocumentado/a</option>
                                      <option value="Residencia precaria" {{ $integrante->estadoDni == 'Residencia precaria' ? 'selected' : '' }}>Residencia precaria</option>
                                      <option value="Radicación" {{ $integrante->estadoDni == 'Radicación' ? 'selected' : '' }}>Radicación</option>
                                      <option value="Documentación extranjera" {{ $integrante->estadoDni == 'Documentación extranjera' ? 'selected' : '' }}>Documentación extranjera</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="genero_{{ $integrante->intId }}" class="form-label">Género</label>
                                  <select class="form-control" id="genero_{{ $integrante->intId }}" name="integrantes[{{ $integrante->intId }}][genero]" required>
                                      <option value="">Seleccionar</option>
                                      <option value="Mujer" {{ $integrante->genero == 'Mujer' ? 'selected' : '' }}>Mujer</option>
                                      <option value="Mujer trans/travesti" {{ $integrante->genero == 'Mujer trans/travesti' ? 'selected' : '' }}>Mujer trans/travesti</option>
                                      <option value="Varón" {{ $integrante->genero == 'Varón' ? 'selected' : '' }}>Varón</option>
                                      <option value="Varón trans/masculinidad trans" {{ $integrante->genero == 'Varón trans/masculinidad trans' ? 'selected' : '' }}>Varón trans/masculinidad trans</option>
                                      <option value="No binario" {{ $integrante->genero == 'No binario' ? 'selected' : '' }}>No binario</option>
                                      <option value="Prefiero no contestar" {{ $integrante->genero == 'Prefiero no contestar' ? 'selected' : '' }}>Prefiero no contestar</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4">
                            <!-- Select Nacionalidad -->
                            <div class="form-group">
                                <label for="nacionalidad_{{ $integrante->intId }}" class="form-label">Nacionalidad</label>
                                <select class="form-control" id="nacionalidad_{{ $integrante->intId }}" name="integrantes[{{ $integrante->intId }}][nacionalidad]" required>
                                    <option value="">Seleccionar</option>
                                    <option value="Argentino" {{ $integrante->nacionalidad == 'Argentino' ? 'selected' : '' }}>Argentino</option>
                                    <option value="Paraguayo" {{ $integrante->nacionalidad == 'Paraguayo' ? 'selected' : '' }}>Paraguayo</option>
                                    <option value="Boliviano" {{ $integrante->nacionalidad == 'Boliviano' ? 'selected' : '' }}>Boliviano</option>
                                    <option value="Uruguayo" {{ $integrante->nacionalidad == 'Uruguayo' ? 'selected' : '' }}>Uruguayo</option>
                                    <option value="Brasilero" {{ $integrante->nacionalidad == 'Brasilero' ? 'selected' : '' }}>Brasilero</option>
                                    <option value="Chileno" {{ $integrante->nacionalidad == 'Chileno' ? 'selected' : '' }}>Chileno</option>
                                    <option value="Peruano" {{ $integrante->nacionalidad == 'Peruano' ? 'selected' : '' }}>Peruano</option>
                                    <option value="Otro" {{ $integrante->nacionalidad == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <div class="col-md-4">
                              <!-- Select Programa Social -->
                            <div class="form-group">
                                <label for="progSocial_{{ $integrante->intId }}" class="form-label">Programa social</label>
                                <select class="form-control" id="progSocial_{{ $integrante->intId }}" name="integrantes[{{ $integrante->intId }}][progSocial]" required>
                                    <option value="">Seleccionar</option>
                                    <option value="AUH" {{ $integrante->progSocial == 'AUH' ? 'selected' : '' }}>AUH</option>
                                    <option value="Potenciar trabajo" {{ $integrante->progSocial == 'Potenciar trabajo' ? 'selected' : '' }}>Potenciar trabajo</option>
                                    <option value="Becas progresar" {{ $integrante->progSocial == 'Becas progresar' ? 'selected' : '' }}>Becas progresar</option>
                                    <option value="Acompañar" {{ $integrante->progSocial == 'Acompañar' ? 'selected' : '' }}>Acompañar</option>
                                    <option value="Otros" {{ $integrante->progSocial == 'Otros' ? 'selected' : '' }}>Otros</option>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <!-- Select Ocupación -->
                            <div class="form-group">
                                <label for="ocupacion_{{ $integrante->intId }}" class="form-label">Ocupación</label>
                                <select class="form-control" id="ocupacion_{{ $integrante->intId }}" name="integrantes[{{ $integrante->intId }}][ocupacion]" required>
                                    <option value="">Seleccionar</option>
                                    <option value="Ninguno" {{ $integrante->ocupacion == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                                    <option value="Empleado dependencia" {{ $integrante->ocupacion == 'Empleado dependencia' ? 'selected' : '' }}>Empleado dependencia</option>
                                    <option value="Changas, temporario" {{ $integrante->ocupacion == 'Changas, temporario' ? 'selected' : '' }}>Changas, temporario</option>
                                    <option value="Cuentapropista, monotrib" {{ $integrante->ocupacion == 'Cuentapropista, monotrib' ? 'selected' : '' }}>Cuentapropista, monotrib</option>
                                    <option value="Desocupado" {{ $integrante->ocupacion == 'Desocupado' ? 'selected' : '' }}>Desocupado</option>
                                    <option value="Jubilado/pensionado" {{ $integrante->ocupacion == 'Jubilado/pensionado' ? 'selected' : '' }}>Jubilado/pensionado</option>
                                    <option value="Beneficio plan social" {{ $integrante->ocupacion == 'Beneficio plan social' ? 'selected' : '' }}>Beneficio plan social</option>
                                    <option value="No sabe, no contesta" {{ $integrante->ocupacion == 'No sabe, no contesta' ? 'selected' : '' }}>No sabe, no contesta</option>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <!-- Select Obra Social -->
                            <div class="form-group">
                                <label for="obraSocial_{{ $integrante->intId }}" class="form-label">Obra social</label>
                                <select class="form-control" id="obraSocial_{{ $integrante->intId }}" name="integrantes[{{ $integrante->intId }}][obraSocial]" required>
                                    <option value="">Seleccionar</option>
                                    <option value="Si" {{ $integrante->obraSocial == 'Si' ? 'selected' : '' }}>Si</option>
                                    <option value="No" {{ $integrante->obraSocial == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                          </div>
                      </div>
                <div class="row mb-3">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="ultimoControl_{{ $integrante->intId }}" class="form-label">Último control</label>
                            <input type="date" id="ultimoControl_{{ $integrante->intId }}" name="integrantes[{{ $integrante->intId }}][ultimoControl]" class="form-control" value="{{ $integrante->ultimoControl }}" required>
                        </div>
                        </div> 
                    <div class="col">
                        <div class="form-group">
                            <label for="vinculo_{{ $integrante->intId }}" class="form-label">Vínculo</label>
                            <select class="form-control" id="vinculo_{{ $integrante->intId }}" name="integrantes[{{ $integrante->intId }}][vinculo]" required>
                                <option value="">Seleccionar</option>
                                <option value="Esposo/a" {{ $integrante->vinculo == 'Esposo/a' ? 'selected' : '' }}>Esposo/a</option>
                                <option value="Concubino/a" {{ $integrante->vinculo == 'Concubino/a' ? 'selected' : '' }}>Concubino/a</option>
                                <option value="Hijo/a" {{ $integrante->vinculo == 'Hijo/a' ? 'selected' : '' }}>Hijo/a</option>
                                <option value="Padre" {{ $integrante->vinculo == 'Padre' ? 'selected' : '' }}>Padre</option>
                                <option value="Madre" {{ $integrante->vinculo == 'Madre' ? 'selected' : '' }}>Madre</option>
                                <option value="Abuelo/a" {{ $integrante->vinculo == 'Abuelo/a' ? 'selected' : '' }}>Abuelo/a</option>
                                <option value="Nieto/a" {{ $integrante->vinculo == 'Nieto/a' ? 'selected' : '' }}>Nieto/a</option>
                                <option value="Tío/a" {{ $integrante->vinculo == 'Tío/a' ? 'selected' : '' }}>Tío/a</option>
                                <option value="Sobrino/a" {{ $integrante->vinculo == 'Sobrino/a' ? 'selected' : '' }}>Sobrino/a</option>
                                <option value="Suegro/a" {{ $integrante->vinculo == 'Suegro/a' ? 'selected' : '' }}>Suegro/a</option>
                                <option value="Cuñado/a" {{ $integrante->vinculo == 'Cuñado/a' ? 'selected' : '' }}>Cuñado/a</option>
                                <option value="Unión civil" {{ $integrante->vinculo == 'Unión civil' ? 'selected' : '' }}>Unión civil</option>
                                <option value="Unión de hecho" {{ $integrante->vinculo == 'Unión de hecho' ? 'selected' : '' }}>Unión de hecho</option>
                                <option value="Otro" {{ $integrante->vinculo == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                        </div>
                    </div> 
                    <div class="col">
                        <div class="form-group">
                            <label for="nivelEduc_{{ $integrante->intId }}" class="form-label">Nivel Educativo</label>
                            <select class="form-control" id="nivelEduc_{{ $integrante->intId }}" name="integrantes[{{ $integrante->intId }}][nivelEduc]" required>
                                <option value="">Seleccionar</option>
                                <option value="Ninguno por edad" {{ $integrante->nivelEduc == 'Ninguno por edad' ? 'selected' : '' }}>Ninguno por edad</option>
                                <option value="Primaria incompleta" {{ $integrante->nivelEduc == 'Primaria incompleta' ? 'selected' : '' }}>Primaria incompleta</option>
                                <option value="Primaria completa" {{ $integrante->nivelEduc == 'Primaria completa' ? 'selected' : '' }}>Primaria completa</option>
                                <option value="Secundaria incompleta" {{ $integrante->nivelEduc == 'Secundaria incompleta' ? 'selected' : '' }}>Secundaria incompleta</option>
                                <option value="Secundaria completa" {{ $integrante->nivelEduc == 'Secundaria completa' ? 'selected' : '' }}>Secundaria completa</option>
                                <option value="Terciario completo" {{ $integrante->nivelEduc == 'Terciario completo' ? 'selected' : '' }}>Terciario completo</option>
                                <option value="Universitario completo" {{ $integrante->nivelEduc == 'Universitario completo' ? 'selected' : '' }}>Universitario completo</option>
                                <option value="Analfabeto: no lee ni escribe" {{ $integrante->nivelEduc == 'Analfabeto: no lee ni escribe' ? 'selected' : '' }}>Analfabeto: no lee ni escribe</option>
                                <option value="No sabe/no contesta" {{ $integrante->nivelEduc == 'No sabe/no contesta' ? 'selected' : '' }}>No sabe/no contesta</option>
                                <option value="Cursando primaria" {{ $integrante->nivelEduc == 'Cursando primaria' ? 'selected' : '' }}>Cursando primaria</option>
                                <option value="Cursando secundaria" {{ $integrante->nivelEduc == 'Cursando secundaria' ? 'selected' : '' }}>Cursando secundaria</option>
                                <option value="Cursando terciaria" {{ $integrante->nivelEduc == 'Cursando terciaria' ? 'selected' : '' }}>Cursando terciaria</option>
                                <option value="Cursando universidad" {{ $integrante->nivelEduc == 'Cursando universidad' ? 'selected' : '' }}>Cursando universidad</option>
                                <option value="Cursando inicial" {{ $integrante->nivelEduc == 'Cursando inicial' ? 'selected' : '' }}>Cursando inicial</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col">
                        <!-- Checkboxes Enfermedades Crónicas -->
                        <div class="form-group">
                            <label class="form-label">Enfermedades Crónicas</label>
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="Respiratorios" {{ in_array('Respiratorios', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Respiratorios<br>
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="En la piel" {{ in_array('En la piel', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> En la piel<br>
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="En la vista" {{ in_array('En la vista', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> En la vista<br>
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="Gástricos" {{ in_array('Gástricos', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Gástricos<br>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="Ginecológicos" {{ in_array('Ginecológicos', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Ginecológicos<br>
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="Alergias" {{ in_array('Alergias', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Alergias<br>
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="En los huesos/articulaciones" {{ in_array('En los huesos/articulaciones', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> En los huesos/articulaciones<br>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="Salud mental" {{ in_array('Salud mental', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Salud mental<br>
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="Situaciones de violencia" {{ in_array('Situaciones de violencia', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Situaciones de violencia<br>
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="Consumo problemático de sustancias" {{ in_array('Consumo problemático de sustancias', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Consumo problemático de sustancias<br>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="Diabetes" {{ in_array('Diabetes', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Diabetes<br>
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="Hipertensión" {{ in_array('Hipertensión', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Hipertensión<br>
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="Problemas de tiroides" {{ in_array('Problemas de tiroides', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Problemas de tiroides<br>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="Odontológicos" {{ in_array('Odontológicos', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Odontológicos<br>
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="Cáncer" {{ in_array('Cáncer', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Cáncer<br>
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="Infecciones de transmisión sexual" {{ in_array('Infecciones de transmisión sexual', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Infecciones de transmisión sexual<br>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="integrantes[{{ $integrante->intId }}][enfermedadesCronicas][]" value="con discapacidad" {{ in_array('con discapacidad', $integrante->enfermedadesCronicas ?? []) ? 'checked' : '' }}> Discapacidad ¿tiene certificado único de discapacidad?<br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                               
                      <hr>

                      @endforeach
              </div>
              <div class="card-footer text-center">
                  <button type="submit" class="btn btn-custom">Actualizar Integrantes</button>

                  {{-- BOTON EDITAR ENCUESTA --}}
                  <a href="{{ route('encuesta.edit', $encuestaId) }}" class="btn btn-secondary">Editar encuesta</a>
              </div>
          </form>
      </div>
  </div>
  @endsection

