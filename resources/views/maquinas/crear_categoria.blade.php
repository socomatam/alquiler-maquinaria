@extends('layouts.app')
@section('content')

    @if (count($errors) > 0)
		<div class="ui negative message">
			<i class="close icon"></i>
			<div class="header">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		</div>
    @endif
    
   <h2 class="uk-heading-divider">Añadir nueva categoría</h2>
   <br>

    <h1 class="uk-heading-line uk-text-center"><span>Heading Line</span></h1>

    <form class="formularios" method="POST" action="{{url('/maquinas')}}" class="uk-form-stacked">
        @csrf

       

        <div class="uk-width-1-5@m">
            <label class="uk-form-label" for="maq_peso">Categoría</label>
            <input class="uk-input" id="maq_peso" name="peso" type="number" step=".01" required value={{old("peso")}} >    
        </div>
        <br>
 
        <button  class="uk-button uk-button-primary">Crear nueva categoría</button>
        
    </form>

    
<style>
    .menu_maq{
        color: #1da1f2 !important;
    }
</style>

@endsection

