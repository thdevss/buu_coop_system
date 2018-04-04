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
                        <input type="text" class="form-control" id="" value="<?php echo $student['id']; ?>" disabled>
                      </div>
                     <!--ส่วนของรหัสนิสิต-->
                     <!--ส่วนของโทรศัพท์-->
                      <div class="form-group col-sm-4">
                        <label for="ccnumber">โทร</label><code>*</code>
                        <input type="text" class="form-control" id="" name="telephone" placeholder="กรุณากรอก" required>
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
                        <input class="form-check-input" type="radio" value="" id="radio1" <?php if($department['id']== 2) echo "checked" ?> disabled>
                          <label class="form-check-label" for="radio1">วิทยาการคอมพิวเตอร์</label>
                      </div>

                      <div class="form-check col-sm-2">
                        <input class="form-check-input" type="radio" value="" id="radio2" <?php if($department['id']== 1) echo "checked" ?> disabled>
                            <label class="form-check-label" for="radio2">เทคโนโลยีสารสนเทศ</label>
                      </div>
                          
                      <div class="form-check col-sm-2">
                        <input class="form-check-input" type="radio" value="" id="radio3" <?php if($department['id']== 3) echo "checked" ?> disabled>
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
                        <div class="alert alert-dark text-center" role="alert"><strong>ข้อมูลส่วนนิสิต (APPLICANT 'S INFORMATION)</strong></div>
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
                        <input type="text" class="form-control" id="" value="<?php echo $student_profile['Notionnality']; ?>" disabled>
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


                      <div class="form-group col-sm-3">
                        <label for="name">ส่วนสูง cm</label><code>*</code>
                        <input type="text" class="form-control" id="" name="height" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                        <label for="name">น้ำหนัก kg</label><code>*</code>
                        <input type="text" class="form-control" id="" name="weight" placeholder="กรุณากรอก" required>
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
                        <input type="text" class="form-control" id="" value="<?php echo get_student_level_from_entry_year($student_profile['Entry_Years']);?>" disabled>
                      </div>

                      <div class="form-group col-sm-3">
                        <label for="name">เกรดเฉลี่ยภาคการศึกษาที่ผ่านมา</label><code>*</code>
                        <input type="text" class="form-control" id="">
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

 
