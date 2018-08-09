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
            <?php 
            if(!$has_profile) {
              echo '<div class="col-lg-12"><div class="alert alert-warning"><b>โปรดกรอกข้อมูลในระบบโปรไฟล์ให้เรียบร้อยก่อนเข้าใช้งานค่ะ</b></div></div>';
            } 
            ?>

            <div class="alert alert-dark text-center" role="alert">
                  <strong>ข้อมูลส่วนนิสิต (APPLICANT'S INFORMATION)</strong>
                </div>
                <div class="card-body">
                <form action="<?php echo site_url('Student/Job/print_data/');?>" method="post" id="form_checker">
                  <input type="hidden" name="company_id" value="<?php echo $company['company_id'];?>">
                  <input type="hidden" name="company_job_position_id" value="<?php echo $company_job_position['job_id'];?>">

                  <div class="row">

                    <!--ส่วนของกรอกชื่อ-->
                      <div class="form-group col-sm-6">
                        <label for="name">ชื่อ(Name)</label><code>*</code>
                        <input type="text" class="form-control" id="name"   value="<?php echo $student_profile['Student_Prefix'].$student_profile['Student_Name_Th']; ?>" disabled>
                      </div>
                    <!--ส่วนของกรอกชื่อ-->

                    <!--ส่วนของกรอกนามสกุล-->
                    <div class="form-group col-sm-6">
                        <label for="surname">นามสกุล(Surname)</label><code>*</code>
                        <input type="text" class="form-control" id="surname" value="<?php echo $student_profile['Student_Lname_Th']; ?>" disabled>
                      </div>
                      
                    <!--ส่วนของกรอกนามสกุล-->

                  </div>

                    <div class="row">

                     <!--ส่วนของรหัสนิสิต-->
                      <div class="form-group col-sm-4">
                        <label for="ccnumber">รหัสนิสิต</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student['student_id']; ?>" disabled>
                      </div>
                     <!--ส่วนของรหัสนิสิต-->
                     <!--ส่วนของโทรศัพท์-->
                      <div class="form-group col-sm-4">
                        <label for="ccnumber">โทร</label> <?php echo form_error('telephone'); ?><code>*</code>
                        <input type="text" class="form-control" id="" name="telephone" placeholder="กรุณากรอก">
                      </div>
                      <!--ส่วนของโทรศัพท์-->
                      <!--ส่วนของมือถือ-->
                      <div class="form-group col-sm-4">
                        <label for="ccnumber">มือถือ</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Student_Phone']; ?>" disabled>
                      </div>
                       <!--ส่วนของมือถือ-->

                  </div>

                  <div class="row">
                  <!--ส่วนของEmail-->
                  <div class="form-group col-sm-5">
                        <label for="ccnumber">อีเมล์</label><code>*</code>
                        <input type="email" class="form-control" id="" value="<?php echo $student_profile['Student_Email']; ?>" disabled>
                      </div>
                  <!--ส่วนของEmail-->
                  </div>

                  <div class="row">
                  <!--ส่วนของเลือกสาขา-->
                  
                    <div class="form-check col-sm-1">
                      <label>สาขา</label><code>*</code>
                    </div>

                      <div class="form-check col-sm-2">
                        <input class="form-check-input" type="radio" value="" id="radio1" <?php if($department['department_id']== 2) echo "checked" ?> disabled>
                          <label class="form-check-label" for="radio1">วิทยาการคอมพิวเตอร์</label>
                      </div>

                      <div class="form-check col-sm-2">
                        <input class="form-check-input" type="radio" value="" id="radio2" <?php if($department['department_id']== 1) echo "checked" ?> disabled>
                            <label class="form-check-label" for="radio2">เทคโนโลยีสารสนเทศ</label>
                      </div>
                          
                      <div class="form-check col-sm-2">
                        <input class="form-check-input" type="radio" value="" id="radio3" <?php if($department['department_id']== 3) echo "checked" ?> disabled>
                          <label class="form-check-label" for="radio3">วิศวกรรมซอฟต์แวร์</label>
                      </div>

                    </div>
                  <!--ส่วนของเลือกสาขา-->

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-dark text-center" role="alert">
                        <strong>ชื่อสถานประกอบการที่ต้องการสมัคร</strong>
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
                      <input type="text" class="form-control" id="" value="<?php echo $company['company_name_th']; ?>" disabled>
                    </div>
                    <!--ส่วนของชื่อสถานประกอบการ-->

                    <!--ส่วนของตำแหน่งการสมัครงาน-->
                    <div class="form-group col-sm-6">
                      <label for="name">สมัครงานในตำแหน่ง</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $company_job_position['job_title']; ?>" disabled>
                    </div>
                    <!--ส่วนของตำแหน่งการสมัครงาน-->
                  </div>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="alert alert-dark text-center" role="alert"><strong>ข้อมูลส่วนนิสิต (APPLICANT 'S INFORMATION)</strong></div>
                      </div>
                    </div>
                    
                      <!--br-->
                     <br>
                      <!--br-->

                    <div class="form-group row">
                      <div class="col-sm-12">
                        <img src="http://reg.buu.ac.th/registrar/getstudentimage.asp?id=<?php echo $user->login_value;?>" class="rounded-circle" style="width:248px !important;">
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="name">ชื่อ-นามสกุล (นาย, นางสาว)</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Student_Prefix'].$student_profile['Student_Name_Th']." ".$student_profile['Student_Lname_Th']; ?>" disabled>
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="name">ชื่อเล่น</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Student_Nickname']; ?>" disabled>
                      </div>
                      

                      <div class="form-group col-sm-6">
                        <label for="name">Name - Surname (Mr.,Ms.)</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo detect_prefix_en($student_profile['Student_Prefix']).$student_profile['Student_Name_Eng']." ".$student_profile['Student_Lname_Eng'];?> " disabled>
                      </div>
                      

                      <div class="form-group col-sm-3">
                        <label for="name">บัตรประจำตัวประชาชนเลขที่</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Student_IdNum']; ?>" disabled>
                      </div>


                      <div class="form-group col-sm-3">
                        <label for="name">สัญชาติ</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Nationality']; ?>" disabled>
                      </div>


                      <div class="form-group col-sm-3">
                        <label for="name">ศาสนา</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Relidion']; ?>" disabled>
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
                        <input type="text" class="form-control" id="" value="<?php echo get_age_from_birthday($student_profile['Birthday']);?>" disabled>
                      </div>


                      <div class="form-group col-sm-3">
                        <label for="name">เพศ</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo detect_gender_th($student_profile['Student_Prefix']);?>" disabled>
                      </div>


                      <div class="form-group col-sm-4">
                        <label for="name">ส่วนสูง cm</label> <?php echo form_error('height'); ?><code>*</code>
                        <input type="number" min="120" max="250" class="form-control" id="" name="height" value="<?php echo set_value('height');?>" placeholder="กรุณากรอก">
                      </div>

                      <div class="form-group col-sm-4">
                        <label for="name">น้ำหนัก kg</label> <?php echo form_error('weight'); ?><code>*</code>
                        <input type="number" min="20" max="200" class="form-control" id="" name="weight" value="<?php echo set_value('weight');?>" placeholder="กรุณากรอก">
                      </div>

    
                      <div class="form-group col-sm-4">
                        <label for="name">สาขาวิชา</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $department['department_name'];?>" disabled>
                      </div>

                      <div class="form-group col-sm-2">
                        <label for="name">รหัสนิสิต</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Student_ID'];?>" disabled>
                      </div>

                      <div class="form-group col-sm-3">
                        <label for="name">ชั้นปีที่</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo get_student_level_from_entry_year($student_profile['Entry_Years']);?>" disabled>
                      </div>

                      <div class="form-group col-sm-3">
                        <label for="name">เกรดเฉลี่ยภาคการศึกษาที่ผ่านมา</label> <?php echo form_error('GPA'); ?><code>*</code>
                        <input type="number" step="0.01" min="0.00" max="4.00" class="form-control" id="" name="GPA" value="<?php echo set_value('GPA');?>">
                      </div>

                      <div class="form-group col-sm-3">
                        <label for="name">เกรดเฉลี่ยสะสม</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['GPAX'];?>" disabled>
                      </div>

    
                      <div class="form-group col-sm-9">
                        <label for="name">ที่อยู่ที่ติดต่อได้</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Address_Number']."/".$student_profile['Address_Moo']." ช. ".$student_profile['Address_Soi']." ต.".$student_profile['Address_Tumbon']." อ.".$student_profile['Address_Aumper']." จ.".$student_profile['Address_Province']." รหัสไปรษณีย์ ".$student_profile['Address_Postcode']; ?>" disabled>
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="name">ที่อยู่ที่ตามทะเบียนบ้าน</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Home_Address_Number']."/".$student_profile['Home_Address_Moo']." ช. ".$student_profile['Home_Address_Soi']." ต.".$student_profile['Home_Address_Tumbon']." อ.".$student_profile['Home_Address_Tumbon']." จ.".$student_profile['Home_Address_Province']." รหัสไปรษณีย์ ".$student_profile['Home_Address_Postcode']; ?>" disabled>
                      </div>

                      <div class="form-group col-sm-3">
                        <label for="name">โทร.</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Address_Phone']; ?>" disabled>
                      </div>

                      <div class="form-group col-sm-3">
                        <label for="name">มือถือ</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Student_Phone'];?>" disabled>
                      </div>

                      <div class="form-group col-sm-4">
                        <label for="name">E-mail Address</label><code>*</code>
                        <input type="email" class="form-control" id="" value="<?php echo $student_profile['Student_Email'];?>" disabled>
                      </div>

                      

                      <div class="form-group col-sm-12">
                        <div class="alert alert-dark text-center" role="alert"><strong>บุคคลที่ติดต่อได้ในกรณีฉุกเฉิน</strong></div>
                      </div>

                      <div class="form-group col-sm-4">
                        <label for="">ชื่อ-นามสกุล</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Contact_Name']; ?>" disabled>
                      </div>

                      <div class="form-group col-sm-4">
                        <label for="">โทรศัพท์</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Contact_Phone']; ?>" disabled>
                      </div>

                      <div class="form-group col-sm-4">
                        <label for="">ความสัมพันธ์</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Contact_Status'];?>" disabled>
                      </div>

                      <div class="form-group col-sm-8">
                        <label for="">ที่อยู่</label><code>*</code>
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Contact_Address_Number']." ต.".$student_profile['Contact_Address_Tumbon']." อ.".$student_profile['Contact_Address_Aumper']." จ.".$student_profile['Contact_Address_Province']." รหัสไปรษณีย์ ".$student_profile['Contact_Address_Province']; ?>" disabled>
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
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Father_Career'] ;?>" disabled>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">โทรศัพท์</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Father_Phone'];?>" disabled>
                      </div>

                      <div class="form-check col-sm-2">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" <?php if ($student_profile['Father_Status']== "มีชีวิต") echo "checked" ?> disabled>
                          <label class="form-check-label" for="father1">
                            มีชีวิตอยู่
                          </label>
                        </div>
                        
                        <div class="form-check col-sm-2">
                          <input class="form-check-input" type="radio"  <?php if ($student_profile['Father_Status']== "ถึงแก่กรรม") echo "checked" ?> disabled>
                          <label class="form-check-label" for="father2">
                            ถึงแก่มีกรรมอยู่
                          </label>
                        </div>

                        <div class="form-check col-sm-8"></div>

                      <div class="form-group col-sm-8">
                      <label for="name">ที่อยู่</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Father_Address_Number']."/".$student_profile['Father_Address_Moo']." ซ.".$student_profile['Father_Address_Soi']." ต.".$student_profile['Father_Address_Tumbon']." อ.".$student_profile['Father_Address_Aumper']." จ.".$student_profile['Father_Address_Province']." รหัสไปรษณีย์ ".$student_profile['Father_Address_Postcode']; ?>" disabled>
                      </div>

                      <div class="form-check col-sm-4"></div>

                      <div class="form-group col-sm-4">
                      <label for="name">ชื่อมารดา</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Mother_Name'] ;?>" disabled>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">อาชีพ</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Mother_Career'] ;?>" disabled>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">โทรศัพท์</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Mother_Phone'] ;?>" disabled>
                      </div>

                      <div class="form-check col-sm-2">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio"  <?php if ($student_profile['Father_Status']== "มีชีวิต") echo "checked" ?> disabled>
                          <label class="form-check-label" for="mother1">
                            มีชีวิตอยู่
                          </label>
                        </div>
                        
                        <div class="form-check col-sm-2">
                          <input class="form-check-input" type="radio" <?php if ($student_profile['Father_Status']== "ถึงแก่กรรม") echo "checked" ?> disabled>
                          <label class="form-check-label" for="mother2">
                            ถึงแก่มีกรรมอยู่
                          </label>
                        </div>

                        <div class="form-check col-sm-8"></div>

                      <div class="form-group col-sm-8">
                      <label for="name">ที่อยู่</label><code>*</code>
                      <input type="text" class="form-control" id="" value="<?php echo $student_profile['Mother_Address_Number']."/".$student_profile['Mother_Address_Moo']." ซ.".$student_profile['Mother_Address_Soi']." ต.".$student_profile['Mother_Address_Tumbon']." อ.".$student_profile['Mother_Address_Aumper']." จ.".$student_profile['Mother_Address_Province']." รหัสไปรษณีย์ ".$student_profile['Mother_Address_Postcode']; ?>" disabled>
                      </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-dark text-center" role="alert">
                              <strong>ประวัติการศึกษา (EDUCATIONAL HISTORY)</strong>
                            </div>
                        </div>
                    </div>
                     <!--br-->
                    <!--br-->
                    <div class="form-group row">
                    <div class="col-sm-12">
                    <table class="table table-bordered copy_row">
                    <thead>
                      <tr>
                        <th>ระดับ</th>
                        <th>สถานศึกษา</th>
                        <th>ปีที่เริ่ม</th>
                        <th>ปีที่จบ</th>
                        <th>ผลการศึกษา</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="first_row">
                        <td><input type="text" class="form-control" name="education_level[]"></td>
                        <td><input type="text" class="form-control" name="education_place[]"></td>
                        <td><input type="text" class="form-control" min="<?php echo (date('Y')+543)-15;?>" max="<?php echo (date('Y')+543)-1;?>" name="education_start_year[]"></td>
                        <td><input type="text" class="form-control" min="<?php echo (date('Y')+543)-15;?>" max="<?php echo (date('Y')+543)-1;?>" name="education_end_year[]"></td>
                        <td><input type="text" class="form-control" step="0.01" min="0.00" max="4.00" name="education_result[]"></td>
                        <td><a onclick="deleteRow(this);" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a></td>
                      </tr> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="6">
                          <a class="btn btn-xs btn-primary btn-block add_row"> + เพิ่มข้อมูล </a>
                        </td>
                      </tr>
                    </tfoot>
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
                    <!--br-->
                    <div class="form-group row">
                    <div class="col-sm-12">
                    <table class="table table-bordered copy_row">
                    <thead>
                      <tr>
                        <th>หัวข้อฝึกอบรม/ฝึกงาน</th>
                        <th>หน่วยงานที่ให้การฝึกอบรม/ฝึกงาน</th>
                        <th>ระยะเวลา ตั้งแต่</th>
                        <th>ระยะเวลา ถึง</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="first_row">
                        <td><input type="text" class="form-control" name="training_subject[]"></td>
                        <td><input type="text" class="form-control" name="training_place[]"></td>
                        <td><input type="text" class="form-control" name="training_start_period[]"></td>
                        <td><input type="text" class="form-control" name="training_end_period[]"></td>
                        <td><a onclick="deleteRow(this);" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a></td>                      
                      </tr> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="5">
                          <a class="btn btn-xs btn-primary btn-block add_row"> + เพิ่มข้อมูล </a>
                        </td>
                      </tr>
                    </tfoot>
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
                    <!--br-->
                    <div class="form-group row">
                    <div class="col-sm-12">
                      <p>ระบุสายงานและลักษณะงานอาชีพที่นิสิตสนใจ (List your career goals, fields of interest and job preferences.) <?php echo form_error('job_student');?><code>*</code></p>
                      <textarea id="" name="job_student" rows="9" class="form-control" placeholder="กรุณากรอก..."><?php echo set_value('job_student');?></textarea>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-dark text-center" role="alert"><strong>ความสามารถทางภาษา (LANGUAGE PROFICIENCY)</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                    <!--br-->
                    <div class="form-group row">
                    <div class="col-sm-12">
                    <table class="table table-bordered copy_row">
                    <thead>
                      <tr>
                        <th>ภาษา</th>
                        <th>ฟัง</th>
                        <th>พูด</th>
                        <th>อ่าน</th>
                        <th>เขียน</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="first_row">
                      <td class="form_group">
                        <input type="text" class="form-control" name="language_lang[]">
                      </td>
                      <td>
                        <select class="form-control" name="language_listen[]">
                          <option> -- เลือกระดับทักษะ -- </option>
                          <option value="3">ดี</option>
                          <option value="2">พอใช้</option>
                          <option value="1">ต้องปรับปรุง</option>
                        </select>
                      </td>
                      <td>
                        <select class="form-control" name="language_speak[]">
                          <option> -- เลือกระดับทักษะ -- </option>
                          <option value="3">ดี</option>
                          <option value="2">พอใช้</option>
                          <option value="1">ต้องปรับปรุง</option>
                        </select>
                      </td>
                      <td>
                        <select class="form-control" name="language_read[]">
                          <option> -- เลือกระดับทักษะ -- </option>
                          <option value="3">ดี</option>
                          <option value="2">พอใช้</option>
                          <option value="1">ต้องปรับปรุง</option>
                        </select>
                      </td>
                      <td>
                        <select class="form-control" name="language_write[]">
                          <option> -- เลือกระดับทักษะ -- </option>
                          <option value="3">ดี</option>
                          <option value="2">พอใช้</option>
                          <option value="1">ต้องปรับปรุง</option>
                        </select>
                      </td>
                      <td><a onclick="deleteRow(this);" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a></td>                      
                      
                      </tr> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="6">
                          <a class="btn btn-xs btn-primary btn-block add_row"> + เพิ่มข้อมูล </a>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                </div>

                
                    
                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-6">
                          <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-dot-circle-o"></i> พิมพ์เอกสาร</button>
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

 


<script>
jQuery(".add_row").click(function() {
  var table = jQuery(this).parents("table").find('tbody')
  table.before(table.find("tr.first_row").clone());
})

function deleteRow(e)
{
  jQuery(e).parents("tr").remove()
}


$(document).ready(function() {
    $('#form_checker').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'language_lang[]': {
              validators: {
                  notEmpty: {
                      message: 'โปรดกรอกข้อมูล'
                  }
              }
            },
            'training_subject[]' : {
              validators: {
                    notEmpty: {
                        message: 'โปรดกรอกข้อมูล'
                    }
                }
            },
            'training_place[]' : {
              validators: {
                    notEmpty: {
                        message: 'โปรดกรอกข้อมูล'
                    }
                }
            },
            'training_start_period[]' : {
              validators: {
                    notEmpty: {
                        message: 'โปรดกรอกข้อมูล'
                    }
                }
            },
            'training_end_period[]' : {
              validators: {
                    notEmpty: {
                        message: 'โปรดกรอกข้อมูล'
                    }
                }
            },
            'education_level[]' : {
              validators: {
                    notEmpty: {
                        message: 'โปรดกรอกข้อมูล'
                    }
                }
            },
            'education_place[]' : {
              validators: {
                    notEmpty: {
                        message: 'โปรดกรอกข้อมูล'
                    }
                }
            },
            'education_start_year[]' : {
              validators: {
                    notEmpty: {
                        message: 'โปรดกรอกข้อมูล'
                    }
                }
            },
            'education_end_year[]' : {
              validators: {
                    notEmpty: {
                        message: 'โปรดกรอกข้อมูล'
                    }
                }
            },
            'education_result[]' : {
              validators: {
                    notEmpty: {
                        message: 'โปรดกรอกข้อมูล'
                    }
                }
            },
        }
    });
});

</script>
