@extends('layouts.app')

@section('content')

    <h2 class="uk-heading-divider">Listado complementos<span width="50%"></span>
     <span style="float:right;">
            <!--
            <span class="uk-label uk-label-success">DISPONIBLE</span>
            <span style="background-color:lightgray;"  class="uk-label">ALQUILADA</span>
            <span class="uk-label uk-label-danger">INCIDENCIA</span>
            -->
        </span>


    </h2>

    @if(Session::has('finalizar_registro'))
    <div class="ui success message">
        <i class="close icon"></i>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
             <p>{{Session::get('finalizar_registro')}}</p>
        </div>
       
    </div>
    @endif

      @if(Session::has('editar_registro'))
    <div class="ui success message">
        <i class="close icon"></i>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
             <p>{{Session::get('editar_registro')}}</p>
        </div>
       
    </div>
    @endif


        
        <button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-medium"><a href="{{url('/clientes/create')}}">CREAR NUEVO COMPLEMENTO</a></button>
        
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
                      
                      
                    <td class="centrar_celda"><a " uk-icon="icon: file-edit ; ratio:1"></a></td>
                 


                    @if (Auth::user()->rol == 'admin')
                        <td class="centrar_celda"><a class="" uk-icon="icon: trash ; ratio:1"></a></td>
                    @endif   
                    </tr>      
                @endforeach
                
                
            </tbody>
            <tfoot></tfoot>
        </table> 
   




@endsection