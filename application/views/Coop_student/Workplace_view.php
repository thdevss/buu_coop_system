<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> แจ้งพิกัดงาน</div>
                    <div class="card-body">
                    <?php 
                        if($status){
                          echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
                        }
                    ?>
                        <div class="row">
                            <div class="col-md-6">
                              <div id="map" style="height:450px;width:100%;"></div>
                            </div>
                            
                            <div class="col-md-6">
                                <form action="<?php echo site_url('Coop_student/Workplace/update');?>" method="post">
                                    <div class="form-group">
                                      <label class="form-col-form-label" for="">ลาติจูด</label>
                                      <input type="text" class="form-control" id="site_longitude" name="site_latitude" value="<?php echo $map['site_latitude'];?>">
                                    </div>

                                    <div class="form-group">
                                      <label class="form-col-form-label" for="">ลองติจูด</label>
                                      <input type="text" class="form-control" id="site_longitude" name="site_longitude" value="<?php echo $map['site_longitude'];?>">
                                    </div>

                                    <div class="form-group">
                                      <button type="submit" class="btn btn-md btn-success"></i> บันทึก</button>
                                      <button type="" class="btn btn-md btn-warning"></i> ดึงพิกัดปัจจุบัน</button>     
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
    function initMap() {
        var uluru = {lat: <?php echo $map['site_latitude'];?>, lng: <?php echo $map['site_longitude'];?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
    </script>

