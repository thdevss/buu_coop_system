<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show() ;?>


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
                      <option value="0">--ทั้งหมด--</option>
                      <?php foreach($company as $row) {?>
                        <option value="<?php echo $row['id'];?>"><?php echo $row['name_th']; ?></option>
                      <?php } ?>
                      </select>
                    </div>

                    <div class="form-group col-sm-3">
                      <label for="ccmonth">ตำแหน่งงาน</label>
                      <select class="form-control" id="" name="">
                        <option>--กรุณาเลือก--</option>
                        <option value="0">--ทั้งหมด--</option>
                      <?php foreach($job as $row) {?>
                        <option value="<?php echo $row['job_title_id'];?>"><?php echo $row['job_title']; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                </div>
                <!--ส่วนของเลือกเพื่อนกรองคำค้นหา-->

                <!--ส่วนของเนื้อหาของการสมัคร-->
                <div class="row">
                <div class="col-sm-3"></div>
                  <?php foreach($data as $row) {?>
                    <div class="col-sm-12">
                      <div class="card">

                        <div class="card-header"><i class="fa fa-building"></i> ชื่อบริษัท: <?php echo $row['company_name'][0]['name_th'];?>
                          <span class="btn btn-danger float-right">ตำแหน่งงาน: <?php echo $row['company_job_position']['position_title'];?></span>
                        </div>
                          <div class="card-body">
                            <p>รายละเอียด: <?php echo $row['company_job_position']['job_description'];?></p>
                            <p>ลักษณะบริษัท: <?php echo $row['company_name'][0]['company_type'];?></p>                            
                            <p>เริ่มทำงาน: <?php echo $row['company_name'][0]['work_start_time'];?>-<?php echo $row['company_name'][0]['work_end_time'];?></p>
                            <p>เว็ปไซต์:  <a href="<?php echo $row['company_name'][0]['website_url'];?>"><?php echo $row['company_name'][0]['website_url'];?></a> </p>
                              <?php echo anchor('Student/Job/register_form_company', '<i class="icon-pencil"></i> กรอกใบสมัคร', 'class="btn btn-primary"');?> 
                          </div>
                  
                          <div class="card-footer">
                            <span class="btn btn-primary float-right">พื่นที่: <?php echo $row['address_company']['province'];?></span>
                          </div>
                      </div>
                  </div>
                  <?php } ?>          
                </div>
                <!--ส่วนของเนื้อหาของการสมัคร-->
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

 
