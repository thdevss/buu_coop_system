    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <?php echo $this->breadcrumbs->show(); ?>

      <div class="container-fluid">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  แผนที่
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <div id="map" style="width:100%; height:600px;"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          </div>  
        </div>

      </div>
      <!-- /.conainer-fluid -->
    </main>



<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcah51LjCiIIFTqdekv78MHZvqT2NpCLo&callback=initMap"></script>
    
<script>
function initMap() {
    var locations = [
        <?php 
        if( count($company) > 0 ) {
          foreach($company as $row) {
            echo '["'.$row['company_name_th'].'", '.$row['map']['company_address_latitude'].', '.$row['map']['company_address_longitude'].', "'.$row['pin_color'].'", "'.$row['message'].'"],';
          } 
        }
        ?>
      
    ];

    bounds  = new google.maps.LatLngBounds();

    var map = new google.maps.Map(document.getElementById('map'), {
      // zoom: 20,
      center: new google.maps.LatLng(13.736717, 100.523186),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|'+locations[i][3]
        });
        loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
        bounds.extend(loc);

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            //get company data from ajax
            infowindow.setContent("สถานประกอบการ: <b>"+locations[i][0]+"</b><br>"+locations[i][4]);
            infowindow.open(map, marker);
        }
      })(marker, i));
    }
    map.fitBounds(bounds);
    map.panToBounds(bounds);
}
</script>