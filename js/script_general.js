$(document).ready( function () {

    var contadorMaquinas = 0;
    //var idFilaAlquiler = 0;


    $('#btn_limpiar').click(function(evento){
        evento.preventDefault();
        $('.formularios div input').val('');
    });//fin botón limpiar

    $('#cli_tabla_id').DataTable({
        colReorder: true,
        fixedHeader: false,
        responsive: false,
        "pageLength": 15,
        "lengthMenu": [ 10, 15, 20, 25, 50, 75, 100 ],
        "order": [[ 0, "asc" ]],
        columnDefs: [ { orderable: false, targets: [7,8] }],
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

    $('#con_tabla_id').DataTable({
        colReorder: true,
        fixedHeader: false,
        responsive: false,
        "pageLength": 15,
        "lengthMenu": [ 10, 15, 20, 25, 50, 75, 100 ],
       
        columnDefs: [ { orderable: false, targets: [1,13,14,16,17] }],
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


   var table = $('#alq_tabla_id').DataTable({
        colReorder: true,
        fixedHeader: false,
        
       
        "pageLength": 15,
        "lengthMenu": [ 10, 15, 20, 25, 50, 75, 100 ],
        "order": [[ 3, "desc" ]],
        columnDefs: [ { orderable: false, targets: [7,8,9,10] }],
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

    $('#maq_tabla_id').DataTable({
        colReorder: true,
        fixedHeader: false,
        "pageLength": 10,
        "lengthMenu": [ 10, 15, 20, 25, 50, 75, 100 ],
        "order": [[ 0, "asc" ]],
        columnDefs: [ { orderable: false, targets: [1,13,14,15] }],
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

    $('#com_tabla_id').DataTable({
        colReorder: true,
        fixedHeader: false,
        "pageLength": 15,
        "lengthMenu": [ 10, 15, 20, 25, 50, 75, 100 ],
        "order": [[ 3, "desc" ]],
        columnDefs: [ { orderable: false, targets: [0,] }],
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


    $('#tra_tabla_id').DataTable({
        colReorder: true,
        fixedHeader: false,
        "pageLength": 100,
        "lengthMenu": [ 10, 15, 20, 25, 50, 75, 100 ],
        "order": [[ 3, "desc" ]],
        columnDefs: [ { orderable: false, targets: [0,] }],
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


   


    //Select2
    $('select').select2({
       
    });

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
        dateFormat: 'yy/mm/dd',
    };
    
    $.datepicker.setDefaults($.datepicker.regional['es']);

    var dateFormat = "yy/mm/dd",

    from = $( "#from" )
        .datepicker({
            defaultDate: "+1d",
            changeMonth: true,
            numberOfMonths: 1,
            minDate: 0,
        })
        .on( "change", function(e) {
            
            to.datepicker( "option", "minDate", getDate( this ) );
            
        }),
    to = $( "#to" ).datepicker({
        defaultDate: "+3d",
        changeMonth: true,
        numberOfMonths: 1,
        minDate: 0,
    })
    .on( "change", function(e) {
        from.datepicker( "option", "maxDate", getDate( this ) );
        //e.stopPropagation();
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

   
    //-------------ALQUILER-------------------//


    $('.alq_cancelar').click(function(e){
        e.preventDefault();
        UIkit.modal.confirm('<h3>¿Está seguro que desea cancelar este alquiler?</h3> Si lo que desea es finalizar el alquiler use el botón de FINALIZAR ALQUILER',{
            labels: {
                cancel: 'Cancelar',
                ok: 'Aceptar'
              }
        }).then(function() {
           $('.form_cancelar').submit();
        }, function () {
            
        });

     });//fin cancelar alquiler





    $('.alq_editar').click(function(){
        id = $(this).closest('tr').data();

        var tr = $(this).closest('tr');
        console.log(id.alq_id);
        UIkit.modal('#modal_editar_nombre_empresa').show();

        

        $('#btn_moda_edit_cliente').click(function(){

            var valor = $( "#val_empresa option:selected" ).val();
            
             $.ajax({
                url: 'alquiler/'+id.alq_id,
                method: 'POST',
                data: {
                    _method: 'PUT',
                    'empresa': valor,
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                success: function(respuesta) {

                    //provisional buscar el modo de recargar la tabla
                    window.location.href = 'http://localhost/gestion_alquiler_maquinaria/alquiler';
                },//FIN SUCCESS

     
             });//fin ajax

             $('#modal_editar_nombre_empresa').hide();
            
              $(`this td`).html('ddd');               
         });//fin bontón editar cliente
    
    });//fin click


    $('.borrar_alquiler').click(function(){
        
        var alq_id = $(this).closest('tr').data()['alq_id'];
        var tr = $(this).closest('tr');
        
        UIkit.modal.confirm('¿Está seguro que desea borrar este alquiler?',{
            labels: {
                cancel: 'Cancelar',
                ok: 'Aceptar'
              }
        }).then(function() {
            $.ajax({
                url: 'alquiler/'+alq_id,
                method: 'DELETE',
                data: {
                    _method: 'DELETE',
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                success: function(respuesta) {
                    $(tr).fadeOut();
                    UIkit.notification({message: 'Alquiler borrado con éxito', status: 'success'});

                },//FIN SUCCESS
            });//fin ajax
        }, function () {
            
        });

     });//fin borrar alquiler



    //-----------FIN ALQUILER--------------//

    //-----------CLIENTE-------------------//

    $('.borrar_cliente').click(function(){
        
        var id = $(this).closest('tr').data()['id'];
        var tr = $(this).closest('tr');
        
        UIkit.modal.confirm('¿Está seguro que desea borrar a este cliente?',{
            labels: {
                cancel: 'Cancelar',
                ok: 'Aceptar'
              }
        }).then(function() {
            $.ajax({
                url: 'clientes/'+id,
                method: 'DELETE',
                data: {
                    _method: 'DELETE',
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                success: function(respuesta) {
                    console.log(respuesta);
                    $(tr).fadeOut();
                    UIkit.notification({message: 'Cliente borrado con éxito', status: 'success'});

                },error: function(respuesta){
                    UIkit.notification({message: 'Cliente vinculado a un alquiler, no se puede borrar.', status: 'warning'});
                },
            });//fin ajax
        }, function () {
            
        });

     });//fin borrar cliente

     //---------FIN--CLIENTE-------------------//


     //-----------TRABAJADOR-------------------//

    $('.borrar_trabajador').click(function(){
        
        var id = $(this).closest('tr').data()['id'];
        var tr = $(this).closest('tr');
        
        UIkit.modal.confirm('¿Está seguro que desea borrar a este trabajdor?',{
            labels: {
                cancel: 'Cancelar',
                ok: 'Aceptar'
              }
        }).then(function() {
            $.ajax({
                url: 'trabajadores/'+id,
                method: 'DELETE',
                data: {
                    _method: 'DELETE',
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                success: function(respuesta) {
                    console.log(respuesta);
                    $(tr).fadeOut();
                    UIkit.notification({message: 'Trabajador borrado con éxito', status: 'success'});

                },error: function(respuesta){
                    UIkit.notification({message: 'Trabajador vinculado a un alquiler, no se puede borrar.', status: 'warning'});
                },
            });//fin ajax
        }, function () {
            
        });

     });//fin borrar cliente

     //---------FIN--TRABAJADOR-------------------//



     //-----------MAQUINA-------------------//


     $('.borrar_maquina').click(function(){
        
        var id = $(this).closest('tr').data()['id'];
        var tr = $(this).closest('tr');
        
        UIkit.modal.confirm('¿Está seguro que desea borrar esta máquina?',{
            labels: {
                cancel: 'Cancelar',
                ok: 'Aceptar'
              }
        }).then(function() {
            $.ajax({
                url: 'maquinas/'+id,
                method: 'DELETE',
                data: {
                    _method: 'DELETE',
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                success: function(respuesta) {
                    console.log(respuesta);
                    $(tr).fadeOut();
                    UIkit.notification({message: 'Máquina borrado con éxito', status: 'success'});

                },error: function(respuesta){
                    UIkit.notification({message: 'Máquina vinculado a un alquiler, no se puede borrar.', status: 'warning'});
                },
            });//fin ajax
        }, function () {
            
        });

     });//fin borrar máquina

     $('.maq_editar').click(function(){
        id = $(this).closest('tr').data()['id'];

        var tr = $(this).closest('tr');
        
        UIkit.modal('#modal_editar_estado_maquina').show();

        console.log(id);

        $('#btn_moda_editar_estado_maquina').click(function(){

           
            var texto = $( "#val_estado option:selected" ).text();

            console.log(id);
            
             $.ajax({
                url: 'editarestadoalquiler/',
                method: 'PUT',
                data: {
                    _method: 'PUT',
                    'id': id,
                    'estado': texto,
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                success: function(respuesta) {

                    //provisional buscar el modo de recargar la tabla
                   window.location.href = 'http://localhost/gestion_alquiler_maquinaria/maquinas';
                },//FIN SUCCESS

     
             });//fin ajax
          
         });//fin bontón editar cliente
    
    });//fin click


     //---------FIN--Maquina-------------------//
    
    //------------CONTRATO-------------------//
   
    //-----------FIN CONTRATO ----------------//


} );//fin ready




