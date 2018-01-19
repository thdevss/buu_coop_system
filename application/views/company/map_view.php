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
                      <a class="btn btn-lg btn-primary">บันทึกแผนที่</a>
                      

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
    var uluru = {lat: <?php echo $map->latitude;?>, lng: <?php echo $map->longitude;?>};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }
</script>