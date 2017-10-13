<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\User;
class UserController extends Controller
{
    public function index(){
        return view('usuarios/listado');
    }
    public function obtener_datos(){
        return DataTables::eloquent(User::query())->make(true);
    }

    /**
     * Metodo para ingreso de Usuarios
     */
    public function insert(Request $request){
        $usuario = new User;
        $usuario->rut =$request->input('rut');
        $usuario->dv = $request->input("dv");
        $usuario->name = $request->input('name');
        $usuario->last_name = $request->input("last_name");
        $usuario->email = $request->input("email");
        $usuario->password = bcrypt($request->input("password"));
        $usuario->save();
        return redirect('usuarios');
    }
    /**
     * Metodo para Eliminar Usuario
     */
    public function delete(Request $request){
        $usuario = User::find($request->input('id'));
        $usuario->delete();
        return redirect('usuarios');
    }
}
