<?php
/**
 * Created by PhpStorm.
 * User: Psinergia
 * Date: 09-10-2017
 * Time: 10:04
 */
?>
@extends('layouts.menu')

@section('content')
    <!-- Ref  CSS-->
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
    <div class="container">
        <a href="agregar.php" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span
                    class="glyphicon glyphicon-plus"></span>Agregar Usuario</a>
        <div class="row">
            <div class="col-md-11">
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
                                <td>Acciones</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="modal fade" id="myModal" role="dialog">
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
                                        <input type="text" id="dv" class="form-control" name="dv" aria-describedby="basic-addon1"
                                               value="{{ old('dv') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Nombre:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Apellidos:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                           value="{{ old('last_name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Correo:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Contraseña:</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="password" name="password"
                                           value="{{ old('password') }}">
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
    </div>
    <script src="//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"></script>
    <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
    <script>
        $(function () {
            var tabla = $('#users-table').DataTable({
                language:{
                  url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                processing: true,
                serverSide: true,
                ajax: 'http://localhost:8000/usuarios/listado',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'rut', name: 'rut'},
                    {data: 'name', name: 'name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection