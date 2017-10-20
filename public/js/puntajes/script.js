$(document).ready(function() {
    $(function () {
        var tabla = $('#score-table').DataTable({
            language:{
                url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: 'http://localhost:8000/puntajes/listado',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'pc', name: 'pc'},
                {data: 'consolas', name: 'consolas'},
                {data: 'trivia', name: 'trivia'},
                {data: 'flash', name: 'flash'},
                {data: null, render: function ( data, type, row ) {
                    var intVal = function ( data) {
                        return typeof data === 'string' ?
                            data.replace(/[\$,]/g, '')*1 :
                            typeof data === 'number' ?
                                data : 0;
                    };
                    return (intVal(data.pc)+intVal(data.consolas)+intVal(data.trivia)+intVal(data.flash));
                }, name: 'total', searchable: false,orderable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            "footerCallback": function ( tfoot, data, start, end, display) {
                var api = this.api();
                $( api.column( 5 ).footer() ).html(
                    api.column( 5 ).data().reduce( function ( a, b ) {
                        return a + b;
                    }, 0 )
                );
            }
        });
    })
    $("#score-table").on('click','tbody > tr > td:nth-child(3) > a.btn.btn-xs.btn-primary.editar_boton', function () {
        var dato = $(this).attr('data-id');
        $('#id_modificar').val(dato);
        $('#edit_name').val($(this).attr('data-name'));
    });

});