<?php

namespace App\Http\Controllers;

use App\Score;
use App\Category;
use App\Event;
use App\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        $users = User::all(['id', 'name', 'last_name']);
        $events = Event::all(['id', 'name'])->sortByDesc('id');
        $competencia = DB::table('categories')
            ->join('competitions', 'competitions.id', '=', 'categories.id_competition')
            ->select('categories.id', 'competitions.name')->get();
        return view('puntajes/listado', ['competitions' => $competencia, 'users' => $users, 'events' => $events]);
    }

    /**
     * Obtenemos datos para nuestra tabla a traves de una peticion POST
     */
    public function obtener_datos(Request $request)
    {
        $id = $request->input('id_event');
        $resumido = DB::select("SELECT users.id as identificador, users.name, scores.id, users.last_name, scores.id_event,
    (SELECT SUM(scores.score) FROM scores LEFT JOIN categories ON categories.ID = scores.id_category WHERE categories.name='PC' AND scores.id_user=(users.id) AND scores.id_event=" . $id . ") as pc,
    (SELECT SUM(scores.score) FROM scores LEFT JOIN categories ON categories.ID = scores.id_category WHERE categories.name='CONSOLAS' AND scores.id_user=(users.id) AND scores.id_event=" . $id . ") as consolas,
    (SELECT SUM(scores.score) FROM scores LEFT JOIN categories ON categories.ID = scores.id_category WHERE categories.name='FLASH' AND scores.id_user=(users.id) AND scores.id_event=" . $id . ") as flash,
    (SELECT SUM(scores.score) FROM scores LEFT JOIN categories ON categories.ID = scores.id_category WHERE categories.name='TRIVIA' AND scores.id_user=(users.id) AND scores.id_event=" . $id . ") as trivia
        FROM scores
            LEFT JOIN categories ON categories.ID = scores.id_category
            LEFT JOIN users ON users.id = scores.id_user
              WHERE scores.id_event=" . $id . "
                GROUP by users.name");

        return DataTables::of($resumido)
            ->addColumn('action', function ($resumido) {
                return '
                <a href="' . route('detalle_puntaje', ['id' => $resumido->identificador, 'id_event' => $resumido->id_event]) . '" class="btn btn-xs btn-primary editar_boton">
                            <i class="glyphicon glyphicon-search"></i> Ver Detalle</a>';
            })
            ->make(true);
    }

    /**
     * Obtenemos datos para nuestra tabla a traves de una peticion GET
     * Solamente para carga inicial para este nos trae el ultimo evento ya cargado
     */
    public function obtener_datos_get()
    {
        $resumido = DB::select("SELECT users.id as identificador, users.name, scores.id, users.last_name, scores.id_event,
    (SELECT SUM(scores.score) FROM scores LEFT JOIN categories ON categories.ID = scores.id_category WHERE categories.name='PC' AND scores.id_user=(users.id) AND scores.id_event=(SELECT id FROM events ORDER BY id DESC LIMIT 1)) as pc,
    (SELECT SUM(scores.score) FROM scores LEFT JOIN categories ON categories.ID = scores.id_category WHERE categories.name='CONSOLAS' AND scores.id_user=(users.id) AND scores.id_event=(SELECT id FROM events ORDER BY id DESC LIMIT 1)) as consolas,
    (SELECT SUM(scores.score) FROM scores LEFT JOIN categories ON categories.ID = scores.id_category WHERE categories.name='FLASH' AND scores.id_user=(users.id) AND scores.id_event=(SELECT id FROM events ORDER BY id DESC LIMIT 1)) as flash,
    (SELECT SUM(scores.score) FROM scores LEFT JOIN categories ON categories.ID = scores.id_category WHERE categories.name='TRIVIA' AND scores.id_user=(users.id) AND scores.id_event=(SELECT id FROM events ORDER BY id DESC LIMIT 1)) as trivia
        FROM scores
            LEFT JOIN categories ON categories.ID = scores.id_category
            LEFT JOIN users ON users.id = scores.id_user
            WHERE scores.id_event=(SELECT id FROM events ORDER BY id DESC LIMIT 1)
                GROUP by users.name");

        return DataTables::of($resumido)
            ->addColumn('action', function ($resumido) {
                return '
                <a href="' . route('detalle_puntaje', ['id' => $resumido->identificador, 'id_event' => $resumido->id_event]) . '" class="btn btn-xs btn-primary editar_boton">
                            <i class="glyphicon glyphicon-search"></i> Ver Detalle</a>';
            })
            ->make(true);
    }

    /**
     * Metodo para ingreso de Puntajes
     */
    public function insert(Request $request)
    {
        $puntaje = new Score;
        $puntaje->score = $request->input('points');
        $puntaje->id_user = $request->input('id_user');
        $puntaje->id_category = $request->input('id_category');
        $puntaje->id_event = $request->input('id_event');
        $puntaje->save();
        return redirect('puntajes');
    }

    /**
     * Metodo para editar Puntaje
     */
    public function edit(Request $request)
    {
        $id = $request->input('id_edit');
        $puntaje = Score::find($id);
        $puntaje->name = $request->input('name');
        $puntaje->save();
        return redirect('puntajes');
    }

    /**
     * Metodo para eliminar Puntaje
     */
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $puntaje = Score::find($id);
        $puntaje->delete();
        return redirect('puntajes');
    }

    public function detalle($id, $id_event)
    {
        $sql = "SELECT scores.id,categories.name as categoria ,competitions.name as nombre,scores.score as total,CONCAT(users.name,' ',users.last_name) nombre_completo, events.name nombre_evento, events.year anio 
                  FROM `scores`
                      LEFT JOIN categories ON categories.id = scores.id_category
                      LEFT JOIN competitions ON competitions.id = categories.id_competition
                      LEFT JOIN users ON users.id = scores.id_user
                      LEFT JOIN events ON events.id = scores.id_event
                      WHERE scores.id_user='$id'
                      AND id_event='$id_event';";
        $datos = DB::select($sql);
        return view('puntajes/detalle', ['datos' => $datos, 'name' => $datos[0]->nombre_completo, 'competencia' => $datos[0]->nombre_evento, 'año' => $datos[0]->anio]);
    }

}
