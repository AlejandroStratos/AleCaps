<?php

namespace App\Http\Controllers;
use App\Models\familias;
use App\Models\integrantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $integrantes = integrantes::where('famId','=',$famId)
        ->paginate(5);
        return view('integrante', ['famId' => $famId,'integrantes'=>$integrantes]);
    }

    public function store(Request $request)

    {
        $enfermedades = $request->input('enfermedadesCronicas');
        $famId = $request->input('famId');
        $campos = $request->all();

        try {
                $nuevoIntegrante = new integrantes();
                $nuevoIntegrante->famId = $famId;
                $nuevoIntegrante->apellido = $request->apellido;
                $nuevoIntegrante->nombre = $request->nombre;
                $nuevoIntegrante->fechaNac = $request->fechaNac;
                $nuevoIntegrante->estadoDni = $request->estadoDni;
                $nuevoIntegrante->genero = $request->genero;
                $nuevoIntegrante->nacionalidad = $request->nacionalidad;
                $nuevoIntegrante->vinculo = $request->vinculo;
                $nuevoIntegrante->nivelEduc = $request->nivelEduc;
                $nuevoIntegrante->ocupacion = $request->ocupacion;
                $nuevoIntegrante->progSocial = $request->progSocial;
                $nuevoIntegrante->obraSocial = $request->obraSocial;
                //verifica que se enviaron enfermedades,sino guarda sin enfermedades crónicas
                if(isset($enfermedades)){
                    $nuevoIntegrante->enfermedadesCronicas = implode(',', $enfermedades);
                }else{
                    $nuevoIntegrante->enfermedadesCronicas="Sin enfermedades crónicas";
                };
                $nuevoIntegrante->numCertificado = $request->input('certificado');
                //$nuevoIntegrante->numCertificado = $request->numCertificado;
                $nuevoIntegrante->ultimoControl = $request->ultimoControl;
                $nuevoIntegrante->save();

                if($request->funcion ==='agregar'){
                    $integrantes = integrantes::where('famId','=',$famId)
                    ->paginate(5);

                    return redirect()->route('integrante.create',['famId'=> $famId])->with(['integrantes'=>$integrantes]);

                }else{
                    return redirect()->route('encuesta.create', ['famId' => $famId])->with('success', 'Integrantes agregados correctamente');
                }



        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al guardar los integrantes: ' . $e->getMessage());

        }
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
            'discapacidad' => isset($request->input('integrantes')['discapacidad'][$integrante->intId]) ? true : false,
            'numCertificado' => $request->input('integrantes')['numCertificado'][$integrante->intId],
            //'enfermedadesCronicas' => implode(',', $request->input('integrantes')['enfermedadesCronicas'][$integrante->intId]),
            'ultimoControl' => $request->input('integrantes')['ultimoControl'][$integrante->intId],
        ]);
    }

    return redirect()->route('encuesta.create', ['famId' => $famId])->with('success', 'Integrantes actualizados correctamente');
}


    public function destroy(string $id)
    {


            $integrante = integrantes::find($id);
            $integrante->delete();
            return redirect()->back()->with('success', 'el usuario '.$integrante->nombre.' '.$integrante->apellido.' ha sido eliminado');


    }
}

