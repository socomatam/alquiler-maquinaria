@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


 <h2 class="uk-heading-divider">Listado contratos
        <span style="float:right;">
            
            <span class="uk-label uk-label-success">VIGENTE</span>
            <span style="background-color:lightgray;"  class="uk-label">FINALIZADO</span>
            <span class="uk-label uk-label-danger">INCIDENCIA</span>
        </span>
    
    
    </h2>



<button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-medium"><a href="{{url('/alquiler/contrato')}}/{{$id}}">AÑADIR UN CONTRATO</a></button>

<table id="con_tabla_id" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th style="width: 5%;">Foto</th>
            <th>Categoria</th>
            <th class="centrar_celda">Tipo</th>
            <th class="centrar_celda">Marca</th>
            <th class="centrar_celda">Modelo</th>
            <th class="centrar_celda">Tamaño</th>
            <th class="centrar_celda">Peso</th>
            <th>Traslacion</th>
            <th class="centrar_celda">Precio</th>
            <th>Días</th>
            <th class="centrar_celda">Inicio</th>
            <th class="centrar_celda">Fin</th>
            <th class="centrar_celda">Complementos</th>
            <th>Ubicación</th>
            <th>Estado</th>


            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>


            

        @foreach($contratos as $contrato)
    
            @if($contrato->fecha_final <= $fechaActual)
                <tr style="background-color: lightgrey"  data-id="{{$contrato->id_alquiler}}" data-maquina_id="{{$contrato->maquina_id}}" data-contrato_id="{{$contrato->id}}">
            @elseif($contrato->incidencia == 'Con incidencias')
                <tr style="background-color: #ff8787"  data-id="{{$contrato->id_alquiler}}" data-maquina_id="{{$contrato->maquina_id}}" data-contrato_id="{{$contrato->id}}">
            @elseif($contrato->fecha_final > $fechaActual) 
                <tr data-id="{{$contrato->id_alquiler}}" style="background-color: lightgreen" data-maquina_id="{{$contrato->maquina_id}}" data-contrato_id="{{$contrato->id}}">
            @endif
                <td >{{$contrato->id}}</td>
                <td><img class="img_hover" src="{{url('image')}}/{{$contrato->imagen}}"></td>
                <td>{{$contrato->maq_categoria}}</td>
                <td>{{$contrato->maq_tipo}}</td>
                <td>{{$contrato->maq_marca}}</td>
                <td>{{$contrato->maq_modelo}}</td>
                <td>{{$contrato->maq_largo}}x{{$contrato->maq_ancho}}x{{$contrato->maq_alto}}</td>
                <td>{{$contrato->maq_peso}}kg</td>
                <td>{{$contrato->maq_traslacion}}kg</td>
                <td>{{$contrato->con_precio}}€</td>
                <td class="centrar_celda">{{$contrato->dias}}</td>
                <td>{{$contrato->fecha_inicio}}</td>
                <td>{{$contrato->fecha_final}}</td>
                <td class="centrar_celda"><a class="carga_complementos" uk-toggle="target: #modal_ver_complemetos"uk-icon="icon: plus-circle; ratio:1.5"></a></a> </td>
                <td  class="centrar_celda"><a href="{{url('/maquinas')}}/{{$contrato->maquina_id}}" uk-icon="icon: location; ratio:1.5"></a></td>
                <td>{{$contrato->maq_estado}}</td>


                <td  class="con_editar centrar_celda"><a href="#" uk-icon="icon: file-edit; ratio:1.5"></a></td>
                <td class="centrar_celda"><a class="" uk-icon="icon: trash; ratio:1.5"></a></td>
            </tr>
            @endforeach


    </tbody>
   
</table>


    <br>
    
    <a href="{{url('/alquiler')}}" class="uk-button uk-button-primary">Volver</a>
    <br>



    <!--MODAL PARA EDITAR ESTADO DE UNA MÁQUINA-->
   <div id="modal_editar_estado_maquina" uk-modal="bg-close:false;">
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">Editar estado de la máquina</h2>
            <div>
                <label class="uk-form-label" for="">Estado de la máquina</label>
                <br>
                <select id="val_estado" class="uk-select" name="nombre_empresa">
                 
                    <option value="Avería">Avería</option>
                    <option value="Alquilada">Alquilada</option>
                    
                </select>
            </div>



            <br>
            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
                <button id="btn_moda_editar_estado_maquina" class="uk-button uk-button-primary " type="button">Guardar</button>
            </p>
        </div>
    </div>

     <!--MODAL PARA VER LOS COMPLEMENTOS DE UNA MÁQUINA -->
   <div id="modal_ver_complemetos" uk-modal="bg-close:false;">
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">Listado de complementos</h2>
            <div class="caja_modal">
                
                
                
            </div>



            <br>
            <p class="uk-text-right">
              
                <button  class="uk-button uk-button-primary uk-modal-close " type="button">Cerrar</button>
            </p>
        </div>
    </div>



<style>
    .menu_alq{
        color: #1da1f2 !important;
    }
</style>

<script>


    $( document ).ready(function() {
        $('.con_editar').click(function(){
        var idContrato = $(this).closest('tr').data()['id'];

        var id = $(this).closest('tr').data()['maquina_id'];

        
        UIkit.modal('#modal_editar_estado_maquina').show();

        console.log(id);

        $('#btn_moda_editar_estado_maquina').click(function(){

           
            var texto = $( "#val_estado option:selected" ).text();

            //console.log(id);
            //console.log(texto);
            
             $.ajax({
                url: '{{url("editarestadoalquiler")}}',
                method: 'PUT',
                data: {
                    _method: 'PUT',
                    'id': id,
                    'estado': texto,
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                success: function(respuesta) {

                    //provisional buscar el modo de recargar la tabla
                  window.location.href = `{{url('/alquiler')}}/${idContrato}`;
                },//FIN SUCCESS

     
             });//fin ajax
          
         });//fin bontón editar cliente
    
    });//fin click

     $('.carga_complementos').click(function(){
       var id = $(this).closest('tr').data()['contrato_id'];

       
        
        $.ajax({
            url: '{{url("complementos")}}/'+ id,
            method: 'GET',
            success: function(respuesta) {
                console.log(respuesta.length);
                var html = `<table class="uk-table uk-table-striped">
                        <thead>
                            <tr>
                                <th>Complemento</th>
                                <th>Tipo</th>
                                <th>Precio</th>
                            </tr>
                         </thead>
                        <tbody>`;

                for(var i = 0; i < respuesta.length; i++){

                html = html + `<tr>
                                    <td>${respuesta[i].com_complemento}</td> 
                                    <td>${respuesta[i].com_tipo}</td>
                                    <td>${respuesta[i].com_precio}€</td>
                                </tr>`;    
                    
                }//fin for

                html = html + `</tbody>
                                </table>`;
                
                $('.caja_modal').html(html);

               // console.log(respuesta);
                
            },//FIN SUCCESS

 
         });//fin ajax
    });//fin carga complemento





    });//fin ready
      

</script>

@endsection
