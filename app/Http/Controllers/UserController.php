<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\User;
use App\University;
class UserController extends Controller
{
    public function index(){
        $universidades = DB::select("SELECT id, name from universities");
        return view('usuarios/listado',['universities'=>$universidades]);
    }
    public function obtener_datos(){

        $usuario = User::select(['id','name',DB::raw('CONCAT(rut, "-", dv) AS rut'),'last_name','email','age','relevant_person']);
        //echo $usuario;
        return DataTables::of($usuario)
            ->addColumn('action', function ($usuario) {
                return '
                <a href=""  data-toggle="modal" data-target="#modal_editar"  data-id="'.$usuario->id.'" data-name="'.$usuario->name.'" data-rut="'.$usuario->rut.'" data-dv="'.$usuario->dv.'" data-last-name="'.$usuario->last_name.'" data-email="'.$usuario->email.'" class="btn btn-xs btn-primary editar_boton">
                            <i class="glyphicon glyphicon-edit"></i> Editar</a>
                       <a href="'.route('eliminar_usuario',['id' =>$usuario->id]).'" class="btn btn-xs btn-danger">
                            <i class="glyphicon glyphicon-edit"></i> Eliminar</a>';
            })
            ->make(true);
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
        $usuario->address = $request->input("address");
        $usuario->id_university = $request->input("id_university");
        $usuario->university_course = $request->input("university_course");
        $usuario->age = $request->input("age");
        $usuario->password = bcrypt('123');
        $usuario->id_profile = 2;
        $usuario->save();
        return redirect('usuarios');
    }
    /**
     * Metodo para editar Usuario
     */
    public function edit(Request $request){
        $id = $request->input('id_edit');
        $usuario = User::find($id);
        $usuario->rut =$request->input('rut');
        $usuario->dv = $request->input("dv");
        $usuario->name = $request->input('name');
        $usuario->last_name = $request->input("last_name");
        $usuario->email = $request->input("email");
        $usuario->save();
        return redirect('usuarios');
    }
    /**
     * Metodo para eliminar Competencia
     */
    public function delete(Request $request){
        $id = $request->input('id');
        $usuario = User::find($id);
        $usuario->delete();
        return redirect('usuarios');
    }
}
