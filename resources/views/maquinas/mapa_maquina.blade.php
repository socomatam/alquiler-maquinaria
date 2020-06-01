@extends('layouts.app')

@section('content')


<h2 class="uk-heading-divider">Localización maquinas</h2>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {
        "packages":["map"],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        "mapsApiKey": "AIzaSyDNYfOAtB08bw-XUtawBFHoV8kAAX6vyhc"
    });
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Lat', 'Long', 'Name'],
          [{{$maquina->maq_latitud}}, {{$maquina->maq_longitud}}, 'Name'],
         
        ]);

        var map = new google.visualization.Map(document.getElementById('map_div'));
        map.draw(data, {
          showTooltip: true,
          showInfoWindow: true,
           enableScrollWheel: true,
           zoomLevel: 10,
        });
      }

      
       
    

    </script>

    <div id="map_div" style="width: 400%; height: 600px"></div>

    <br>
    
    <a href="{{url('/maquinas')}}" class="uk-button uk-button-primary">Volver</a>
    <br>



<style>
    .menu_maq{
        color: #1da1f2 !important;
    }
</style>


@endsection