@extends('layouts.app')

@section('content')

@foreach($contratos as $contrato)
<p>{{$contrato->con_precio}}</p>
@endforeach



@endsection