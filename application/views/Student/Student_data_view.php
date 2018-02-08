<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">ข้อมูลนิสิต</li>
</ol>
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
                            <tr><td width="25%">ชื่อภาษาอังกฤษ</td><td><font color="#0000ff">Mr. ssssss</font></td</tr>
                            <tr><td>คณะ</td><td><font color="#0000ff">วิทยาการสารสนเทศ</font></td></tr>
                            <tr><td>คณะ</td><td><font color="#0000ff"><?php echo $department['name']; ?></font></td></tr>
                            <tr><td>ชั้นปี </td><td><font color="#0000ff">4</font></td></tr>
                            <tr><td>หลักสูตร</td><td><font color="#0000ff">ปริญญา 4 ปี</font></td></tr>
                            <tr><td>อาจารย์ที่ปรึกษา</td><td><font color="#0000ff">เอกภพ บุญสูงเนิน</font></td</tr>
                            <tr><td>หน่วยกิตคำนวณ</td><td><font color="#0000ff">128</font></td></tr>

                            <tr><td>หน่วยกิตที่ผ่าน </td><td><font color="#0000ff">126</font></td></tr>
                            <tr><td>GPAX</td><td><font color="#0000ff">3.57</font></td></tr>
                          </table>
                        <table class="table table-bordered ">
                            <tr><h3>ข้อมูลสหกิจ</h3></tr>
                            <tr><td width="25%">ชั่วโมงอบรม</td><td><font color="#006600">ผ่าน</font></td</tr>
                            <tr><td >วิชาเเกน</td><td><font color="#006600">ผ่าน</font></td</tr>
                            <tr><td>เกรด</td><td><font color="#ff3300">ไม่ผ่าน</font></td</tr>
                            <tr><td>สถานะการสอบวัดผลรอบ (1,2,3)</td><td><font color="#ff3300">ไม่ผ่าน</font></td></tr>
                          </table>
                    </div>
                </div>

            </div>
        </div>
      </div>
    </div>
  </div>
</div>

 
