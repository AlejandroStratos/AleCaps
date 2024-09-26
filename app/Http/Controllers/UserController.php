<?php

namespace App\Http\Controllers;

use App\Models\caps;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Verifica si el usuario autenticado tiene el rol de 'Administrador'
        if (auth()->user()->rol !== 'Administrador') {
        return redirect()->route('home')->with('error', 'No tienes acceso a esta vista');
        } 


        $usuario = Db::table('users')

        ->select('email','userId','nombreusuario','nombre','apellido','password','capId','rol')->paginate(5);

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
        try{


        $usuario = new User();
        $usuario->nombreusuario=$request->nombreusuario;
        $usuario->nombre=$request->nombre;
        $usuario->apellido=$request->apellido;
        $usuario->email =$request->email;
        $usuario->password=$request->password;
        $usuario->rol=$request->rol;
        $usuario->capId=$request->capId;
        $usuario->save();
        /* return response()->noContent() */
        return redirect()->route('usuario.store')->with('success', 'Usuario creado correctamente');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error: asegurese que el nombre del usuario sea unico');
        }

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
    public function edit($userId)
    {
        $editarusuarios = User::find($userId);
        $caps = Caps::all();

        return view('editarusuario', ['editarusuarios'=>$editarusuarios, 'caps'=>$caps]);
       /*  return json_encode($editarusuarios); */
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
    public function update(Request $request, $userId)
    {
        $usuario = User::find($userId);
        $usuario -> nombreusuario = $request->input('nombreusuario');
        $usuario->nombre =$request ->input('nombre');
        $usuario->apellido = $request ->input('apellido');
        $usuario->email = $request ->input('email');
        $usuario->password = $request ->input('password');
        $usuario->rol = $request ->input('rol');
        $usuario->capId=$request->input('capId');
        /* $usuario->userId->input('userId'); */
        $usuario->save();
        return redirect()->Route('usuario.index')->with('success','hecho');//
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $usuarioId)
    {
        $usuario = User::find($usuarioId);
        $usuario->delete();
        return redirect('/usuario')->with('success', 'El usuario se eliminó correctamente');


    }

}
