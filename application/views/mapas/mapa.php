<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mapa</title>
  <style>
    #map{
      height:400px;
      width:100%;
    }
  </style>
</head>
<body>
  <a href="<?php echo site_url('index.php/Mapas/buscar');?>">buscar </a>
  <h1>Mapa</h1>
  <div id="map"></div>
  <script>
    function initMap(){
      // Opciones de mapa
      var options = {
        zoom:10,
        center:{lat:-36.9777206,lng:-72.331113}
      }

      // carga el amapa
      var map = new google.maps.Map(document.getElementById('map'), options);
      // tomar las coordenadas del usuario
      // usarlas como centro
      // deade hay calcular ruta

      // evento nuevo marcador TODO confirmar direccion y crear ruta
      google.maps.event.addListener(map, 'click', function(event){
        addMarker({coords:event.latLng});
      });

      // Array de markers
      var markers = [
        {
          coords:{lat:-36.81181,lng:-73.036637},
            iconImage:'http://192.168.60.18/Durban2/img/gMap.png',
          content:'<h1>Camilo</h1>'
        },
        {
          coords:{lat:-36.8242902,lng:-73.05437429999999},
            iconImage:'http://192.168.60.18/Durban2/img/gMap.png',
          content:'<h1>Carrera</h1>'
        },
        {
          coords:{lat:-36.8253618,lng:-73.0457995},
            iconImage:'http://192.168.60.18/Durban2/img/gMap.png',
          content: '<h1>Tucapel</h1>'
        },
        {
          coords:{lat:-38.7350831,lng:-72.5881885},
            iconImage:'http://192.168.60.18/Durban2/img/gMap.png',
          content: '<h1>Temuco</h1>'
        },
        {
          coords:{lat:-36.77447,lng:-73.021874},
            iconImage:'http://192.168.60.18/Durban2/img/durMap.png',
          content: '<h1>Durban</h1>'
        }
      ];

      for(var i = 0;i < markers.length;i++){
        addMarker(markers[i]);
      }

      // crear marcador
      function addMarker(props){
        var marker = new google.maps.Marker({
          position:props.coords,
          map:map,
          //icon:props.iconImage
        });

        if(props.iconImage){

          marker.setIcon(props.iconImage);
        }

        if(props.content){
          var infoWindow = new google.maps.InfoWindow({
            content:props.content
          });

          marker.addListener('click', function(){
            infoWindow.open(map, marker);
          });
        }
      }
    }
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfOUnTnnYBgFC8EfxiWok9X0tpq8zoAu4&callback=initMap">
    </script>
</body>
</html>
