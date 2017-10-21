$(document).ready(function() {
    $(function () {
        var tabla = $('#users-table').DataTable({
            language:{
                url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: 'http://localhost:8000/usuarios/listado',
            order: [[ 0,'desc']],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'rut', name: 'rut'},
                {data: 'name', name: 'name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'email', name: 'email'},
                {data: 'age', name: 'age'},
                {data: 'relevant_person', name: 'relevant_person'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]

        });
    })
    $("#users-table").on('click','tbody > tr > td:nth-child(6) > a.btn.btn-xs.btn-primary.editar_boton', function () {
        var dato = $(this).attr('data-id');
        $('#id_modificar').val(dato);
        $('#edit_name').val($(this).attr('data-name'));
        $('#edit_rut').val($(this).attr('data-rut'));
        $('#edit_dv').val($(this).attr('data-dv'));
        $('#edit_last_name').val($(this).attr('data-last-name'));
        $('#edit_email').val($(this).attr('data-email'));
    });
});