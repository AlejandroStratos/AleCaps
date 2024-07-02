<?php

namespace App\Http\Controllers;

use App\Models\encuestas;
use App\Models\familias;
use App\Models\barrios;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{

     public function index()
    {
        $encuestas = encuestas::with(['familia', 'barrio'])->get();
        return view('verencuestas', compact('encuestas'));
    }

    public function buscarPorDomicilio(Request $request)
    {

        $domicilio = $request->input('domicilio');
        
        // Buscar encuestas por domicilio
        $encuestas = encuestas::join('familias', 'encuestas.famId', '=', 'familias.famId')
            ->where('familias.domicilio', 'LIKE', '%' . $domicilio . '%')
            ->select('encuestas.*', 'familias.domicilio')
            ->with('barrio')
            ->get();

        return view('verencuestas', ['encuestas' => $encuestas]);
    }



 
    public function create($famId)
    {

        $preguntas = encuestas::all();
        return view('encuesta', ['preguntas' => $preguntas, 'famId' => $famId]);


    }

//BARRIOS-------------------------------------------------------------------
    public function getBarriosByCapId($capId)
    {
        $barrios = barrios::where('capId', $capId)->pluck('nombreBarrio', 'barrioId');
        return response()->json($barrios);
    }
//--------------------------------------------------------------------------  

public function store(Request $request)
{
    // Validación de los datos
    $request->validate([
        'prSoysa' => 'required|array|size:3',
        'alimentacion2' => 'required|array|min:1',
    ]);

    try {
        // Inicializar variables de validación
        $validatedData = $request->all();

        // Concatenar opciones adicionales a los campos principales
        if ($request->filled('accSalud3_otro')) {
            $validatedData['accSalud3'] = $request->accSalud3_otro;
        }
        if ($request->filled('accSalud4_otro')) {
            $validatedData['accSalud4'] = $request->accSalud4_otro;
        }
        if ($request->filled('accSalud9_otro')) {
            $validatedData['accSalud9'] = $request->accSalud9_otro;
        }
        if ($request->filled('vivienda2_otro')) {
            $validatedData['vivienda2'] = $request->vivienda2_otro;
        }

        $famId = $request->input('famId');

        $encuesta = new encuestas();
        $encuesta->accSalud1 = $validatedData['accSalud1'];
        $encuesta->accSalud2 = $validatedData['accSalud2'];
        $encuesta->accSalud3 = $validatedData['accSalud3'];
        $encuesta->accSalud4 = $validatedData['accSalud4'];
        $encuesta->accSalud5 = $validatedData['accSalud5'];
        $encuesta->accSalud6 = $validatedData['accSalud6'];
        $encuesta->accSalud7 = $validatedData['accSalud7'];
        $encuesta->accSalud8 = $validatedData['accSalud8'];
        $encuesta->accSalud9 = $validatedData['accSalud9'];
        $encuesta->accMental1 = $validatedData['accMental1'];
        $encuesta->accMental2 = $validatedData['accMental2'];
        $encuesta->prSoysa = implode(', ', $request->prSoysa); // Guardar como string separado por comas
        $encuesta->alimantacion1 = $validatedData['alimantacion1'];
        $encuesta->alimentacion2 = implode(', ', $request->alimentacion2); // Guardar como string separado por comas
        $encuesta->alimentacion3 = $validatedData['alimentacion3'];
        $encuesta->alimentacion4 = $validatedData['alimentacion4'];
        $encuesta->partSocial = $validatedData['partSocial'];
        $encuesta->vivienda1 = $validatedData['vivienda1'];
        $encuesta->vivienda2 = $validatedData['vivienda2'];
        $encuesta->vivienda3 = $validatedData['vivienda3'];
        $encuesta->vivienda4 = $validatedData['vivienda4'];
        $encuesta->vivienda5 = $validatedData['vivienda5'];
        $encuesta->vivienda6 = $validatedData['vivienda6'];
        $encuesta->vivienda7 = $validatedData['vivienda7'];
        $encuesta->accBas1 = $validatedData['accBas1'];
        $encuesta->accBas2 = $validatedData['accBas2'];
        $encuesta->accBas3 = $validatedData['accBas3'];
        $encuesta->accBas4 = $validatedData['accBas4'];
        $encuesta->famId = $famId;
        $encuesta->capId = $request->input('capId');
        
        $encuesta->save();

        $familia = familias::find($famId);
        $familia->barrioId = $request->input('barrioId');
        $familia->save();

        return redirect()->route('home')->with('success', 'Encuesta creada correctamente');
    } catch (\Exception $e) {
        // Manejo de errores
        return redirect()->back()->with('error', 'Ocurrió un error al crear la encuesta: ' . $e->getMessage());
    }
}

    /**
     * Display the specified resource.
     */
    public function show($encuestaId)
    {
        $encuesta = encuestas::find($encuestaId);

        return view('encuestacompleta', ['encuesta' => $encuesta]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($encuestaId)
    {
        $encuesta = encuestas::find($encuestaId);
        return view('editencuesta', ['encuesta' => $encuesta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encuestaId)
    {
        $encuesta = encuestas::find($encuestaId);
        // Actualiza los valores de la encuesta con los datos del formulario
        $encuesta->accSalud1 = $request->input('accSalud1');
        $encuesta->accSalud2 = $request->input('accSalud2');
        $encuesta->accSalud3 = $request->input('accSalud3');
        $encuesta->accSalud4 = $request->input('accSalud4');
        $encuesta->accSalud5 = $request->input('accSalud5');
        $encuesta->accSalud6 = $request->input('accSalud6');
        $encuesta->accSalud7 = $request->input('accSalud7');
        $encuesta->accSalud8 = $request->input('accSalud8');
        $encuesta->accSalud9 = $request->input('accSalud9');
        $encuesta->accMental1 = $request->input('accMental1');
        $encuesta->accMental2 = $request->input('accMental2');
        $encuesta->prSoysa = $request->input('prSoysa');
        $encuesta->alimantacion1 = $request->input('alimantacion1');
        $encuesta->alimentacion2 = $request->input('alimentacion2');
        $encuesta->alimentacion3 = $request->input('alimentacion3');
        $encuesta->alimentacion4 = $request->input('alimentacion4');
        $encuesta->partSocial = $request->input('partSocial');
        $encuesta->vivienda1 = $request->input('vivienda1');
        $encuesta->vivienda2 = $request->input('vivienda2');
        $encuesta->vivienda3 = $request->input('vivienda3');
        $encuesta->vivienda4 = $request->input('vivienda4');
        $encuesta->vivienda5 = $request->input('vivienda5');
        $encuesta->vivienda6 = $request->input('vivienda6');
        $encuesta->vivienda7 = $request->input('vivienda7');
        $encuesta->accBas1 = $request->input('accBas1');
        $encuesta->accBas2 = $request->input('accBas2');
        $encuesta->accBas3 = $request->input('accBas3');
        $encuesta->accBas4 = $request->input('accBas4');
        $encuesta->capId = $request->input('capId');

        // Actualiza los demás campos de la encuesta de manera similar

        $encuesta->save();

        return redirect()->route('home')->with('success', 'Encuesta editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encuestaId)
    {
        // Encuentra la encuesta por su ID
        $encuesta = encuestas::find($encuestaId);
        
        if ($encuesta) {
            // Elimina la encuesta, y Eloquent se encargará de eliminar las relaciones en cascada
            $encuesta->delete();

            // Redirige a la página de listado de encuestas
            return redirect()->route('encuesta.index')->with('success', 'Encuesta eliminada exitosamente.');
        }

        return redirect()->route('encuesta.index')->with('error', 'No se encontró la encuesta.');
    }
}
