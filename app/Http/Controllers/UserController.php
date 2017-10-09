<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\User;
class UserController extends Controller
{
    public function index(){
        return view('usuarios/listado');
    }
    public function obtener_datos(){
        return DataTables::eloquent(User::query())->make(true);
    }
}
