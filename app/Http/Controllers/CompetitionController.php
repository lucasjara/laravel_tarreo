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
        return DataTables::eloquent(Competition::query())->make(true);
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
     * Metodo para eliminar Competencia
     */
    public function delete(Request $request){
        $competencia = Competition::find($request->input('id'));
        $competencia->delete();
        return redirect('competencias');
    }
}
