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
                    <div class="card-header"><i class="fa fa-align-justify"><h3><?php echo $data['latitude'];?></h3> </i></div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group row">
                            <label class="col-md-4 "> <p class="text-center">ละติจุด</p></label>
                                <div class="col-md-8">
                                <p><?php echo $data['latitude'];?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-md-4"> <p class="text-center">ลองติจุด</p></label>
                                <div class="col-md-8">
                                <p><?php echo $data['longitude'];?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-md-4"> <p class="text-center">เลขที่</p></label>
                                <div class="col-md-8">
                                <p><?php echo $data['number'];?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-md-4"> <p class="text-center">อาคาร</p></label>
                                <div class="col-md-8">
                                <p><?php echo $data['building'];?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-md-4"> <p class="text-center">ถนน</p></label>
                                <div class="col-md-8">
                                <p><?php echo $data['road'];?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-md-4"> <p class="text-center">ซอย</p></label>
                                <div class="col-md-8">
                                <p><?php echo $data['alley'];?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-md-4"> <p class="text-center">เเขวง</p></label>
                                <div class="col-md-8">
                                <p><?php echo $data['district'];?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-md-4"> <p class="text-center">อำเภอ</p></label>
                                <div class="col-md-8">
                                <p><?php echo $data['area'];?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-md-4"> <p class="text-center">จังหวัด</p></label>
                                <div class="col-md-8">
                                <p><?php echo $data['province'];?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-md-4"> <p class="text-center">รหัสไปรษณี</p></label>
                                <div class="col-md-8">
                                <p><?php echo $data['postal_code'];?></p>
                                </div>
                            </div>
                        
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
 </div>
 </main>
