<?php

namespace App\Http\Controllers;
use App\Models\familias;
use App\Models\integrantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IntegranteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
                if ($request->nacionalidad === 'Otro') {
                    $nuevoIntegrante->nacionalidad_otro = $request->input('nacionalidad_otro');
                } else {
                    $nuevoIntegrante->nacionalidad = $request->nacionalidad;
                }

                if ($request->vinculo === 'Otro') {
                    $nuevoIntegrante->vinculo_otro = $request->input('vinculo_otro');
                } else {
                    $nuevoIntegrante->vinculo = $request->vinculo;
                }
                if ($request->progSocial === 'Otros') {
                    $nuevoIntegrante->progSocial_otro = $request->input('progSocial_otro');
                } else {
                    $nuevoIntegrante->progSocial = $request->progSocial;
                }
                $nuevoIntegrante->nivelEduc = $request->nivelEduc;
                $nuevoIntegrante->ocupacion = $request->ocupacion;
                $nuevoIntegrante->progSocial = $request->progSocial;
                $nuevoIntegrante->obraSocial = $request->obraSocial;
                $nuevoIntegrante->gestante = $request->gestante;
                //$nuevoIntegrante->gestante = $request->input('gestante');
                if ($nuevoIntegrante->gestante === 'si') {
                    $nuevoIntegrante->gestacionMeses = $request->input('gestacionMeses');
                } else {
                    $nuevoIntegrante->gestacionMeses = null;
                }
                //$nuevoIntegrante->gestante = $request->gestante;
                //if ($request->gestante === 'si') {
                  //  $nuevoIntegrante->gestacionMeses = $request->input('gestacionMeses');
                //} else {
                //    $nuevoIntegrante->gestacionMeses = null;
                //};

                if(isset($enfermedades)){
                    $nuevoIntegrante->enfermedadesCronicas = implode(',', $enfermedades);
                }else{
                    $nuevoIntegrante->enfermedadesCronicas="Sin enfermedades crónicas";
                };
                $nuevoIntegrante->numCertificado = $request->input('certificado');
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

// Método edit: Recibe famId y lista los integrantes de esa familia.
public function edit($famId)
{
    $familia = familias::find($famId);
    if (!$familia) {
        return redirect()->route('home')->with('error', 'Familia no encontrada.');
    }

    $integrantes = $familia->integrantes;

    $encuesta = $familia->encuesta;

    // Convertir las enfermedades crónicas en arrays
    foreach ($integrantes as $integrante) {
        $integrante->enfermedadesCronicas = explode(',', $integrante->enfermedadesCronicas);
    }

    return view('editintegrantes', [
        'integrantes' => $integrantes,
        'famId' => $famId,
        'encuestaId' => $encuesta->encuestaId
    ]);
}

// Método update: Recibe famId y actualiza los integrantes de la familia.
public function update(Request $request, $famId)
{
    $familia = familias::find($famId);
    if (!$familia) {
        return redirect()->back()->with('error', 'Familia no encontrada');
    }

    foreach ($familia->integrantes as $integrante) {

        $nacionalidad = $request->input('integrantes')[$integrante->intId]['nacionalidad'];
        
        if ($nacionalidad === 'Otro') {
            $nacionalidad_otro = $request->input('integrantes')[$integrante->intId]['nacionalidad_otro'];
        } else {
            $nacionalidad_otro = null;
        }

        $progSocial = $request->input('integrantes')[$integrante->intId]['progSocial'];

        if ($progSocial === 'Otros') {
            $progSocial_otro = $request->input('integrantes')[$integrante->intId]['progSocial_otro'];
        } else {
            $progSocial_otro = null;
        }

        $vinculo = $request->input('integrantes')[$integrante->intId]['vinculo'];

        if ($vinculo === 'Otro') {
            $vinculo_otro = $request->input('integrantes')[$integrante->intId]['vinculo_otro'];
        } else {
            $vinculo_otro = null;
        }

        $gestante = $request->input('integrantes')[$integrante->intId]['gestante'];
        
        if ($gestante === 'si') {
            $gestacionMeses = $request->input('integrantes')[$integrante->intId]['gestacionMeses'];
        } else {
            $gestacionMeses = null;
        }

        if (in_array('con discapacidad', $request->input('integrantes')[$integrante->intId]['enfermedadesCronicas'] ?? [])) {
            $numCertificado = $request->input('integrantes')[$integrante->intId]['certificado'];
        } else {
            $numCertificado = null;
        }

        // Actualizar los campos del integrante, incluyendo nacionalidad_otro si corresponde
        $integrante->update([
            'apellido' => $request->input('integrantes')[$integrante->intId]['apellido'],
            'nombre' => $request->input('integrantes')[$integrante->intId]['nombre'],
            'fechaNac' => $request->input('integrantes')[$integrante->intId]['fechaNac'],
            'estadoDni' => $request->input('integrantes')[$integrante->intId]['estadoDni'],
            'genero' => $request->input('integrantes')[$integrante->intId]['genero'],
            'nacionalidad' => $nacionalidad,
            'nacionalidad_otro' => $nacionalidad_otro,
            'vinculo' => $vinculo,
            'vinculo_otro' => $vinculo_otro,
            'nivelEduc' => $request->input('integrantes')[$integrante->intId]['nivelEduc'],
            'ocupacion' => $request->input('integrantes')[$integrante->intId]['ocupacion'],
            'progSocial' => $progSocial,
            'progSocial_otro' => $progSocial_otro,
            'obraSocial' => $request->input('integrantes')[$integrante->intId]['obraSocial'],
            'enfermedadesCronicas' => isset($request->input('integrantes')[$integrante->intId]['enfermedadesCronicas']) ? implode(',', $request->input('integrantes')[$integrante->intId]['enfermedadesCronicas']) : '',
            'ultimoControl' => $request->input('integrantes')[$integrante->intId]['ultimoControl'],
            'gestante' => $gestante,
            'gestacionMeses' => $gestacionMeses,
            'numCertificado' => $numCertificado,
        ]);
    }

    return redirect()->route('home')->with('success', 'Integrante/s de la familia actualizado/s correctamente');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
            $integrante = integrantes::find($id);
            $integrante->delete();
            return redirect()->back()->with('success', 'el usuario '.$integrante->nombre.' '.$integrante->apellido.' ha sido eliminado');

    }
}