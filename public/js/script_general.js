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

    $('#con_tabla_id').DataTable({
        colReorder: true,
        fixedHeader: false,
        responsive: true,
        "pageLength": 15,
        "lengthMenu": [ 10, 15, 20, 25, 50, 75, 100 ],
       
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
        columnDefs: [ { orderable: false, targets: [0,6,7,8,9] }],
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
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on( "change", function(e) {
            
            to.datepicker( "option", "minDate", getDate( this ) );
            
        }),
    to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1
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

    /*
    $( "#guarda_maq" ).click(function(evento) {
        event.preventDefault();
        
        var valor = $( "#val_maquina option:selected" ).val();
        var textoMaquina = $( "#val_maquina option:selected" ).text();
        var textoDescripcion = $( "#alq_descripcion" ).val();
        var fechaDesde = $( "#from" ).val();
        var fechaHasta = $( "#to" ).val();

        console.log(textoDescripcion);
    
        $('.contenedor_maquinas').append(

            `<label class="uk-form-label" for="from">MAQUINA ${contadorMaquinas + 1}</label>
            <div class="caja_maquinas caja${contadorMaquinas+1}">
                <label class="uk-form-label">ID DE CONTRATO</label>
                
                <div class="uk-width-1-4">
                    <input class="uk-input" name="maquina${contadorMaquinas}" type="text" value="${valor}" readonly>
                </div>


                <div class="uk-grid-small uk-child-width-expand@s" uk-grid>
                    <div>
                        <label class="uk-form-label" for="from">DESDE</label>
                        <input class="uk-input" name="from${contadorMaquinas}" type="text" value="${fechaDesde}" readonly>
                    </div>
                    <div>
                        <label class="uk-form-label" for="to">HASTA</label>
                        <input class="uk-input" name="to${contadorMaquinas}" type="text" value="${fechaHasta}" readonly>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="to">DESCRIPCIÓN DEL TRABAJO</label>
                    <textarea name="descripcion${contadorMaquinas}" class="uk-textarea" rows="5">${textoDescripcion}</textarea>
                </div>
                <br>
                

                

                <p>${textoMaquina}</p
                <br>
                <span onclick="borrarMaquina(${contadorMaquinas+1})" id="quitar_maquina" class="uk-button uk-button-danger">QUITAR MÁQUINA</span>
            </div>
            <br>`
        );//fin ocntenedor máquina

        $('#invisible_id').val(contadorMaquinas);
        
        contadorMaquinas++;


        $.ajax({
            url: 'http://localhost/gestion_alquiler_maquinaria/public/cuentas',
            type: 'POST',
            data: {
                
                'id_maquina': valor,
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            success: function(respuesta) {
          
            },//FIN SUCCESS

 
         });//fin ajax
        
    });//fin añadir máquina

    */

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

    
   


} );//fin ready




