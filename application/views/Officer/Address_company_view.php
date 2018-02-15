<!-- Breadcrumb -->

<!-- Main content -->
<main class="main">

<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">จัดการข้อมูลสถานประกอบการ / ที่อยู่</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <!--1 box-->
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><h5><i class="fa fa-home"> บริษัท <?php echo $tmp['name_th'];?> ( <?php echo $tmp['name_en'];?> )</h5></div></i>
                    <div class="card-body">
                        <div id="map" style="height:450px;width:100%;"></div>
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <br>
                                <div class="card-body p-3 clearfix" class="border-(3)">
                                <i class="icon-location-pin p-3 font-2xl mr-3 float-left"></i>
                                <div class="">ที่อยู่: &nbsp;&nbsp;เลขที่ &nbsp;&nbsp;<?php echo $data['number'];?>&nbsp;&nbsp;อาคาร &nbsp;&nbsp; <?php echo $data['building'];?>&nbsp;&nbsp; ถนน<?php echo $data['road'];?>&nbsp;&nbsp;เเขวง <br>
                                <?php echo $data['district'];?>&nbsp;&nbsp;เขต<?php echo $data['area'];?>&nbsp;&nbsp;อำเภอ<?php echo $data['area'];?>&nbsp;&nbsp;จังหวัด<?php echo $data['province'];?>&nbsp;&nbsp;<?php echo $data['postal_code'];?></div>
                                <div class="text-muted text-uppercase font-weight-bold font-xs">ประเทศไทย</div>
                                </div>

                                <div class="card-body p-3 clearfix">
                                <i class="icon-phone p-3 font-2xl mr-3 float-left"></i>
                                <div class="">
                                <div class="text-muted text-uppercase font-weight-bold font-xs"><?php echo $contact['email'];?></div>
                                <div class="text-muted text-uppercase font-weight-bold font-xs"><?php echo $contact['telephone'];?></div><br>
                                </div>
                                </div>
                            </form>    
                    </div><!-- close card  -->
                </div><!-- close card body -->
            </div><!-- close card col-md-6 -->


        </div><!-- close row -->
    </div><!-- close animated -->
 </div> <!-- close rocontainerw -->
 
 </main>

 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcah51LjCiIIFTqdekv78MHZvqT2NpCLo&callback=initMap"></script>
 <script>
    function initMap() {
        var uluru = {lat: <?php echo $data['latitude'];?>, lng: <?php echo $data['longitude'];?>};
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