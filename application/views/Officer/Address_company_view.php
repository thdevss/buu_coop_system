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
            <div class="col-md-6">
                <div class="card">
                <div class="card-header"><h5><i class="fa fa-home"> บริษัท <?php echo $tmp['name_th'];?> ( <?php echo $tmp['name_en'];?> )</h5></div></i>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                <label class="col-md-3 "> <b class="text-center">ละติจุด :</b></label>
                                    <div class="col-md-9">
                                    <?php echo $data['latitude'];?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-3"><b class="text-center">ลองติจุด :</b></label>
                                    <div class="col-md-9">
                                    <p><?php echo $data['longitude'];?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-3"> <b class="text-center">เลขที่ :</b></label>
                                    <div class="col-md-9">
                                    <p><?php echo $data['number'];?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-3"> <b class="text-center">อาคาร / ตึก :</b></label>
                                    <div class="col-md-9">
                                    <p><?php echo $data['building'];?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-3"> <b class="text-center">ถนน :</b></label>
                                    <div class="col-md-9">
                                    <p><?php echo $data['road'];?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-3"> <b class="text-center">ซอย :</b></label>
                                    <div class="col-md-9">
                                    <p><?php echo $data['alley'];?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-3"> <b class="text-center">เเขวง / ตำบล:</b></label>
                                    <div class="col-md-9">
                                    <p><?php echo $data['district'];?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-3"> <b class="text-center">เขต / อำเภอ :</b></label>
                                    <div class="col-md-9">
                                    <p><?php echo $data['area'];?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-3"> <b class="text-center">จังหวัด :</b></label>
                                    <div class="col-md-9">
                                    <p><?php echo $data['province'];?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-3"> <b class="text-center">รหัสไปรษณี :</b></label>
                                    <div class="col-md-9">
                                    <p><?php echo $data['postal_code'];?></p>
                                    </div>
                                </div>  
                        </form>    
                    </div><!-- close card  -->
                </div><!-- close card body -->
            </div><!-- close card col-md-6 -->

            <div class="col-md-6">
                <div class="card">
                <div class="card-header"><h5><i class="fa fa-globe"> เเผนที่ ( MAP )</h5></div></i>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
 


                        </form>    
                    </div><!-- close card  -->
                </div><!-- close card body -->
            </div><!-- close card col-md-6 -->



        </div><!-- close row -->
    </div><!-- close animated -->
 </div> <!-- close rocontainerw -->
 
 </main>
