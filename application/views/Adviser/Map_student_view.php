<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row">
            <div class="col-lg-4">
                <div class="card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> รายละเอียดนิสิต</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>รหัสนิสิต</p>
                                <ul>
                                    <li><?php echo $student['id']; ?></li>
                                </ul>

                              <p>ชื่อ</p>
                                <ul>
                                    <li><?php echo $student['fullname']; ?></li>
                                </ul>

                              <p>สาขา</p>
                                <ul>
                                    <li><?php echo $department['name']; ?></li>
                                </ul>

                              <p>บริษัท</p>
                                <ul>
                                    <li><?php echo $company['name_th']." (".$company['name_en'].")"; ?></li>
                                </ul>

                            </div>
                        </div>
                  
                    </div>
                </div>
            </div>

                <div class="col-lg-8">
                <div class="card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> พิกัดงาน</div>
                    <div class="card-body">
                        <div class="row">
                           
                                <div id="map" style="height:450px;width:100%;">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>ไม่พบข้อมูล!</strong> แจ้งนิสิตตามรายละเอียดนิสิตด้านซ้ายมือ
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
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
        <?php if($map['site_latitude'] != '' && $map['site_longitude'] != '') { ?>
            genMap({lat: <?php echo $map['site_latitude'];?>, lng: <?php echo $map['site_longitude'];?>})
        <?php } ?>
    }

</script>
