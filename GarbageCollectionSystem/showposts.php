<?php
include('connection.php');
require_once "connection.php";
    $select = "SELECT * FROM posts";
    $data = $database->query($select);
    foreach ($data as $key)
                $locations[]=array( 'name'=>'Location Name', 'lat'=>$key['Latitude'], 'lng'=>$key['Longitude'] );
    //}
    /* Convert data to json */
    $markers = json_encode( $locations );
    ?>

    <!DOCTYPE html>
    <html>
      <head>
        <style>
          #map {
            height: 400px;
            width: 100%;
           }
        </style>
      </head>
      <body>
        <h3>My Google Maps Demo</h3>
        <div id="map"></div>

        <script type='text/javascript'>
        <?php
            echo "var markers=$markers;\n";

        ?>

        function initMap() {

            var latlng = new google.maps.LatLng(-33.92, 151.25); // default location
            var myOptions = {
                zoom: 10,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false
            };

            var map = new google.maps.Map(document.getElementById('map'),myOptions);
            var infowindow = new google.maps.InfoWindow(), marker, lat, lng;
            var json=JSON.parse( markers );

            for( var o in json ){

                lat = json[ o ].lat;
                lng=json[ o ].lng;
                name=json[ o ].name;

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat,lng),
                    name:name,
                    map: map
                }); 
                google.maps.event.addListener( marker, 'click', function(e){
                    infowindow.setContent( this.name );
                    infowindow.open( map, this );
                }.bind( marker ) );
            }
        }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH1G1I7QDPfCPTJ-R6rgfFvo3e4cXQtf0&callback=initMap">
        </script>
      </body>
    </html>