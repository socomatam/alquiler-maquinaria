$(document).ready( function () {
    $('#alq_tabla_id').DataTable({
        colReorder: true,
        fixedHeader: false,
        "pageLength": 15,
        "lengthMenu": [ 10, 15, 20, 25, 50, 75, 100 ],
        "order": [[ 3, "desc" ]],
        columnDefs: [ { orderable: false, targets: [0] }],
        language:{
            "decimal":        "",
            "emptyTable":     "No hay datos disponibles",
            "info":           "Mostrando de _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty":      "Mostrando de 0 a 0 de 0 entries",
            "infoFiltered":   "(filtrado de un total de _MAX_ entries)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrando _MENU_ entradas",
            "loadingRecords": "Cargando...",
            "processing":     "Procesanso...",
            "search":         "Buscar:",
            "zeroRecords":    "No se han encotrado registro.",
            "paginate": {
                "first":      "Primero",
                "last":       "último",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        },
        
    });
} );