<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">รายการสมัคร ตำแหน่งงาน และสถานประกอบการ</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i> รายการสมัคร ตำแหน่งงาน และสถานประกอบการ
          </div>
            <div class="card-body">
            <!--ส่วนของเลือกเพื่อนกรองคำค้นหา-->
            <div class="row text-center">
             <div class="form-group col-sm-3"></div>
                    <div class="form-group col-sm-3">
                      <label for="ccmonth">บริษัท</label>
                      <select class="form-control" id="" name="">
                      <option>--กรุณาเลือก--</option>
                      <?php foreach($company as $row) {?>
                        <option value=""><?php echo $row['name_th']; ?></option>
                      <?php } ?>
                      </select>
                    </div>

                    <div class="form-group col-sm-3">
                      <label for="ccmonth">ตำแหน่งงาน</label>
                      <select class="form-control" id="" name="">
                        <option>--กรุณาเลือก--</option>
                      <?php foreach($job as $row) {?>
                        <option value=""><?php echo $row['job_title']; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                </div>
                <!--ส่วนของเลือกเพื่อนกรองคำค้นหา-->

                <!--ส่วนของเนื้อหาของการสมัคร-->
                <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  ชื่อบริษัท
                  <span class="badge badge-danger float-right">ตำแหน่งงาน</span>
                </div>
                <div class="card-body">
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex
                  ea commodo consequat.</p>
                  <?php echo anchor('Student/Report_student_info/register_form_company', '<i class="icon-pencil"></i> กรอกใบสมัคร', 'class="btn btn-primary"');?> 
                </div>
                
                <div class="card-footer">
                <span class="badge badge-primary float-right">พื่นที่:</span>
                </div>
              </div>
            </div>
                </div>
                <!--ส่วนของเนื้อหาของการสมัคร-->
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

 
