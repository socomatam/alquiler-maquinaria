@extends('layouts.app')

@section('content')

    <div class='alq_contenedor'>
        <table id="alq_tabla_id" class="display">
            <thead >
                <tr>
                    <th>ID</th>
                    <th>EMPRESA</th>
                    <th>INICIO ALQUILER</th>
                    <th>FIN ALQUILER</th>
                    <th>EMPLEADO</th>
                    <th>MAQUINAS</th>
                    <th>EDITAR</th>
                    <th>DETALLES</th>
                </tr>
            </thead>
            <tbody>

                @foreach($alquiler as $alq)
                    @if($alq->fin <= $fechaActual)
                        <tr data-alq_id="{{$alq->id_alquiler}}" id="alq_pasados">
                            <td>{{$alq->id_alquiler}}</td>
                            <td>{{$alq->empresa}}</td>
                            <td>{{$alq->inicio}}</td>
                            <td>{{$alq->fin}}</td>
                            <th>{{$alq->nombre_trabajador}} {{ $alq->apellido_trabajador_1}} {{ $alq->apellido_trabajador_2}} </th>
                            <th><span href="#modal-center" uk-toggle class="alq_btn_plus" uk-icon="icon: plus-circle"></span> Ver máquinas</th>
                            <td><li><a href="#" uk-icon="icon: file-edit"></a></li></td>
                            <th><span uk-icon="icon: info"></span></th>
                        </tr>
                    @else
                        <tr data-alq_id="{{$alq->id_alquiler}}" id="alq_vigente">
                            <td>{{$alq->id_alquiler}}</td>
                            <td>{{$alq->empresa}}</td>
                            <td>{{$alq->inicio}}</td>
                            <td>{{$alq->fin}}</td>
                            <th>{{$alq->nombre_trabajador}} {{ $alq->apellido_trabajador_1}} {{ $alq->apellido_trabajador_2}}</th>
                            <th><span href="#modal-center" uk-toggle class="alq_btn_plus" uk-icon="icon: plus-circle"></span> Ver máquinas</th>
                            <td><li><a href="#" uk-icon="icon: file-edit"></a></li></td>
                            <th><span uk-icon="icon: info"></span></th>
                        </tr>
                    @endif
                @endforeach
                
                
            </tbody>
        </table> 
    <div>

    <a class="uk-button uk-button-default" href="#modal-center" uk-toggle>Open</a>

<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="a"></div>

    </div>
</div>

@endsection