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
                      <div id="map" style="width:100%; height:350px;"></div>
                    </div>

                    <div class="col-lg-12 text-center">
                      <div style="height:45px;"></div>

                      <a class="btn btn-lg btn-danger">ยกเลิก</a>
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
    renderMap(<?php echo $map->latitude;?>, <?php echo $map->longitude;?>)
  }

  function renderMap(latitude, longitude) {
    var uluru = {lat: latitude, lng: longitude};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }

  $(function() {
    getUserLocation();
  });

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