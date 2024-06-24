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

        $famId = $request->input('famId');

        $encuesta = new encuestas();
        $encuesta->accSalud1 = $request->accSalud1;
        $encuesta->accSalud2 = $request->accSalud2;
        $encuesta->accSalud3 = $request->accSalud3;
        $encuesta->accSalud4 = $request->accSalud4;
        $encuesta->accSalud5 = $request->accSalud5;
        $encuesta->accSalud6 = $request->accSalud6;
        $encuesta->accSalud7 = $request->accSalud7;
        $encuesta->accSalud8 = $request->accSalud8;
        $encuesta->accSalud9 = $request->accSalud9;
        $encuesta->accMental1 = $request->accMental1;
        $encuesta->accMental2 = $request->accMental2;
        $encuesta->prSoysa = $request->prSoysa;
        $encuesta->alimantacion1 = $request->alimantacion1;
        $encuesta->alimentacion2 = $request->alimentacion2;
        $encuesta->alimentacion3 = $request->alimentacion3;
        $encuesta->alimentacion4 = $request->alimentacion4;
        $encuesta->partSocial = $request->partSocial;
        $encuesta->vivienda1 = $request->vivienda1;
        $encuesta->vivienda2 = $request->vivienda2;
        $encuesta->vivienda3 = $request->vivienda3;
        $encuesta->vivienda4 = $request->vivienda4;
        $encuesta->vivienda5 = $request->vivienda5;
        $encuesta->vivienda6 = $request->vivienda6;
        $encuesta->vivienda7 = $request->vivienda7;
        $encuesta->accBas1 = $request->accBas1;
        $encuesta->accBas2 = $request->accBas2;
        $encuesta->accBas3 = $request->accBas3;
        $encuesta->accBas4 = $request->accBas4;

        $encuesta->famId = $famId;
        $encuesta->capId = $request->capId;

        $encuesta->save();

        $familia = familias::find($request->input('famId'));
        $familia->barrioId = $request->input('barrioId');
        $familia->save();

        return redirect()->route('home')->with('success', 'Encuesta creada correctamente');
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
