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
    <link rel="stylesheet" href="{{ asset('css/categorias/style.css') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br>
                <div class="panel panel-primary">
                    <div class="panel-heading">Listado de Categorias</div>
                    <div class="panel-body">
                        <table id="category-table" class="table table-striped">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Categoria</td>
                                <td>Nombre Competencia</td>
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
        <form class="form-horizontal" method="POST" action="{{ route('registro_categoria') }}">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Vincular Categoria a Competencia</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Categorias:</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="select_category" name="name">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Competencia:</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="select_competition" name="id_competition">
                                    @foreach ($competitions as $competition)
                                        <option value="{{ $competition->id }}">{{ $competition->name }}</option>
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
    <div class="modal fade" id="modal_editar" role="dialog">
        <form class="form-horizontal" method="POST" action="{{ route('editar_categoria') }}">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Categoria</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Categorias:</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="select_category_edit" name="name">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Competencia:</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="select_competition_edit" name="id_competition">
                                    @foreach ($competitions as $competition)
                                        <option value="{{ $competition->id }}">{{ $competition->name }}</option>
                                    @endforeach
                                </select>
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
    <script src="{{ asset('js/categorias/script.js') }}"></script>
@endsection