<?php

namespace App\Http\Controllers;

use App\Score;
use App\Category;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index(){
        return view('puntajes/listado');
    }

    public function obtener_datos(){

            $resumido = DB::select("SELECT users.name, scores.id, users.last_name,
    (SELECT SUM(scores.score) FROM scores LEFT JOIN categories ON categories.ID = scores.id_category WHERE categories.name='PC' AND scores.id_user=(users.id)) as pc,
    (SELECT SUM(scores.score) FROM scores LEFT JOIN categories ON categories.ID = scores.id_category WHERE categories.name='CONSOLAS' AND scores.id_user=(users.id)) as consolas,
    (SELECT SUM(scores.score) FROM scores LEFT JOIN categories ON categories.ID = scores.id_category WHERE categories.name='FLASH' AND scores.id_user=(users.id)) as flash,
    (SELECT SUM(scores.score) FROM scores LEFT JOIN categories ON categories.ID = scores.id_category WHERE categories.name='TRIVIA' AND scores.id_user=(users.id)) as trivia
        FROM scores
            LEFT JOIN categories ON categories.ID = scores.id_category
            LEFT JOIN users ON users.id = scores.id_user
                GROUP by users.name");
        return DataTables::of($resumido)
            ->addColumn('action', function ($resumido) {
                return '
                <a href=""  data-toggle="modal" data-target="#modal_editar"  data-id="'.$resumido->id.'" data-name="'.$resumido->name.'" class="btn btn-xs btn-primary editar_boton">
                            <i class="glyphicon glyphicon-edit"></i> Editar</a>
                       <a href="'.route('eliminar_puntaje',['id' =>$resumido->id]).'" class="btn btn-xs btn-danger">
                            <i class="glyphicon glyphicon-edit"></i> Eliminar</a>';
            })
            ->make(true);
    }
    /**
     * Metodo para ingreso de Puntajes
     */
    public function insert(Request $request){
        $puntaje = new Score;
        $puntaje->name = $request->input('name');
        $puntaje->save();
        return redirect('puntajes');
    }
    /**
     * Metodo para editar Puntaje
     */
    public function edit(Request $request){
        $id = $request->input('id_edit');
        $puntaje = Score::find($id);
        $puntaje->name = $request->input('name');
        $puntaje->save();
        return redirect('puntajes');
    }
    /**
     * Metodo para eliminar Puntaje
     */
    public function delete(Request $request){
        $id = $request->input('id');
        $puntaje = Score::find($id);
        $puntaje->delete();
        return redirect('puntajes');
    }
}
