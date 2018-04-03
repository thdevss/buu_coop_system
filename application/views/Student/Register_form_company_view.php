<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show() ;?>


<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i> แบบฟอร์มยื่นสมัครกับบริษัท
          </div>
            <div class="card-body">
            <div class="alert alert-dark text-center" role="alert">
                  <strong>ข้อมูลส่วนนิสิต (APPLICANT'S INFORMATION)</strong>
                </div>
                <div class="card-body">
                <form action="<?php echo site_url('Student/Job/print_data/'.$company['id'].'/'.$company_job_position['position_title']);?>" method="post">

                  <div class="row">

                    <!--ส่วนของกรอกชื่อ-->
                      <div class="form-group col-sm-6">
                        <label for="fullname">ชื่อ-นามสกุล</label><code>*</code>
                        <input type="text" class="form-control" id="fullname" value="<?php echo $student['fullname'];?>" disabled>
                      </div>
                    <!--ส่วนของกรอกชื่อ-->

                    <!--ส่วนของกรอกนามสกุล-->
                      
                    <!--ส่วนของกรอกนามสกุล-->

                  </div>

                    <div class="row">

                     <!--ส่วนของรหัสนิสิต-->
                      <div class="form-group col-sm-4">
                        <label for="ccnumber">รหัสนิสิต</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student['id']; ?>" disabled>
                      </div>
                     <!--ส่วนของรหัสนิสิต-->
                     <!--ส่วนของโทรศัพท์-->
                      <div class="form-group col-sm-4">
                        <label for="ccnumber">โทรศัพท์</label><code>*</code>
                        <input type="text" class="form-control" id="" name="telaphone" placeholder="กรุณากรอก" required>
                      </div>
                      <!--ส่วนของโทรศัพท์-->
                      <!--ส่วนของมือถือ-->
                      <div class="form-group col-sm-4">
                        <label for="ccnumber">มือถือ</label><code>*</code>
                        <input type="text" class="form-control" id="" name="phone" placeholder="กรุณากรอก" required>
                      </div>
                       <!--ส่วนของมือถือ-->

                  </div>

                  <div class="row">
                  <!--ส่วนของEmail-->
                  <div class="form-group col-sm-5">
                        <label for="ccnumber">Email</label><code>*</code>
                        <input type="email" class="form-control" id="" name="email" placeholder="กรุณากรอก" required>
                      </div>
                  <!--ส่วนของEmail-->
                  </div>

                  <div class="row">
                  <!--ส่วนของเลือกสาขา-->
                  <div class="form-check col-sm-1">
                  <label>สาขา</label><code>*</code>
                  </div>
                  <div class="form-check col-sm-2">
                          <input class="form-check-input" type="radio" value="" id="radio1"<?php if($department['id']== 2) echo "checked" ?> >
                          <label class="form-check-label" for="radio1">
                            วิทยาการคอมพิวเตอร์
                          </label>
                        </div>

                    <div class="form-check col-sm-2">
                          <input class="form-check-input" type="radio" value="" id="radio2"<?php if($department['id']== 1) echo "checked" ?> >
                          <label class="form-check-label" for="radio2">
                           เทคโนโลยีสารสนเทศ
                          </label>
                        </div>
                        
                    <div class="form-check col-sm-2">
                          <input class="form-check-input" type="radio" value="" id="radio3"<?php if($department['id']== 3) echo "checked" ?> >
                          <label class="form-check-label" for="radio3">
                            วิศวกรรมซอฟต์แวร์
                          </label>
                        </div>
                  <!--ส่วนของเลือกสาขา-->
                  </div>

                    <div class="row">
                    <div class="col-sm-12">
                    <div class="alert alert-dark text-center" role="alert">
                     <strong>ชื่อสถานประกอบการที่ต้องการสมัคร รอบที่:</strong>
                    </div>
                    </div>
                    </div>
                    <!--br-->
                    <br>
                    <!--br-->
                    <div class="row">
                    <!--ส่วนของชื่อสถานประกอบการ-->
                    <div class="form-group col-sm-6">
                        <label for="name">ชื่อสถานประกอบการ</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $company['name_th']; ?>" disabled>
                      </div>
                    <!--ส่วนของชื่อสถานประกอบการ-->

                    <!--ส่วนของตำแหน่งการสมัครงาน-->
                    <div class="form-group col-sm-6">
                        <label for="name">สมัครงานในตำแหน่ง</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $company_job_position['position_title']; ?>" disabled>
                      </div>
                    <!--ส่วนของตำแหน่งการสมัครงาน-->
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-dark text-center" role="alert"><strong>ข้อมูลส่วนนิสิต (APPLICANT 'S INFORMATION)</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->

                    <div class="form-group row">
                      <div class="col-sm-12">
                      <img src="http://reg.buu.ac.th/registrar/getstudentimage.asp?id=<?php echo $user->login_value;?>" class="rounded-circle">
                      </div>

                      <div class="form-group col-sm-6">
                      <label for="name">ชื่อ-นามสกุล(TH)</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Prefix'].$student_profile['Student_NameTH']." ".$student_profile['Student_LNameTH']; ?>" disabled>
                      </div>

                      <div class="form-group col-sm-6">
                      <label for="name">ชื่อเล่น</label><code>*</code>
                      <input type="text" class="form-control" id="" name="student_nickname" placeholder="กรุณากรอก" required>
                      </div>
                      

                      <div class="form-group col-sm-6">
                      <label for="name">Name</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Student_NameEng'];?> " disabled>
                      </div>

                      <div class="form-group col-sm-6">
                      <label for="name">Surname</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Student_LNameENG'];?>" disabled>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">สาขาวิชา</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $department['name'];?>" disabled>
                      </div>

                      <div class="form-group col-sm-2">
                      <label for="name">รหัสนิสิต</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Student_ID'];?>" disabled>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">ชั้นปีที่</label><code>*</code>
                      <input type="text" class="form-control" id="" name="level" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">เกรดเฉลี่ยภาคการศึกษาที่ผ่านมา</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก">
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">เกรดเฉลี่ยสะสม</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก">
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">สถานที่เกิด</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Province_Birth'];?>" disabled>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">วันเดือนปีเกิด</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo thaiDate($student_profile['Birthday'], false, false);?>" disabled>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">อายุ</label><code>*</code>
                      <input type="text" class="form-control" id="" name="age" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">เพศ</label><code>*</code>
                      <?php if($student_profile['Prefix'] == "นาย") { ?>
                      <input type="text" class="form-control" id="" name="sex" value="<?php echo "ชาย";?>" disabled>
                     <?php  } else if ($student_profile['Prefix'] == "นางสาว") { ?>
                      <input type="text" class="form-control" id="" name="sex" value="<?php echo "หญิง";?>" disabled>
                     <?php } ?>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">บัตรประจำตัวประชาชนเลขที่</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Student_IdNum']; ?>" disabled>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">สัญชาติ</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Notionnality']; ?>" disabled>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">ศาสนา</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Relidion']; ?>" disabled>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">ส่วนสูง</label><code>*</code>
                      <input type="text" class="form-control" id="" name="height" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">น้ำหนัก</label><code>*</code>
                      <input type="text" class="form-control" id="" name="weight" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-6">
                      <label for="name">ที่อยู่ที่ติดต่อได้</label><code>*</code>
                      <input type="text" class="form-control" id="" name="address" required>
                      </div>

                      <div class="form-group col-sm-6">
                      <label for="name">ที่อยู่ที่ตามทะเบียนบ้าน</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Homeaddress_Number']."/".$student_profile['Homeaddress_Moo']." ช. ".$student_profile['Homeaddress_Soi']." ต.".$student_profile['Homeaddress_Tumbon']." อ.".$student_profile['Homeaddress_Aumper']." จ.".$student_profile['Homeaddress_Province']." รหัสไปรษณีย์ ".$student_profile['Homeaddress_Postcode']; ?>" disabled>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">โทรศัพท์</label><code>*</code>
                      <input type="text" class="form-control" id="" name="address_telephone" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">มือถือ</label><code>*</code>
                      <input type="text" class="form-control" id="" name="address_phone" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">Email</label><code>*</code>
                      <input type="email" class="form-control" id="" name="address_email" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-8">
                      </div>

                      <div class="form-group col-sm-12">
                      <div class="alert alert-dark text-center" role="alert"><strong>บุคคลที่ติดต่อได้ในกรณีฉุกเฉิน</strong></div>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">ชื่อ-นามสกุล</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Contact_Name']; ?>" disabled>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">โทรศัพท์</label><code>*</code>
                      <input type="text" class="form-control" id="" name="contact_telephone" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">ความสัมพันธ์</label><code>*</code>
                      <input type="text" class="form-control" id="" name="contact_status" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">ที่อยู๋</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Contactaddress_Number']." ต.".$student_profile['Contactaddress_Tumbon']." อ.".$student_profile['Contactaddress_Aumper']." จ.".$student_profile['Contactaddress_Province']." รหัสไปรษณีย์ ".$student_profile['Contactaddress_Postcode']; ?>" disabled>
                      </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-dark text-center" role="alert"><strong>ข้อมูลครอบครัว (FAMILY DETAILS)</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="form-group row">

                    <div class="form-group col-sm-4">
                      <label for="name">ชื่อบิดา</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Father_Name'] ;?>" disabled>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">อาชีพ</label><code>*</code>
                      <input type="text" class="form-control" id="" name="father_caree" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">โทรศัพท์</label><code>*</code>
                      <input type="text" class="form-control" id="" name="father_telephone" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">ชื่อมารดา</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Mother_Name'] ;?>" disabled>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">อาชีพ</label><code>*</code>
                      <input type="text" class="form-control" id="" name="mather_caree" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">โทรศัพท์</label><code>*</code>
                      <input type="text" class="form-control" id="" name="mather_telephone" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-8">
                      <label for="name">ที่อยู่</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Parentaddress_Number']."/".$student_profile['Parentaddress_Moo']." ซ.".$student_profile['Parentaddress_Soi']." ต.".$student_profile['Parentaddress_Tumbon']." อ.".$student_profile['Parentaddress_Aumper']." จ.".$student_profile['Parentaddress_Province']." รหัสไปรษณีย์ ".$student_profile['Parentaddress_Postcode']; ?>" disabled>
                      </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-dark text-center" role="alert"><strong>ประวัติการศึกษา (EDUCATIONAL HISTORY)</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                    <div class="col-sm-12">
                    <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th>ระดับ</th>
                        <th>สถานศึกษา</th>
                        <th>ปีที่เริ่ม</th>
                        <th>ปีที่จบ</th>
                        <th>ผลการศึกษา</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr> 
                    </tbody>
                  </table>
                 </div>
                 </div>

                  <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-dark text-center" role="alert"><strong>ประวัติการอบรม และกิจกรรมนอกหลักสูตร</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                    <div class="col-sm-12">
                    <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th>หัวข้อฝึกอบรม/ฝึกงาน</th>
                        <th>หน่วยงานที่ให้การฝึกอบรม/ฝึกงาน</th>
                        <th>ระยะเวลา</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr> 
                    </tbody>
                  </table>
                  </div>
                  </div>

                  <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-dark text-center" role="alert"><strong>จุดหมายงานอาชีพ (CAREER VISION)</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                    <div class="col-sm-12">
                    <p>ระบุสายงานและลักษณะงานอาชีพที่นิสิตสนใจ (List your career goals, fields of interest and job preferences.)<code>*</code></p>
                    <textarea id="" name="job_student" rows="9" class="form-control" placeholder="กรุณากรอก..."></textarea>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-dark text-center" role="alert"><strong>ความสามารถทางภาษา (LANGUAGE PROFICIENCY)</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                    <div class="col-sm-12">
                    <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th>ภาษา</th>
                        <th>ฟัง</th>
                        <th>พูด</th>
                        <th>อ่าน</th>
                        <th>เขียน</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr> 
                    </tbody>
                  </table>
                </div>
                </div>

                <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-dark text-center" role="alert"><strong>ความสามารถทางคอมพิวเตอร์</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                        <div class="col-sm-12">
                            <code>*</code>
                            <textarea id="" name="computer_student" rows="9" class="form-control" placeholder="กรุณากรอก..."></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-dark text-center" role="alert"><strong>โปรดอธิบายให้ผู้อื่นรู้จักตัวท่านดีขึ้น</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                        <div class="col-sm-12">
                            <code>*</code>
                            <textarea id="" name="detail_student" rows="9" class="form-control" placeholder="กรุณากรอก..."></textarea>
                        </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-6">
                        <button type="submit" class="btn btn-md btn-primary"><i class="fa fa-dot-circle-o"></i>พิมพ์เอกสาร</button>
                        </div>
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

 
