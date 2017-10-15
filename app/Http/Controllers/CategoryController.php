<?php

namespace App\Http\Controllers;
use App\Category;
use App\Competition;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = DB::select("SELECT DISTINCT name from categories");
        $competencia = DB::select('SELECT id, name from competitions');
        return view('categorias/listado',['categories' => $categories,'competitions'=>$competencia]);
    }

    public function obtener_datos(){
        $categoria = DB::table('categories')->join('competitions', 'competitions.id', '=', 'categories.id_competition')
                    ->select('categories.id', 'categories.name', 'competitions.name as competition','competitions.id as ide');
        return DataTables::of($categoria)
            ->addColumn('action', function ($categoria) {
                return '
                <a href=""  data-toggle="modal" data-target="#modal_editar"  data-id="'.$categoria->id.'" data-name="'.$categoria->name.'" data-competition="'.$categoria->ide.'" class="btn btn-xs btn-primary editar_boton">
                            <i class="glyphicon glyphicon-edit"></i> Editar</a>
                       <a href="'.route('eliminar_categoria',['id' =>$categoria->id]).'" class="btn btn-xs btn-danger">
                            <i class="glyphicon glyphicon-edit"></i> Eliminar</a>';
            })
            ->make(true);
    }
    /**
     * Metodo para ingreso de Competencias
     */
    public function insert(Request $request){
        $categoria = new Category();
        $categoria->name = $request->input('name');
        $categoria->id_competition = $request->input('id_competition');
        $categoria->save();
        return redirect('categorias');
    }
    /**
     * Metodo para editar Competencia
     */
    public function edit(Request $request){
        $id = $request->input('id_edit');
        $categoria = Category::find($id);
        $categoria->name = $request->input('name');
        $categoria->id_competition = $request->input('id_competition');
        $categoria->save();
        return redirect('categorias');
    }
    /**
     * Metodo para eliminar Competencia
     */
    public function delete(Request $request){
        $id = $request->input('id');
        $categoria = Category::find($id);
        $categoria->delete();
        return redirect('categorias');
    }
}
