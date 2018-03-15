<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">แจ้งพิกัดงาน</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> แจ้งพิกัดงาน</div>
                    <div class="card-body">
                        <div id="alert_bar">
                        <?php 
                            if($status){
                            echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
                            }
                        ?>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                              <div id="map" style="height:450px;width:100%;"></div>
                            </div>
                            
                            <div class="col-md-6">
                                <form action="<?php echo site_url('Coop_student/Workplace/update');?>" method="post">
                                    <div class="form-group">
                                      <label class="form-col-form-label" for="">ลาติจูด</label>
                                      <input type="text" class="form-control map_val" id="site_latitude" name="site_latitude" value="<?php echo $map['site_latitude'];?>">
                                    </div>

                                    <div class="form-group">
                                      <label class="form-col-form-label" for="">ลองติจูด</label>
                                      <input type="text" class="form-control map_val" id="site_longitude" name="site_longitude" value="<?php echo $map['site_longitude'];?>">
                                    </div>

                                    <div class="form-group">
                                      <button type="submit" class="btn btn-md btn-success"> บันทึก</button>
                                      <a onclick="get_live_map()" class="btn btn-md btn-warning"> ดึงพิกัดปัจจุบัน</a>     
                                    </div>
                                </form>
                            </div>
                               
                        </div>

                    </div>
                </div>
            </div>    
        </div>       
  </div>
</div>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcah51LjCiIIFTqdekv78MHZvqT2NpCLo&callback=initMap"></script>
<script>
    function genMap(uluru) {
        jQuery("#map").html();
        // var uluru = {lat: lat, lng: lng};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }

    function initMap() {
        var uluru = 
        
        genMap({lat: <?php echo $map['site_latitude'];?>, lng: <?php echo $map['site_longitude'];?>})
    }



    function get_live_map() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
            jQuery("#alert_bar").html('<div class="alert alert-info"><i class="fa fa-spinner fa-spin"></i> โปรดรอสักครู่</div>');
            
        } else {
            jQuery("#alert_bar").html('<div class="alert alert-warning">Geolocation is not supported by this browser.</div>');
        }
    }
    function showPosition(position) {
        jQuery("#alert_bar").html('<div class="alert alert-warning">โปรดกดบันทึก เพื่อเปลี่ยนแปลงค่า</div>');
        
        jQuery("#site_latitude").val(position.coords.latitude)
        jQuery("#site_longitude").val(position.coords.longitude)
        genMap({ lat: position.coords.latitude, lng: position.coords.longitude })
    }

    jQuery(".map_val").change(function(){
        // genMap({ lat: jQuery("#site_latitude").val(), lng: jQuery("#site_longitude").val() })
    })
</script>

