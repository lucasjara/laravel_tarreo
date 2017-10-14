<?php

namespace App\Http\Controllers;

use App\Profile;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('perfiles/listado');
    }

    public function obtener_datos(){
        $perfil = Profile::select(['id','name']);
        return DataTables::of($perfil)
            ->addColumn('action', function ($perfil) {
                return '
                <a href=""  data-toggle="modal" data-target="#modal_editar"  data-id="'.$perfil->id.'" data-name="'.$perfil->name.'" class="btn btn-xs btn-primary editar_boton">
                            <i class="glyphicon glyphicon-edit"></i> Editar</a>
                       <a href="'.route('eliminar_perfil',['id' =>$perfil->id]).'" class="btn btn-xs btn-danger">
                            <i class="glyphicon glyphicon-edit"></i> Eliminar</a>';
            })
            ->make(true);
    }
    /**
     * Metodo para ingreso de Perfiles
     */
    public function insert(Request $request){
        $perfil = new Profile;
        $perfil->name = $request->input('name');
        $perfil->save();
        return redirect('perfiles');
    }
    /**
     * Metodo para editar Perfil
     */
    public function edit(Request $request){
        $id = $request->input('id_edit');
        $perfil = Profile::find($id);
        $perfil->name = $request->input('name');
        $perfil->save();
        return redirect('perfiles');
    }
    /**
     * Metodo para eliminar Perfil
     */
    public function delete(Request $request){
        $id = $request->input('id');
        $perfil = Profile::find($id);
        $perfil->delete();
        return redirect('perfiles');
    }
}
