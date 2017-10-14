<?php

namespace App\Http\Controllers;

use App\Competition;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index(){
        return view('competencias/listado');
    }

    public function obtener_datos(){
        $competencia = Competition::select(['id','name']);
        return DataTables::of($competencia)
            ->addColumn('action', function ($competencia) {
            return '
                <a href=""  data-toggle="modal" data-target="#modal_editar"  data-id="'.$competencia->id.'" data-name="'.$competencia->name.'" class="btn btn-xs btn-primary editar_boton">
                            <i class="glyphicon glyphicon-edit"></i> Editar</a>
                       <a href="'.route('eliminar_competencia',['id' =>$competencia->id]).'" class="btn btn-xs btn-danger">
                            <i class="glyphicon glyphicon-edit"></i> Eliminar</a>';
        })
            ->make(true);
    }
    /**
     * Metodo para ingreso de Competencias
     */
    public function insert(Request $request){
        $competencia = new Competition;
        $competencia->name = $request->input('name');
        $competencia->save();
        return redirect('competencias');
    }
    /**
     * Metodo para editar Competencia
     */
    public function edit(Request $request){
        $id = $request->input('id_edit');
        $competencia = Competition::find($id);
        $competencia->name = $request->input('name');
        $competencia->save();
        return redirect('competencias');
    }
    /**
     * Metodo para eliminar Competencia
     */
    public function delete(Request $request){
        $id = $request->input('id');
        $competencia = Competition::find($id);
        $competencia->delete();
        return redirect('competencias');
    }
}
