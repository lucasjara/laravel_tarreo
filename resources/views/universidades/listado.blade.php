<?php
/**
 * Created by PhpStorm.
 * User: Lucas Jara
 * Date: 14-10-2017
 * Time: 11:31
 */
?>
@extends('layouts.menu')

@section('content')
    <!-- Ref  CSS-->
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/alinear_tabla.css') }}">
    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Listado de Universidades</div>
                    <div class="panel-body">
                        <table id="university-table" class="table table-striped">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nombre Universidad</td>
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
        <form class="form-horizontal" method="POST" action="{{ route('registro_universidad') }}">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar Universidad</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Nombre:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
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
        <form class="form-horizontal" method="POST" action="{{ route('editar_universidad') }}">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Universidad</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Nombre:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="edit_name" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <input type="hidden" name="id_edit" id="id_modificar" value="" >
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
    <script src="{{ asset('js/universidades/script.js') }}"></script>
@endsection
