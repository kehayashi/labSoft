@extends('template_principal')

@section('conteudo')

<style>
  #map {
    width: 100%;
    height: 50%;
    background-color: grey;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 243px; background-color: white;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-map-o"></i> Dashboard
      <small>propriedades</small>
    </h1>
  </section>
  <!-- end section -->

  <!-- Main content -->
  <section class="content">
    @if(isset($cadastrado))
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Propriedade de CODIGO: {{ $cod_prop }}, cadastrada com sucesso!</h4>
              </div>
              <!-- end alert -->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    @endif

    @if(isset($alterado))
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Propriedade de CODIGO: {{ $cod_prop }}, alterada com sucesso!</h4>
              </div>
              <!-- end alert -->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    @endif

    <div class="row">
      <div class="col-md-6">
        <div class="info-box bg-yellow">
            <span class="info-box-icon">{{ $countPropSantiago }}</span>
            <div class="info-box-content">
              <span class="info-box-text">Propriedades cadastradas em</span>
              <span class="info-box-number">Santiago</span>
            </div>
            <!-- end info-box-content -->
        </div>
        <!-- end info boz -->
      </div>
      <div class="col-md-6">
        <div class="info-box bg-red">
            <span class="info-box-icon">{{ $countPropSantamaria }}</span>
            <div class="info-box-content">
              <span class="info-box-text">Propriedades cadastradas em</span>
              <span class="info-box-number">Santa Maria</span>
            </div>
            <!-- end info-box-content -->
        </div>
        <!-- end info box -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
      <div class="col-md-12">
        </br/>
        <div id="map"></div><!-- div map -->
      </div>
      <!-- end col-->
    </div>
    <!-- end row -->
  </section>
  <!-- end section -->
  </div>
  <!-- end content -->

  <script type="text/javascript">
    function initMap() {
      var mapDiv = document.getElementById('map');

      var map = new google.maps.Map(mapDiv, {
          center: new google.maps.LatLng(-29.19143, -54.866531),
          zoom: 8,
          //mapTypeId: google.maps.MapTypeId.SATELLITE
      });
    }
  </script>

  <!-- GOOGLE MAPS -->
  <script type="text/javascript">
       $(document).ready(function(){

         var mapDiv = document.getElementById('map');

         $.ajax({
             url: "/dashboard/listaPropriedades",
             type: "GET",
             dataType: "json"
         }).done(function(propriedades) {

           var map = new google.maps.Map(mapDiv, {
             center: new google.maps.LatLng(-29.19143, -54.866531),
             zoom: 9,
             //mapTypeId: google.maps.MapTypeId.SATELLITE
          });

          for(x=0; x<propriedades.length; x++){
               var teste = propriedades[x].st_astext;
               var a = teste.split("(");
               var b = a[1].split(" ");
               var c = b[1].split(")");

               var latitude = c[0];
               var longitude = b[0];

               var LatLong = new google.maps.LatLng(latitude, longitude);

               marker = new google.maps.Marker ({
                 draggable: true,
                 //animation: google.maps.Animation.DROP,
                 position: LatLong,
                 map:map,
                 //icon: image,
                 //label: '' + propriedades[x].cod_prop,
                 title: 'Propriedade: ' + propriedades[x].cod_prop + "\n"
               });

               marker.setMap(map);
             }
         }).fail(function(jqXHR, textStatus) {

         }).always(function() {

         });
       })
  </script>
  <!-- END GOOGLE MAPS -->

  <!-- CHAVE GOOGLE API -->
  <script sync defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQalLzBKBjsXnHcP6ixo87rnHJOv2DaBI&callback=initMap">
  </script>
  <!-- END CHAVE GOOGLE API -->

@stop

<!-- /.content-wrapper -->
