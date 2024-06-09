<?php

namespace App\Http\Controllers;

use App\Models\caps;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = Db::table('users')
        ->select('email','userId','password','capId','rol')->paginate(5);
        $caps = caps::all();
        return view('crearusuario', ['usuarios'=>$usuario],['caps'=>$caps]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crearusuario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $usuario = new User();

        $usuario->email =$request->email;
        $usuario->password=$request->password;
        $usuario->rol=$request->rol;
        $usuario->capId=$request->capId;

        $usuario->save();
        /* return response()->noContent() */
        return redirect()->route('usuario.store')->with('success', 'Usuario creado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }
    public function asignar(Request $request)
    {
        if($request->capId === null )
        {
            return redirect()->route('usuario.store')->with('error','Error: debe seleccionar el caps a asginar');
        }else{
            $usuario= user::find($request->userId);
            $usuario->capId=$request->capId;
            $usuario->save();
            return redirect()->route('usuario.store')->with('success', 'usuario '.$request->email.' fue asignado al caps:'.$request->capId.' correctamente');

        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
