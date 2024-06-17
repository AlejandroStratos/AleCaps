<?php

namespace App\Http\Controllers;

use App\Models\familias;
use App\Models\integrantes;
use Illuminate\Http\Request;

class InteranteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Implementar si es necesario
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($famId)
    {
        return view('integrante', ['famId' => $famId]);
    }

    public function store(Request $request)
{
    $integrantesData = $request->input('integrantes');
    $famId = $request->input('famId');
    // Procesa los datos de los integrantes y guárdalos en la base de datos
    foreach ($integrantesData['apellido'] as $key => $apellido) {
        $nuevoIntegrante = new integrantes();
        $nuevoIntegrante->famId = $famId;
        $nuevoIntegrante->apellido = $apellido;
        $nuevoIntegrante->nombre = $integrantesData['nombre'][$key];
        $nuevoIntegrante->fechaNac = $integrantesData['fechaNac'][$key];
        $nuevoIntegrante->estadoDni = $integrantesData['estadoDni'][$key];
        $nuevoIntegrante->genero = $integrantesData['genero'][$key];
        $nuevoIntegrante->nacionalidad = $integrantesData['nacionalidad'][$key];
        $nuevoIntegrante->vinculo = $integrantesData['vinculo'][$key];
        $nuevoIntegrante->nivelEduc = $integrantesData['nivelEduc'][$key];
        $nuevoIntegrante->ocupacion = $integrantesData['ocupacion'][$key];
        $nuevoIntegrante->progSocial = $integrantesData['progSocial'][$key];
        $nuevoIntegrante->obraSocial = $integrantesData['obraSocial'][$key];
        
        // Verificar y asignar enfermedadesCronicas
    

        if (isset($integrantesData['enfermedadesCronicas'][$key]) && is_array($integrantesData['enfermedadesCronicas'][$key])) {
            $nuevoIntegrante->enfermedadesCronicas = implode(',', $integrantesData['enfermedadesCronicas'][$key]);
        } else {
            $nuevoIntegrante->enfermedadesCronicas = ''; // Asigna un valor predeterminado aquí
        }

        $nuevoIntegrante->ultimoControl = $integrantesData['ultimoControl'][$key];

        try {
            $nuevoIntegrante->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al guardar el integrante: ' . $e->getMessage());
        }

        $nuevoIntegrante->ultimoControl = $integrantesData['ultimoControl'][$key];
    }

    return redirect()->route('encuesta.create', ['famId' => $famId])->with('success', 'Integrantes agregados correctamente');
}


public function update(Request $request, $famId)
{
    // Obtener la familia y sus integrantes
    $familia = familias::find($famId);
    if (!$familia) {
        return redirect()->back()->with('error', 'Familia no encontrada');
    }

    // Lógica para actualizar los integrantes
    foreach ($familia->integrantes as $integrante) {
        $integrante->update([
            'apellido' => $request->input('integrantes')['apellido'][$integrante->intId],
            'nombre' => $request->input('integrantes')['nombre'][$integrante->intId],
            'fechaNac' => $request->input('integrantes')['fechaNac'][$integrante->intId],
            'estadoDni' => $request->input('integrantes')['estadoDni'][$integrante->intId],
            'genero' => $request->input('integrantes')['genero'][$integrante->intId],
            'nacionalidad' => $request->input('integrantes')['nacionalidad'][$integrante->intId],
            'vinculo' => $request->input('integrantes')['vinculo'][$integrante->intId],
            'nivelEduc' => $request->input('integrantes')['nivelEduc'][$integrante->intId],
            'ocupacion' => $request->input('integrantes')['ocupacion'][$integrante->intId],
            'progSocial' => $request->input('integrantes')['progSocial'][$integrante->intId],
            'obraSocial' => $request->input('integrantes')['obraSocial'][$integrante->intId],
            'enfermedadesCronicas' => isset($request->input('integrantes')['enfermedadesCronicas'][$integrante->intId]) ? implode(',', $request->input('integrantes')['enfermedadesCronicas'][$integrante->intId]) : '',

            //'enfermedadesCronicas' => implode(',', $request->input('integrantes')['enfermedadesCronicas'][$integrante->intId]),
            'ultimoControl' => $request->input('integrantes')['ultimoControl'][$integrante->intId],
            // Ajusta los otros campos que deseas actualizar
        ]);
    }

    return redirect()->route('encuesta.create', ['famId' => $famId])->with('success', 'Integrantes actualizados correctamente');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implementar si es necesario
    }
}

