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



<button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-small"><a href="{{url('/alquiler/contrato')}}/{{$id}}">AÑADIR UN CONTRATO</a></button>

<table id="con_tabla_id" class="display">
    <thead>
        <tr>
            <th>ID</th>
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
            <th>Ubicación</th>
            <th>Estado</th>


            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>


            

        @foreach($contratos as $contrato)

            @if($contrato->incidencia == 'Con incidencias')
                <tr id="alq_incidencia"  data-id="{{$contrato->id_alquiler}}" >
            @else
                 <tr data-id="{{$contrato->id_alquiler}}">
            @endif
           
            <td >{{$contrato->id}}</td>
            <td>{{$contrato->maq_categoria}}</td>
            <td>{{$contrato->maq_tipo}}</td>
            <td>{{$contrato->maq_marca}}</td>
            <td>{{$contrato->maq_modelo}}</td>
            <td>{{$contrato->maq_largo}} x {{$contrato->maq_ancho}} x {{$contrato->maq_alto}}</td>
            <td>{{$contrato->maq_peso}}kg</td>
            <td>{{$contrato->maq_traslacion}}kg</td>
            <td>{{$contrato->con_precio}}€</td>
            <td class="centrar_celda">{{$contrato->dias}}</td>
            <td>{{$contrato->fecha_inicio}}</td>
            <td>{{$contrato->fecha_final}}</td>
            <td  class="centrar_celda"><a href="{{url('/maquinas')}}/{{$contrato->maquina_id}}" uk-icon="icon: location"></a></td>
            <td>{{$contrato->maq_estado}}</td>


            <td  class="con_editar centrar_celda"><a href="#" uk-icon="icon: file-edit"></a></td>
            <th class="centrar_celda">Borrar</th>

            @endforeach


    </tbody>
    <tfoot></tfoot>
</table>


    <br>
    
    <a href="{{url('/alquiler')}}" class="uk-button uk-button-primary">Volver</a>
    <br>




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



<style>
    .menu_alq{
        color: #1da1f2 !important;
    }
</style>

<script>


    $( document ).ready(function() {
        $('.con_editar').click(function(){
        var idContrato = $(this).closest('tr').data()['id'];

        var id = '{{$contrato->maquina_id}}';

        
        UIkit.modal('#modal_editar_estado_maquina').show();

        console.log(id);

        $('#btn_moda_editar_estado_maquina').click(function(){

           
            var texto = $( "#val_estado option:selected" ).text();

            console.log(id);
            console.log(texto);
            
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
    });
      

</script>

@endsection
