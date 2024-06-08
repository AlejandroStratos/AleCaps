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
                <!-- Por ejemplo, para accsalud1 sería algo como -->
                <div class="form-group">
                    <label for="accSalud1">Tenes baño?</label>
                    <select name="accSalud1" id="accSalud1" class="form-control">
                        <option value="si" {{ $encuesta->accSalud1 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accSalud1 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accSalud2">Tenes baño?</label>
                    <select name="accSalud2" id="accSalud2" class="form-control">
                        <option value="si" {{ $encuesta->accSalud2 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accSalud2 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accSalud3">Tenes baño?</label>
                    <select name="accSalud3" id="accSalud3" class="form-control">
                        <option value="si" {{ $encuesta->accSalud3 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accSalud3 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accSalud4">Tenes baño?</label>
                    <select name="accSalud4" id="accSalud4" class="form-control">
                        <option value="si" {{ $encuesta->accSalud4 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accSalud4 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accSalud5">Tenes baño?</label>
                    <select name="accSalud5" id="accSalud5" class="form-control">
                        <option value="si" {{ $encuesta->accSalud5 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accSalud5 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accSalud6">Tenes baño?</label>
                    <select name="accSalud6" id="accSalud6" class="form-control">
                        <option value="si" {{ $encuesta->accSalud6 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accSalud6 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accSalud7">Tenes baño?</label>
                    <select name="accSalud7" id="accSalud7" class="form-control">
                        <option value="si" {{ $encuesta->accSalud7 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accSalud7 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accSalud8">Tenes baño?</label>
                    <select name="accSalud8" id="accSalud8" class="form-control">
                        <option value="si" {{ $encuesta->accSalud8 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accSalud8 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accSalud9">Tenes baño?</label>
                    <select name="accSalud9" id="accSalud9" class="form-control">
                        <option value="si" {{ $encuesta->accSalud9 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accSalud9 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accMental1">Tenes baño?</label>
                    <select name="accMental1" id="accMental1" class="form-control">
                        <option value="si" {{ $encuesta->accMental1 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accMental1 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accMental2">Tenes baño?</label>
                    <select name="accMental2" id="accMental2" class="form-control">
                        <option value="si" {{ $encuesta->accMental2 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accMental2 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="prSoysa">Tenes baño?</label>
                    <select name="prSoysa" id="prSoysa" class="form-control">
                        <option value="si" {{ $encuesta->prSoysa === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->prSoysa === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alimantacion1">Tenes baño?</label>
                    <select name="alimantacion1" id="alimantacion1" class="form-control">
                        <option value="si" {{ $encuesta->alimantacion1 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->alimantacion1 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alimentacion2">Tenes baño?</label>
                    <select name="alimentacion2" id="alimentacion2" class="form-control">
                        <option value="si" {{ $encuesta->alimentacion2 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->alimentacion2 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alimentacion3">Tenes baño?</label>
                    <select name="alimentacion3" id="alimentacion3" class="form-control">
                        <option value="si" {{ $encuesta->alimentacion3 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->alimentacion3 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alimentacion4">Tenes baño?</label>
                    <select name="alimentacion4" id="alimentacion4" class="form-control">
                        <option value="si" {{ $encuesta->alimentacion4 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->alimentacion4 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="partSocial">Tenes baño?</label>
                    <select name="partSocial" id="partSocial" class="form-control">
                        <option value="si" {{ $encuesta->partSocial === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->partSocial === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vivienda1">Tenes baño?</label>
                    <select name="vivienda1" id="vivienda1" class="form-control">
                        <option value="si" {{ $encuesta->vivienda1 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->vivienda1 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vivienda2">Tenes baño?</label>
                    <select name="vivienda2" id="vivienda2" class="form-control">
                        <option value="si" {{ $encuesta->vivienda2 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->vivienda2 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vivienda3">Tenes baño?</label>
                    <select name="vivienda3" id="vivienda3" class="form-control">
                        <option value="si" {{ $encuesta->vivienda3 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->vivienda3 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vivienda4">Tenes baño?</label>
                    <select name="vivienda4" id="vivienda4" class="form-control">
                        <option value="si" {{ $encuesta->vivienda4 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->vivienda4 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vivienda5">Tenes baño?</label>
                    <select name="vivienda5" id="vivienda5" class="form-control">
                        <option value="si" {{ $encuesta->vivienda5 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->vivienda5 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vivienda6">Tenes baño?</label>
                    <select name="vivienda6" id="vivienda6" class="form-control">
                        <option value="si" {{ $encuesta->vivienda6 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->vivienda6 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vivienda7">Tenes baño?</label>
                    <select name="vivienda7" id="vivienda7" class="form-control">
                        <option value="si" {{ $encuesta->vivienda7 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->vivienda7 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accBas1">Tenes baño?</label>
                    <select name="accBas1" id="accBas1" class="form-control">
                        <option value="si" {{ $encuesta->accBas1 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accBas1 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accBas2">Tenes baño?</label>
                    <select name="accBas2" id="accBas2" class="form-control">
                        <option value="si" {{ $encuesta->accBas2 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accBas2 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accBas3">Tenes baño?</label>
                    <select name="accBas3" id="accBas3" class="form-control">
                        <option value="si" {{ $encuesta->accBas3 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accBas3 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="accBas4">Tenes baño?</label>
                    <select name="accBas4" id="accBas4" class="form-control">
                        <option value="si" {{ $encuesta->accBas4 === 'si' ? 'selected' : '' }}>Sí</option>
                        <option value="no" {{ $encuesta->accBas4 === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="capId">CAP ID</label>
                    <select name="capId" id="capId" class="form-control">
                        <option value="1" {{ $encuesta->capId === '1' ? 'selected' : '' }}>1</option>
                    </select>
                </div>





                <!-- ... Agrega los demás campos con la lógica similar -->

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>

@endsection
