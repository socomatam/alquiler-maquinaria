$(document).ready( function () {

    $('#btn_limpiar').click(function(evento){
        evento.preventDefault();
        $('.formularios div input').val('');
    });//fin botón limpiar

    $('#cli_tabla_id').DataTable({
        colReorder: true,
        fixedHeader: false,
        responsive: true,
        "pageLength": 15,
        "lengthMenu": [ 10, 15, 20, 25, 50, 75, 100 ],
        "order": [[ 0, "asc" ]],
        columnDefs: [ { orderable: false, targets: [] }],
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
        
    });//fin datetable


    $('#alq_tabla_id').DataTable({
        colReorder: true,
        fixedHeader: false,
        "pageLength": 15,
        "lengthMenu": [ 10, 15, 20, 25, 50, 75, 100 ],
        "order": [[ 3, "desc" ]],
        columnDefs: [ { orderable: false, targets: [0,1] }],
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
        
    });//fin datetable

    $('.alq_btn_plus').click(function(){
        var alq_id = $(this).closest('tr').data()['alq_id'];
        

        $.ajax({
			url: 'maquinas_alquiladas/' + alq_id,
            type:'GET',
            success: function(respuesta){
             
                var lista = '<ul>';
                for (const prop in respuesta) {
                    console.log(respuesta[prop].maq_marca);
                    lista = lista + '<li>' + respuesta[prop].maq_marca + '</li>'; 
                }
                lista = lista + '</ul>';

                

                $('.alq_lista_maquinas').html(lista); 

            }, 
		
		});//fin ajax

    });//fin alq btn plus


    /////CREAR CLIENTES////
    $('#cli_btn_crear').click(function(){
        $.ajax({
            url: '/clientes',
            type: 'POST',
        });//fin ajax
    });//fin crear cliente


    //Select2
    $('.js-example-basic-multiple').select2();

    //JQuery UI Datepiker
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
    };
    
    $.datepicker.setDefaults($.datepicker.regional['es']);

    var dateFormat = "mm/dd/yy",

    from = $( "#from" )
        .datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on( "change", function() {
            to.datepicker( "option", "minDate", getDate( this ) );
        }),
    to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1
    })
    .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
    });

  function getDate( element ) {
        var date;
        try {
        date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
        date = null;
        }

        return date;
    }


    //---------------ClIENTES-----------------//

    
    
    


} );//fin ready

