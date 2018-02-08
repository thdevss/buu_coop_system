    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">ระบบสหกิจ</li>
        <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
        <li class="breadcrumb-item active">แผนที่ตั้งบริษัท</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  ปักหมุดแผนที่สถานประกอบการ
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th></th>
                            <th>ชื่อสถานประกอบการ</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($company as $row) { ?>
                          <tr>
                            <td><input type="checkbox" class="form-control selectCompanyMap" name="selectCompanyMap[]" value="<?php echo $row->id;?>"></td>
                            <td><?php echo $row->name_th;?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>

                    <div class="col-lg-12 text-center">
                      <div style="height:45px;"></div>

                      <a class="btn btn-lg btn-primary viewMapBtn">ดูแผนที่สถานประกอบการ</a>
                      
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


<!-- The Modal -->
<div class="modal fade" id="view_company_map">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">แผนที่</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        </div>
        
      </div>
    </div>
  </div>
</div>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcah51LjCiIIFTqdekv78MHZvqT2NpCLo&callback=getCurrentLoc"></script>
    
<script>
var mapCenterLocation
var locations = []

  $( ".viewMapBtn" ).click(function() {
          
    $(".modal-body").html('<div id="map" style="height: 450px;"></div>')
    
    var company_ids = new Array()
    $(':checkbox:checked').each(function(i){
      company_ids.push($(this).val())
    });

    
    jQuery.post(SITE_URL+"/teacher/company_map/ajax_post/", { company_id: company_ids }, function(response) {
      jQuery.each( response.data, function( key, val ) {
        locations.push( [val.company_address.latitude, val.company_address.longitude, val.company.name_th] )
      })
      //render map
     initMap()
        

        $("#view_company_map").modal()
      
    }, 'json')

    


  })


function getCurrentLoc()
{
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      mapCenterLocation = {lat: 13.281085599999999, lng: 100.9241886}
    }
}

function showPosition(position) {
    mapCenterLocation = {lat: position.coords.latitude, lng: position.coords.longitude}
}



function initMap() {

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: mapCenterLocation,
  });

  var infowindow = new google.maps.InfoWindow();

  var marker, i;

  //first is center
  bounds  = new google.maps.LatLngBounds();


  for (i = 0; i < locations.length; i++) {     
    console.log(locations[i])
    
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][0], locations[i][1]),
      map: map,
    });

    var loc = new google.maps.LatLng(locations[i][0], locations[i][1]);
    bounds.extend(loc);

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(locations[i][2]);
        infowindow.open(map, marker);
      }
    })(marker, i));
  }

  $('#view_company_map').on('shown.bs.modal', function () {
      google.maps.event.trigger(map, "resize")
      map.panToBounds(bounds)
      
    }); 

}




</script>