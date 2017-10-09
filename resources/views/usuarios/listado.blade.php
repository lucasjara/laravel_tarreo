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
    <div class="container">
        <div class="row">
            <div class="col-md-10">
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
                                <td>Encargado</td>
                                <td>Num. Encargado</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Listado de Referencias Datatables -->

    <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
    <script>
        $(function() {
            var dato = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'http://localhost:8000/usuarios/listado',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'rut', name: 'rut'},
                    {data: 'name', name: 'name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email', name: 'email'},
                    {data: 'relevant_person', name: 'relevant_person'},
                    {data: 'number_relevant_person', name: 'number_relevant_person'}
                ]
            });
        });
    </script>
@endsection