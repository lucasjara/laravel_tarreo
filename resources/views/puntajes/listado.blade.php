<?php
/**
 * Created by PhpStorm.
 * User: Lucas Jara
 * Date: 14-10-2017
 * Time: 23:08
 */
?>
@extends('layouts.menu')

@section('content')
    <!-- Ref  CSS-->
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel panel-heading">Selecciona Competencia</div>
                    <div class="panel panel-body">
                        <form id="formulario_ajax" method="POST" role="form" class="form-inline">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-2" for="pwd">Competencia:</label>
                                <div class="col-md-6 col-md-offset-2">
                                    <select class="form-control" id="id_event_search" name="id_event">
                                        @foreach ($events as $event)
                                            <option value="{{ $event->id }}"> {{ $event->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <button id="boton_busqueda_ajax" class="btn btn-primary">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Puntaje Total por Participante</div>
                    <div class="panel-body">
                        <table id="score-table" class="table table-striped">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nombre</td>
                                <td>Apellido</td>
                                <td>PC</td>
                                <td>Consolas</td>
                                <td>Trivia</td>
                                <td>Flash</td>
                                <td>Total</td>
                                <td>Detalle</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_agregar" role="dialog">
        <form class="form-horizontal" method="POST" action="{{ route('registro_puntaje') }}">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar Puntaje</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Usuario:</label>
                            <div class="col-sm-7">
                                <select class="form-control" id="select_user" name="id_user">

                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }} {{ $user->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Competencia:</label>
                            <div class="col-sm-7">
                                <select class="form-control" id="select_competition" name="id_category">
                                    @foreach ($competitions as $competition)
                                        <option value="{{ $competition->id }}">{{ $competition->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Puntos:</label>
                            <div class="col-sm-7">
                                <select class="form-control" id="points" name="points">
                                    <option value="3">3 puntos</option>
                                    <option value="5">5 puntos</option>
                                    <option value="10">10 puntos</option>
                                    <option value="15">15 puntos</option>
                                    <option value="20">20 puntos</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Competencia:</label>
                            <div class="col-sm-7">
                                <select class="form-control" id="select_event" name="id_event">
                                    @foreach ($events as $event)
                                        <option value="{{ $event->id }}"> {{ $event->name }}</option>
                                    @endforeach
                                </select>
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
    <div class="modal fade" id="modal_detalle" role="dialog">
        <form class="form-horizontal" method="POST" action="{{ route('editar_competencia') }}">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Competencia</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Nombre:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="edit_name" name="edit_name" value="{{ old('name') }}">
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
    <script src="{{ asset('js/puntajes/script.js') }}"></script>
    <script src="{{ asset('js/puntajes.js') }}"></script>
@endsection

