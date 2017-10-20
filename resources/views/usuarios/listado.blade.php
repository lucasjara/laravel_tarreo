<?php
/**
 * Created by PhpStorm.
 * User: Lucas Jara
 * Date: 09-10-2017
 * Time: 10:04
 */
?>
@extends('layouts.menu')

@section('content')
    <!-- Ref  CSS-->
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/alinear_tabla.css') }}">
    <div class="container">
        <br>      
        <div class="row">
            <br>
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Listado de Usuarios</div>
                    <div class="panel-body">
                        <table id="users-table" class="table table-striped">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Rut</td>
                                <td>Nombre</td>
                                <td>Apellidos</td>
                                <td>Correo</td>
                                <td>Edad</td>
                                <td>Encargado</td>
                                <td>Acciones</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_agregar" role="dialog">
        <form class="form-horizontal" method="POST" action="{{ route('registro_usuario') }}">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar Usuario a Listado</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="rut">Rut:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="rut" name="rut" value="{{ old('rut') }}">
                            </div>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">-</span>
                                    <input type="text" id="dv" class="form-control" name="dv"
                                           aria-describedby="basic-addon1"
                                           value="{{ old('dv') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Nombres:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Apellidos:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                       value="{{ old('last_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Correo:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="email" name="email"
                                       value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Direccion:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="address" name="address"
                                       value="{{ old('address') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Universidades:</label>
                            <div class="col-sm-7">
                                <select class="form-control" id="select_category" name="id_university">
                                    @foreach ($universities as $university)
                                        <option value="{{ $university->id }}">{{ $university->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Carrera:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="university_course" name="university_course">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Edad:</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="age" name="age">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <button type="reset" class="btn btn-success">Limpiar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal fade" id="modal_editar" role="dialog">
        <form class="form-horizontal" method="POST" action="{{ route('editar_usuario') }}">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Usuario</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="rut">Rut:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="edit_rut" name="rut" value="{{ old('rut') }}">
                            </div>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">-</span>
                                    <input type="text" id="edit_dv" class="form-control" name="dv"
                                           aria-describedby="basic-addon1"
                                           value="{{ old('dv') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Nombre:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="edit_name" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Apellidos:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="edit_last_name" name="last_name"
                                       value="{{ old('last_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Correo:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="edit_email" name="email"
                                       value="{{ old('email') }}">
                            </div>
                        </div>
                        <input type="hidden" name="id_edit" id="id_modificar" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
    <script src="{{ asset('js/usuarios/script.js') }}"></script>
@endsection