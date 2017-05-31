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
      <i class="fa fa-map"></i> Dashboard
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

    <div class="row">
      <div class="col-md-6">
        <div class="info-box bg-yellow">
            <span class="info-box-icon">89</span>
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
            <span class="info-box-icon">53</span>
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


  <!-- GOOGLE MAPS -->
  <script>
      var center = new google.maps.LatLng(-29.721194, -53.719274);

      function initMap() {
         var mapDiv = document.getElementById('map');

         var LatLong = new google.maps.LatLng(-29.72119, -53.219274);
         var LatLong2 = new google.maps.LatLng(-29.32434, -53.319274);
         var LatLong3 = new google.maps.LatLng(-29.74566, -53.419274);
         var LatLong4 = new google.maps.LatLng(-29.23580, -53.519274);
         var LatLong5 = new google.maps.LatLng(-29.09348, -53.619274);
         var LatLong6 = new google.maps.LatLng(-29.35283, -53.719274);

         var map = new google.maps.Map(mapDiv, {
             center: new google.maps.LatLng(-29.72119, -53.719274),
             zoom: 7
         });

           var marker = new google.maps.Marker ({
             position: LatLong,
             map: map,
             title: 'Propriedade'
           });

           var marker = new google.maps.Marker ({
             position: LatLong2,
             map: map,
             title: 'Propriedade'
           });

           var marker2 = new google.maps.Marker ({
             position: LatLong3,
             map: map,
             title: 'Propriedade'
           });

           var marker2 = new google.maps.Marker ({
             position: LatLong4,
             map: map,
             title: 'Propriedade'
           });

           var marker2 = new google.maps.Marker ({
             position: LatLong5,
             map: map,
             title: 'Propriedade'
           });

           var marker2 = new google.maps.Marker ({
             position: LatLong6,
             map: map,
             title: 'Propriedade'
           });

           marker.setMap(map);
     }
  </script>
  <!-- END GOOGLE MAPS -->

  <script sync defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQalLzBKBjsXnHcP6ixo87rnHJOv2DaBI&callback=initMap">
  </script>

@stop

<!-- /.content-wrapper -->
