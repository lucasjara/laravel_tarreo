$(document).ready(function() {
    $(function () {
        var tabla = $('#category-table').DataTable({
            language:{
                url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: 'http://localhost:8000/categorias/listado',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'competition', name: 'competition', searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    })
    $("#category-table").on('click','tbody > tr > td:nth-child(4) > a.btn.btn-xs.btn-primary.editar_boton', function () {
        var dato = $(this).attr('data-id');
        $('#id_modificar').val(dato);
        $('#select_category_edit').val($(this).attr('data-name'));
        $('#select_competition_edit').val($(this).attr('data-competition'));
    });
});
