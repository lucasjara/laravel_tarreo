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
}
