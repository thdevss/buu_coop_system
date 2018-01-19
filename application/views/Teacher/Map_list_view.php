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

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcah51LjCiIIFTqdekv78MHZvqT2NpCLo&callback="></script>
    
<script>

  $( ".viewMapBtn" ).click(function() {
          
    $(".modal-body").html('<div id="map" style="height: 450px;"></div>')
    
    var company_ids = new Array()
    $(':checkbox:checked').each(function(i){
      company_ids.push($(this).val())
    });

    var locations = new Array()
    jQuery.post(SITE_URL+"/teacher/company_map/ajax_post/", { company_id: company_ids }, function(response) {
      jQuery.each( response.data, function( key, val ) {
        locations.push({lat: val.company_address.latitude, lng: val.company_address.longitude, title: val.company.name_th})
      })
      
    }, 'json')

    //render map
    initMap(locations)
        

    $("#view_company_map").modal()


  })






function initMap(locations) {

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: {lat: -28.024, lng: 140.887}
  });

  var markers = locations.map(function(location, i) {
    return new google.maps.Marker({
      position: location,
      label: labels[i % labels.length]
    });
  });

}


    

</script>