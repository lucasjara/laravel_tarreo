<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    public function index(){
        return view('eventos/listado');
    }

    public function obtener_datos(){
        $evento = Event::select(['id','name']);
        return DataTables::of($evento)
            ->addColumn('action', function ($evento) {
                return '
                <a href=""  data-toggle="modal" data-target="#modal_editar"  data-id="'.$evento->id.'" data-name="'.$evento->name.'" class="btn btn-xs btn-primary editar_boton">
                            <i class="glyphicon glyphicon-edit"></i> Editar</a>
                       <a href="'.route('eliminar_evento',['id' =>$evento->id]).'" class="btn btn-xs btn-danger">
                            <i class="glyphicon glyphicon-edit"></i> Eliminar</a>';
            })
            ->make(true);
    }
    /**
     * Metodo para ingreso de Eventos
     */
    public function insert(Request $request){
        $evento = new Event;
        $evento->name = $request->input('name');
        $evento->save();
        return redirect('competencias');
    }
    /**
     * Metodo para editar Evento
     */
    public function edit(Request $request){
        $id = $request->input('id_edit');
        $evento = Event::find($id);
        $evento->name = $request->input('name');
        $evento->save();
        return redirect('competencias');
    }
    /**
     * Metodo para eliminar Evento
     */
    public function delete(Request $request){
        $id = $request->input('id');
        $evento = Event::find($id);
        $evento->delete();
        return redirect('competencias');
    }
}
