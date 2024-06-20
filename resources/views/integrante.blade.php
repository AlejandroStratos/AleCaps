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

<div class="container">
        
       <div class="row mt-4 mb-5">
        <!-- boton de volver al home-->
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
                <h1 class="text-center">INGRESAR INTEGRANTES</h1>
            </div>
            <form action="{{ route('integrante.store') }}" method="POST" class="form-floating">
                @csrf
                <input type="hidden" name="famId" value="{{ $famId }}">
    
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <!-- Input Nombre -->
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Input Apellido -->
                            <div class="form-group">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Input Fecha de Nacimiento -->
                            <div class="form-group">
                                <label for="fechaNac" class="form-label">Fecha de nacimiento</label>
                                <input class="form-control" type="date" id="fechaNac" name="fechaNac" required>
                            </div>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <!-- Select Estado DNI -->
                            <div class="form-group">
                                <label for="estadoDni" class="form-label">Estado DNI</label>
                                <select class="form-control" id="estadoDni" name="estadoDni" required>
                                    <option value="">Seleccionar</option>
                                    <option value="Actualizado">Actualizado</option>
                                    <option value="Requiero Actualización">Requiero Actualización</option>
                                    <option value="Nunca lo tramitó/indocumentado/a">Nunca lo tramitó/indocumentado/a</option>
                                    <option value="Residencia precaria">Residencia precaria</option>
                                    <option value="Radicación">Radicación</option>
                                    <option value="Documentación extranjera">Documentación extranjera</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Select Género -->
                            <div class="form-group">
                                <label for="genero" class="form-label">Género</label>
                                <select class="form-control" id="genero" name="genero" required>
                                    <option value="">Seleccionar</option>
                                    <option value="Mujer">Mujer</option>
                                    <option value="Mujer trans/travesti">Mujer trans/travesti</option>
                                    <option value="Varón">Varón</option>
                                    <option value="Varón trans/masculinidad trans">Varón trans/masculinidad trans</option>
                                    <option value="No binario">No binario</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Select Nacionalidad -->
                            <div class="form-group">
                                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                                <select class="form-control" id="nacionalidad" name="nacionalidad" required>
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
                            </div>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <!-- Select Programa Social -->
                            <div class="form-group">
                                <label for="progSocial" class="form-label">Programa social</label>
                                <select class="form-control" id="progSocial" name="progSocial" required>
                                    <option value="">Seleccionar</option>
                                    <option value="AUH">AUH</option>
                                    <option value="Potenciar trabajo">Potenciar trabajo</option>
                                    <option value="Becas progresar">Becas progresar</option>
                                    <option value="Acompañar">Acompañar</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Select Ocupación -->
                            <div class="form-group">
                                <label for="ocupacion" class="form-label">Ocupación</label>
                                <select class="form-control" id="ocupacion" name="ocupacion" required>
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
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Select Obra Social -->
                            <div class="form-group">
                                <label for="obraSocial" class="form-label">Obra social</label>
                                <select class="form-control" id="obraSocial" name="obraSocial" required>
                                    <option value="">Seleccionar</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                        <label>Último control</label>
                                        <input type="date" name="ultimoControl" class="form-control" required>
                                </div>
                        </div>
                        <div class="col">
                                <div class="form-group">
                                        <label>Vínculo</label>
                                        <select class="form-control" name="vinculo" required>
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
                                </div>
                        </div>
                        <div class="col">
                                <div class="form-group">
                                        <label>Nivel Educativo</label>
                                        <select class="form-control" name="nivelEduc" required>
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
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="Respiratorios"> Respiratorios<br>
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="En la piel"> En la piel<br>
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="En la vista"> En la vista<br>
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="Gástricos"> Gástricos<br>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="Ginecológicos"> Ginecológicos<br>
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="Alergias"> Alergias<br>
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="En los huesos/articulaciones"> En los huesos/articulaciones<br>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="Salud mental"> Salud mental<br>
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="Situaciones de violencia"> Situaciones de violencia<br>
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="Consumo problemático de sustancias"> Consumo problemático de sustancias<br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="Diabetes"> Diabetes<br>
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="Hipertensión"> Hipertensión<br>
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="Problemas de tiroides"> Problemas de tiroides<br>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="Odontológicos"> Odontológicos<br>
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="Cáncer"> Cáncer<br>
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="Infecciones de transmisión sexual"> Infecciones de transmisión sexual<br>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="enfermedadesCronicas[]" value="con discapacidad"> Discapacidad ¿tiene certificado único de discapacidad?<br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Botones de enviar -->
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn btn-custom btn-block" name="funcion" value="agregar">Agregar Integrante</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-custom btn-block" name="funcion" value="" >Guardar Integrantes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if (@isset($integrantes))
            <div class="card">
                <div class="card-header">
                        <h2 class="text-center">Integrantes</h2>
                </div>
                <div class="card-body">
                        @isset($integrantes)
                        <div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>Estado DNI</th>
                                                <th>Genero</th>
                                                <th>Nacionalidad</th>
                                                <th>Vinculo</th>
                                                <th>Nivel Educacional</th>
                                                <th>Ocupacion</th>
                                                <th>Programa social</th>
                                                <th>Obra Social</th>
                                                <th>Enfermedades Cronicas</th>
                                                <th>Ultimo Control</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($integrantes as $integrante)
                                            <tr>
                                                <td>{{ $integrante->nombre }}</td>
                                                <td>{{ $integrante->apellido }}</td>
                                                <td>{{ $integrante->fechaNac }}</td>
                                                <td>{{ $integrante->estadoDni }}</td>
                                                <td>{{ $integrante->genero }}</td>
                                                <td>{{ $integrante->nacionalidad }}</td>
                                                <td>{{ $integrante->vinculo }}</td>
                                                <td>{{ $integrante->nivelEduc }}</td>
                                                <td>{{ $integrante->ocupacion }}</td>
                                                <td>{{ $integrante->progSocial }}</td>
                                                <td>{{$integrante->obraSocial}}</td>
                                                <td>{{ $integrante->enfermedadesCronicas}}</td>
                                                <td>{{$integrante->ultimoControl}}</td>
                                                <td><form action="{{ route('integrante.destroy', $integrante->intId) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar a '.$integrante->nombre.' '.$integrante->apellido.' ?')">Borrar</button>
                                                    </form></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                
                
                        </div>
                        @endisset
                    </div>
            </div>
       
                
        @endif
    </div>
    
    



        


