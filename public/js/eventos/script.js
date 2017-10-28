$(document).ready(function() {
    $(function () {
        var tabla = $('#event-table').DataTable({
            language:{
                url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: 'http://localhost:8000/eventos/listado',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'year', name: 'year'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    })
    $("#event-table").on('click','tbody > tr > td:nth-child(3) > a.btn.btn-xs.btn-primary.editar_boton', function () {
        var dato = $(this).attr('data-id');
        $('#id_modificar').val(dato);
        $('#edit_name').val($(this).attr('data-name'));
    });
});
