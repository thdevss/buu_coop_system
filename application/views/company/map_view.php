    <!-- Main content -->
    <main class="main">

      <?php echo $this->breadcrumbs->show(); ?>

      <div class="container-fluid">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  ปักหมุดแผนที่สถานประกอบการ
                </div>
                <div class="card-body">
                  <?php 
                  if($status){
                    echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
                  }
                  
                  if(!$map['latitude'] && !$map['longitude']) {
                    echo '<div class="alert alert-warning">โปรดระบุพิกัดที่ทำงาน</div>';
                  }
                  ?>
                  <div class="row">
                    <div class="col-lg-12">
                      <div id="map" style="width:100%; height:350px;"></div>
                    </div>

                    <div class="col-lg-12 text-center">
                      <div style="height:45px;"></div>

                      <a class="btn btn-lg btn-warning" onclick="getUserLocation()">ดึงพิกัดปัจจุบัน</a>
                      <a class="btn btn-lg btn-primary saveMapBtn">บันทึกแผนที่</a>
                      
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
    <?php if($map['latitude'] && $map['longitude']) { ?>
    renderMap(<?php echo $map['latitude'];?>, <?php echo $map['longitude'];?>)
    <?php } ?>
  }

  function renderMap(latitude, longitude) {
    var uluru = {lat: latitude, lng: longitude};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map,
      draggable: true,
    });
    google.maps.event.addListener(marker, 'dragend', function() {
      geocodePosition(marker.getPosition());
    });
  }

  function geocodePosition(pos) 
  {
        geocoder = new google.maps.Geocoder();
        geocoder.geocode
        ({
            latLng: pos
        }, 
            function(results, status) 
            {
                if (status == google.maps.GeocoderStatus.OK) 
                {
                    console.log(pos.lat())
                    console.log(pos.lng())
                    save_latitude = pos.lat()
                    save_longitude = pos.lng()
                } 
                else 
                {

                }
            }
        );
    }



  function getUserLocation() {
    if (navigator.geolocation) {      
      swal({
        text: "กำลังดึงพิกัดจากผู้ใช้",
        icon: "info",
        showCancelButton: false,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
        button: false
      });
      navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
      swal({
        icon: "error",
        text: "Geolocation is not supported by this browser.",
      });
    }
  }
  var save_latitude, save_longitude

  function showPosition(position) {
    swal.close();
    save_latitude = position.coords.latitude
    save_longitude = position.coords.longitude
    renderMap(position.coords.latitude, position.coords.longitude)
  }

  function showError() {
    swal.close();
    swal({
      icon: "warning",
      text: "โปรดกดให้สิทธิ์ดึงพิกัดบนบราวเซอร์",
    });
  }

  $( ".saveMapBtn" ).click(function() {
    var data = {}
    data['latitude'] = save_latitude
    data['longitude'] = save_longitude

    jQuery.post(SITE_URL+"/company/company_map/ajax_post/", data, function(response) {
        //alert
        swal({
            title: "ปัดหมุดแผนที่สถานประกอบการเรียบร้อย!",
            text: "ทำ",
            icon: "success",
          })
          .then((xxx) => {
            window.location.reload();
          });
    }, 'json');
  })
</script>