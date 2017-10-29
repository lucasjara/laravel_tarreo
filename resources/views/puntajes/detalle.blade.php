<?php
/**
 * Created by PhpStorm.
 * User: Lucas Jara
 * Date: 29-10-2017
 * Time: 1:56
 */
?>
@extends('layouts.menu')

@section('content')
    <!-- Ref  CSS-->
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Detalle de {{$name}} en {{$competencia}} el {{$año}}</div>
                    <div class="panel-body">
                        <table id="score-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Categoria</td>
                                <td>Competencia</td>
                                <td>Puntaje</td>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($datos as $dato)
                            <tr>
                                <td>{{$dato->id}}</td>
                                <td>{{$dato->categoria}}</td>
                                <td>{{$dato->nombre}}</td>
                                <td>{{$dato->total}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
    <script src="{{ asset('js/puntajes/detalle.js') }}"></script>
@endsection


