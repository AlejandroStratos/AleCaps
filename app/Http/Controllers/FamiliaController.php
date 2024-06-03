<?php

namespace App\Http\Controllers;

use App\Models\familias;
use Illuminate\Http\Request;

class FamiliaController extends Controller
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
    public function create()
    {
        return view('familia');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'domicilio' => 'required',
        ],
        [
            'domicilio' => 'EL DOMICILIO ES OBLIGATORIO',
        ]
        );

        $familia = new familias();
        $familia->domicilio = $request->domicilio;
        $familia->save();

        // Obtén el ID de la familia recién creada
        $famId = $familia->famId;

        // Redirige a la página para agregar integrantes, pasando el ID de la familia
        return redirect()->route('integrante.create', ['famId' => $famId]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($famId)
    {
        $familia = Familias::find($famId);
        return view('editfamilia', compact('familia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $famId)
    {
        $familia = Familias::find($famId);
        if ($familia) {
            $familia->domicilio = $request->input('domicilio');
            $familia->save();
            return redirect()->route('home')->with('success', 'Domicilio de la familia actualizado correctamente');
        }
        return redirect()->back()->with('error', 'Familia no encontrada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
