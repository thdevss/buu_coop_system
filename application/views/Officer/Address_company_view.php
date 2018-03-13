<!-- Breadcrumb -->

<!-- Main content -->
<main class="main">

<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item">จัดการข้อมูลสถานประกอบการ</li>
  <li class="breadcrumb-item active">ที่อยู่สถานประกอบการ</li>
  
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <!--1 box-->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-home"></i> บริษัท <?php echo $tmp['name_th'];?> ( <?php echo $tmp['name_en'];?> )
                    </div>
                    <div class="card-body">
                        <div id="map" style="height:450px;width:100%;"></div>
                             <br>
                             <div class="row">
                                <div class="col-sm-5">
                                    <div class="card-body p-3 clearfix" class="border-(3)" >
                                        <i class="icon-map p-3 font-2xl mr-3 float-left"></i>
                                        <div class="">
                                            ที่อยู่: &nbsp;&nbsp;เลขที่ &nbsp;&nbsp;<?php echo $data['number'];?>&nbsp;&nbsp;อาคาร &nbsp;&nbsp; <?php echo $data['building'];?>&nbsp;&nbsp; ถนน<?php echo $data['road'];?>&nbsp;&nbsp;
                                            เเขวง <?php echo $data['district'];?>&nbsp;&nbsp;เขต<?php echo $data['area'];?>&nbsp;&nbsp;อำเภอ<?php echo $data['area'];?>&nbsp;&nbsp;จังหวัด<?php echo $data['province'];?>&nbsp;&nbsp;<?php echo $data['postal_code'];?>&nbsp;&nbsp;ประเทศไทย
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="card-body p-3 clearfix" class="border-(3)">
                                        <i class="icon-phone p-3 font-2xl mr-3 float-left"></i>
                                        <div class= "text-clearfix font-weight-bold font-xs"><?php echo $contact['telephone'];?></div>
                                        <div class= "text-clearfix font-weight-bold font-xs"><?php echo $contact['email'];?></div>
                                        <div class="text-muted text-clearfix font-weight-bold font-xs"><a href="<?php echo $tmp['website_url'];?>" target="_blank"><?php echo $tmp['website_url'];?></a></div>
                                     </div>
                                </div>
                            </div>     
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