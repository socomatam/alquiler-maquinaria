@extends('layouts.app')

@section('content')



<div class='alq_contenedor'>
        
        <button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-small"><a href="{{url('/clientes/create')}}">CREAR NUEVA MÁQUINA</a></button>
        
        <table id="com_tabla_id" class="display">
            <thead >
                <tr>
                    <th>ID</th>
                    <th>Complemento</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Estado</th>
                   
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>

                @foreach($complementos as $complemento)
                    <tr data-com_id="{{$complemento->id}}">
                       <td>{{$complemento->id}}</td>
                       <td>{{$complemento->com_complemento}}</td>
                       <td>{{$complemento->com_tipo}}</td>
                       <td>{{$complemento->com_precio}}</td>
                       <td>{{$complemento->com_estado}}</td>
                      
                       <td>Editar</td>
                       <td>Borrarr</td>
                    </tr>      
                @endforeach
                
                
            </tbody>
            <tfoot></tfoot>
        </table> 
    <div>


<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="alq_lista_maquinas"></div>

    </div>
</div>

@endsection