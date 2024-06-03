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
                <form action="{{ route('integrante.store') }}" method="POST">
                @csrf
                <input type="hidden" name="famId" value="{{ $famId }}">
    
                <div id="integrantes-container">
                <!-- Campo de integrante original -->
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
                        <option value="si">si</option>
                        <option value="no">no</option>
                </select>
            
                <br>
            
                <label>Genero</label>
                <select name="integrantes[genero][]" required>
                        <option value="">Seleccionar</option>
                        <option value="si">si</option>
                        <option value="no">no</option>
                </select>
            
                <br>
            
                <label>Nacionalidad</label>
                <select name="integrantes[nacionalidad][]" required>
                        <option value="">Seleccionar</option>
                        <option value="si">si</option>
                        <option value="no">no</option>
                </select>
            
                <br>
            
                <label>Vinculo</label>
                <select name="integrantes[vinculo][]" required>
                        <option value="">Seleccionar</option>
                        <option value="si">si</option>
                        <option value="no">no</option>
                </select>
            
                <br>
            
                <label>Nivel Educativo</label>
                <select name="integrantes[nivelEduc][]" required>
                        <option value="">Seleccionar</option>
                        <option value="si">si</option>
                        <option value="no">no</option>
                </select>
            
                <br>
            
                <label>Ocupacion</label>
                <select name="integrantes[ocupacion][]" required>
                        <option value="">Seleccionar</option>
                        <option value="si">si</option>
                        <option value="no">no</option>
                </select>
            
                <br>
            
                <label>Programa social</label>
                <select name="integrantes[progSocial][]" required>
                        <option value="">Seleccionar</option>
                        <option value="si">si</option>
                        <option value="no">no</option>
                </select>
            
                <br>
            
                <label>Obra social</label>
                <select name="integrantes[obraSocial][]" required>
                        <option value="">Seleccionar</option>
                        <option value="si">si</option>
                        <option value="no">no</option>
                </select>
            
                <br>
            
                <label>Enfermedades Cronicas</label>
                <select name="integrantes[enfermedadesCronicas][]" required>
                        <option value="">Seleccionar</option>
                        <option value="si">si</option>
                        <option value="no">no</option>
                </select>
            
                <br>
            
                <label>Ultimo control</label>
                <input type="date" name="integrantes[ultimoControl][]" required>
               
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


        


