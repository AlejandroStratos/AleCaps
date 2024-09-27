<?php

namespace App\Http\Controllers;

use App\Models\encuestas;
use App\Models\familias;
use App\Models\barrios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\EncuestasExportsCollection;
use App\Exports\EncuestasExportsView;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Facades\Excel;

class EncuestaController extends Controller
{

     public function index()
    {
        $encuestas = encuestas::with(['familia', 'barrio'])->get();
        return view('verencuestas', compact('encuestas'));
    }

// EXCEL
    public function view(Request $request)
    {
        // Verifica si el usuario autenticado tiene el rol de 'Administrador'
        if (auth()->user()->rol !== 'Administrador') {
            return redirect()->route('home')->with('error', 'No tienes acceso a esta vista');
        }

        // Validar las fechas, pero hacerlas opcionales
        $request->validate([
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'cap_id' => 'nullable|integer|between:1,13', // Validar entre 1 y 13
        ]);

        // Obtener las fechas del formulario
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
        $capId = $request->input('cap_id');

        // Filtrar encuestas solo si se proporcionan fechas
        $encuestas = Encuestas::with(['familia', 'integrantes', 'user']);

        if ($fechaInicio && $fechaFin) {
            // Filtrar por rango de fechas si se proporcionan
            $encuestas = $encuestas->whereBetween('created_at', [$fechaInicio, $fechaFin]);
        }

        // Aplicar filtro por capId si se proporciona, y evitar filtrar si es "Todos"
        if (!empty($capId)) {
            $encuestas = $encuestas->where('capId', $capId);

            // Verificar si no existe ninguna encuesta con ese capId
            if (!$encuestas->exists()) {
                return redirect()->back()->with('error', 'El capId seleccionado no tiene encuestas.');
            }
        }

        // Obtener las encuestas
        $encuestas = $encuestas->get();

        // Exportar el archivo Excel con los datos filtrados (o todos si no hay fecha)
        return Excel::download(new EncuestasExportsView($encuestas), 'encuestas.xlsx');
    }


//--------------------------------

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
        'alimantacion1' => 'required|string', // Validar que se seleccione "Si" o "No" en alimentación
    ]);

    // Validación condicional: sólo validar 'alimentacion2' si 'alimantacion1' es 'Si'
    if ($request->input('alimantacion1') == 'Si') {
        $request->validate([
            'alimentacion2' => 'required|array|min:1',
        ], [
            'alimentacion2.required' => 'Debes seleccionar al menos una opción en la asistencia alimentaria si elegiste "Sí".',
        ]);
    }

    try {
        // Inicializar variables de validación
        $validatedData = $request->all();

        // Concatenar opciones adicionales a los campos principales
        if ($request->filled('accSalud3_otro')) {
            $validatedData['accSalud3_otro'] = $request->accSalud3_otro;
        }
        if ($request->filled('accSalud4_otro')) {
            $validatedData['accSalud4_otro'] = $request->accSalud4_otro;
        }
        if ($request->filled('accSalud9_otro')) {
            $validatedData['accSalud9_otro'] = $request->accSalud9_otro;
        }
        if ($request->filled('vivienda2_otro')) {
            $validatedData['vivienda2_otro'] = $request->vivienda2_otro;
        }

        $famId = $request->input('famId');

        $encuesta = new encuestas();
        $encuesta->accSalud1 = $validatedData['accSalud1'];
        $encuesta->accSalud2 = $validatedData['accSalud2'];
        $encuesta->accSalud3 = $validatedData['accSalud3'];
        $encuesta->accSalud3_otro = $validatedData['accSalud3_otro'] ?? null;
        $encuesta->accSalud4 = $validatedData['accSalud4'];
        $encuesta->accSalud4_otro = $validatedData['accSalud4_otro'] ?? null;
        $encuesta->accSalud5 = $validatedData['accSalud5'];
        $encuesta->accSalud6 = $validatedData['accSalud6'];
        $encuesta->accSalud7 = $validatedData['accSalud7'];
        $encuesta->accSalud8 = $validatedData['accSalud8'];
        $encuesta->accSalud9 = $validatedData['accSalud9'];
        $encuesta->accSalud9_otro = $validatedData['accSalud9_otro'] ?? null;
        $encuesta->accMental1 = $validatedData['accMental1'];
        $encuesta->accMental2 = $validatedData['accMental2'];
        $encuesta->prSoysa = implode(', ', $request->prSoysa); // Guardar como string separado por comas
        $encuesta->prSoysa_otro = $validatedData['prSoysa_otro'] ?? null;
        $encuesta->alimantacion1 = $validatedData['alimantacion1'];

        if ($request->input('alimantacion1') == 'Si') {
            $encuesta->alimentacion2 = implode(', ', $request->alimentacion2); // Guardar como string separado por comas
        } else {
            $encuesta->alimentacion2 = null; // Si es "No", no guardar opciones
        }

        $encuesta->alimentacion3 = $validatedData['alimentacion3'];
        $encuesta->alimentacion4 = $validatedData['alimentacion4'];
        $encuesta->partSocial = $validatedData['partSocial'];
        $encuesta->vivienda1 = $validatedData['vivienda1'];
        $encuesta->vivienda2 = $validatedData['vivienda2'];
        $encuesta->vivienda2_otro = $validatedData['vivienda2_otro'] ?? null;
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

        $encuesta->userId = Auth::id();
        
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

        $encuesta = encuestas::with('user')->find($encuestaId);
    
        // Cálculo de la edad de los integrantes relacionados a la encuesta
        $edad = DB::table('integrantes')
            ->selectRaw('*,TIMESTAMPDIFF(YEAR,fechaNac, CURDATE()) as edad')
            ->join('familias', 'familias.famId', 'integrantes.famId')
            ->where('familias.famId', '=', $encuesta->famId)
            ->get();
    
        DB::table('integrantes')
            ->join('familias', 'familias.famId', '=', 'integrantes.famId')
            ->where('familias.famId', '=', $encuesta->famId)
            ->update(['edad' => DB::raw('TIMESTAMPDIFF(YEAR, fechaNac, CURDATE())')]);
    
        // Retornar la vista con la encuesta, la edad y el nombre de usuario
        return view('encuestacompleta', [
            'encuesta' => $encuesta,
            'edad' => $edad,
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($encuestaId)
    {
        $encuesta = encuestas::find($encuestaId);


        // Convertir las prSoysa en arrays
        $encuesta->prSoysa = $encuesta->prSoysa ? array_map('trim', explode(',', $encuesta->prSoysa)) : [];

        $encuesta->alimentacion2 = $encuesta->alimentacion2 ? array_map('trim', explode(',', $encuesta->alimentacion2)) : [];



        $barrios = [];

    return view('editencuesta', compact('encuesta', 'barrios'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encuestaId)
    {
        $encuesta = encuestas::find($encuestaId);

        // Validación de los campos
        $request->validate([
            'alimantacion1' => 'required|string',
            'alimentacion2' => $request->input('alimantacion1') == 'Si' ? 'required|array|min:1' : 'nullable',
            'prSoysa' => 'required|array|size:3', // Validar que se seleccionen exactamente 3 opciones
        ], [
            'alimentacion2.required' => 'Debes seleccionar al menos una opción en la asistencia alimentaria si elegiste "Sí".',
            'prSoysa.size' => 'Debes seleccionar exactamente 3 opciones en la pregunta "Problemas sociales y salud".',
        ]);

        // Actualiza los valores de la encuesta con los datos del formulario
        $encuesta->accSalud1 = $request->input('accSalud1');
        $encuesta->accSalud2 = $request->input('accSalud2');
        $encuesta->accSalud3 = $request->input('accSalud3');
        $encuesta->accSalud3_otro = $request->input('accSalud3_otro');
        $encuesta->accSalud4 = $request->input('accSalud4');
        $encuesta->accSalud4_otro = $request->input('accSalud4_otro');
        $encuesta->accSalud5 = $request->input('accSalud5');
        $encuesta->accSalud6 = $request->input('accSalud6');
        $encuesta->accSalud7 = $request->input('accSalud7');
        $encuesta->accSalud8 = $request->input('accSalud8');
        $encuesta->accSalud9 = $request->input('accSalud9');
        $encuesta->accSalud9_otro = $request->input('accSalud9_otro');
        $encuesta->accMental1 = $request->input('accMental1');
        $encuesta->accMental2 = $request->input('accMental2');

        $prSoysaArray = $request->input('prSoysa', []);
        $encuesta->prSoysa = implode(',', array_map('trim', $prSoysaArray));

        if (in_array('Otros', $prSoysaArray)) {
            $encuesta->prSoysa_otro = $request->input('prSoysa_otro', null);
        } else {
            $encuesta->prSoysa_otro = null; // Si no se selecciona "Otros", se deja como null
        }

        $encuesta->alimantacion1 = $request->input('alimantacion1');

        // Manejo condicional del campo alimentacion2 según alimantacion1
        if ($request->input('alimantacion1') == 'Si') {
            $alimentacionArray = $request->input('alimentacion2', []);
            $encuesta->alimentacion2 = implode(',', array_map('trim', $alimentacionArray));
        } else {
            $encuesta->alimentacion2 = null; // Si es "No", se deja como null
        }

        $encuesta->alimentacion3 = $request->input('alimentacion3');
        $encuesta->alimentacion4 = $request->input('alimentacion4');
        $encuesta->partSocial = $request->input('partSocial');
        $encuesta->vivienda1 = $request->input('vivienda1');
        $encuesta->vivienda2 = $request->input('vivienda2');
        $encuesta->vivienda2_otro = $request->input('vivienda2_otro');
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
        $encuesta = encuestas::findOrFail($encuestaId);
        $encuesta->delete();

        return redirect()->route('encuesta.index')->with('success', 'Encuesta eliminada con éxito');
    }


    
}