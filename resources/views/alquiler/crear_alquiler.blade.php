@extends('layouts.app')

@section('content')

    <form class="uk-form-stacked">

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">NOMBRE DE LA EMPRESA</label>
            <select id="cli_select" class="js-example-basic-multiple uk-select" name="" multiple="multiple">
                @foreach($clientes as $cliente)
                    <option value="{{$cliente->cli_nombre_empresa}}">{{$cliente->cli_nombre_empresa}}</option>
                @endforeach
            </select>
        </div>

        <div class="uk-grid-small uk-child-width-expand@s" uk-grid>
            <div>
                <label class="uk-form-label" for="from">DESDE</label>
                <input class="uk-input uk-width-1-2" id="from" name=from type="text" >
            </div>
            <div>
                <label class="uk-form-label" for="from">HASTA</label>
                <input class="uk-input uk-width-1-2" id="to" name=to type="text" >
            </div>
        </div>

        

        

    </form>







    










@endsection