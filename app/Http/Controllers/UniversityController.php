<?php

namespace App\Http\Controllers;

use App\University;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index(){
        return view('universidades/listado');
    }

    public function obtener_datos(){
        $universidad = University::select(['id','name']);
        return DataTables::of($universidad)
            ->addColumn('action', function ($universidad) {
                return '
                <a href=""  data-toggle="modal" data-target="#modal_editar"  data-id="'.$universidad->id.'" data-name="'.$universidad->name.'" class="btn btn-xs btn-primary editar_boton">
                            <i class="glyphicon glyphicon-edit"></i> Editar</a>
                       <a href="'.route('eliminar_universidad',['id' =>$universidad->id]).'" class="btn btn-xs btn-danger">
                            <i class="glyphicon glyphicon-edit"></i> Eliminar</a>';
            })
            ->make(true);
    }
    /**
     * Metodo para ingreso de Competencias
     */
    public function insert(Request $request){
        $universidad = new University;
        $universidad->name = $request->input('name');
        $universidad->save();
        return redirect('universidades');
    }
    /**
     * Metodo para editar Competencia
     */
    public function edit(Request $request){
        $id = $request->input('id_edit');
        $universidad = University::find($id);
        $universidad->name = $request->input('name');
        $universidad->save();
        return redirect('universidades');
    }
    /**
     * Metodo para eliminar Competencia
     */
    public function delete(Request $request){
        $id = $request->input('id');
        $universidad = University::find($id);
        $universidad->delete();
        return redirect('universidades');
    }
}
