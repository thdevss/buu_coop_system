<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>ข้อมูลนิสิต
          </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <center>
                        <img src="http://reg.buu.ac.th/registrar/getstudentimage.asp?id=<?php echo $student['id']; ?>" class="img-circle" style="width:280px;">
                        <br></br>
                        <h4><?php echo $student['id']; ?></h4>
                        <h5><?php echo $student['fullname']; ?></h5>
                        </center>
                        </div>
                    <div class="col-sm-8">
                        <table class="table table-bordered ">
                            <tr><h3>ข้อมูลทั่วไป</h3></tr>
                            <tr><td width="25%">ชื่อภาษาอังกฤษ</td><td><font color="#0000ff">รอดึงจากระบบโปรไฟล์</font></td</tr>
                            <tr><td>คณะ</td><td><font color="#0000ff">รอดึงจากระบบโปรไฟล์</font></td></tr>
                            <tr><td>สาขา</td><td><font color="#0000ff"><?php echo $department['name']; ?></font></td></tr>
                            <tr><td>ปีการศึกษา </td><td><font color="#0000ff"><?php echo $term['year']; ?>&nbsp;<?php echo $term['name']; ?></font></td></tr>
                            <tr><td>หลักสูตร</td><td><font color="#0000ff">รอดึงจากระบบโปรไฟล์</font></td></tr>
                            <tr><td>อาจารย์ที่ปรึกษา</td><td><font color="#0000ff">รอดึงจากระบบโปรไฟล์</font></td</tr>
                            <tr><td>หน่วยกิตคำนวณ</td><td><font color="#0000ff">รอดึงจากระบบโปรไฟล์</font></td></tr>

                            <tr><td>หน่วยกิตที่ผ่าน </td><td><font color="#0000ff">รอดึงจากระบบโปรไฟล์</font></td></tr>
                            <tr><td>GPAX</td><td><font color="#0000ff">รอดึงจากระบบโปรไฟล์</font></td></tr>
                          </table>
                        <table class="table table-bordered ">
                            <tr><h3>ข้อมูลสหกิจ</h3></tr>
                            <tr><td width="25%">ชั่วโมงอบรม</td><td>
                            <?php if($pass_training) { ?>
                              <font color="#006600">ผ่าน</font>
                            <?php } else { ?>
                              <font color="">ไม่ผ่าน</font>
                            <?php } ?>
                            </td></tr>
                            <tr><td >วิชาเเกน</td><td>รอดึงจากระบบโปรไฟล์</td></tr>
                            <tr><td>เกรด</td><td><font color="#ff3300">รอดึงจากระบบโปรไฟล์</font></td></tr>
                            <tr><td>สถานะสถานประกอบการ</td><td>
                            <?php if($student['company_status'] == '1') { ?>
                              <font color="#006600">ผ่านการคัดเลือกจากสถานประกอบการ</font>
                            <?php } else { ?>
                              <font color="">รอการตอบกลับ</font>
                            <?php } ?>
                            </td></tr>
                            <tr><td>สถานะการสอบวัดผลรอบ (1,2,3)</td><td><font color=""><?php echo $coop_status_type['status_name']; ?></font></td></tr>
                          </table>
                          <table class="table table-bordered ">
                            <tr><h3>ข้อมูลสถานประกอบการ</h3></tr>
                            <tr><td width="25%">บริษัท</td><td>
                              <font color="#006600"><?php echo $company['name_th']; ?></font>
                            </td></tr>
                            <tr><td >ตำแหน่ง</td><td><?php echo $company_job_position['position_title']; ?></td></tr>
                            <tr><td>อาจารย์ที่ปรึกษา</td><td><font color="#ff3300"><?php echo $adviser['fullname']; ?></font></td></tr>                                                                                                     
                            </td></tr>
                          </table>
                    </div>
                </div>

            </div>
        </div>
      </div>
    </div>
  </div>
</div>

 
