<!-- Main content -->
<main class="main">
<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> แบบแจ้งรายละเอียดการปฏิบัติงาน และแผนที่ตั้งสถานประกอบการ
                    </div>
                    <div class="card-body">
                    <?php 
                    if($status){
                        echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
                    }
                    ?>
                     <!-- ข้อ 1 -->
                     <label for="name"><b>๑.	ชื่อ/ที่อยู่สถานประกอบการ </b></label>
                        <div class="row">
                            <div class="form-group col-sm-6">           
                                <label>ชื่อสถานประกอบการ (ภาษาไทย)</label><code>*</code>
                                <input type="text" class="form-control" id="name_th" name="name_th" value="<?php echo $company['name_th']; ?>" required disabled >
                            </div>
                        </div>
                          <div class="row">
                              <div class="form-group col-sm-12">
                                  <label>ที่ตั้ง </label><code>*</code>
                                  <input type="text" class="form-control" id="name_en" name="name_en" value="<?php echo $company_address['number']." ".$company_address['building']." ".$company_address['alley']." ".$company_address['road']." ".$company_address['district']." ".$company_address['area']." ".$company_address['province']." ".$company_address['postal_code']; ?>" required disabled >                     
                              </div>
                          </div>
                          <div class="row">
                                <div class="form-group col-sm-3">
                                    <label>โทรศัพท์</label><code>*</code>
                                    <input type="text" class="form-control" id="number" name="number" value="<?php echo $company_person['telephone']; ?>" required disabled >                                                        
                                </div>
                                <div class="form-group col-sm-5">
                                    <label>โทรสาร</label>
                                    <input type="text" class="form-control" id="building" name="building" value="<?php echo $company_person['fax_number']; ?>" required disabled >                                       
                                </div>
                              <div class="form-group col-sm-4">
                                  <label>E-mail </label><code>*</code>
                                  <input type="text" class="form-control" id="road" name="road" value="<?php echo $company_person['email']; ?>" required disabled >                                     
                              </div>
                          </div>
                        <div class="row">
                          <div class="form-group col-sm-6">
                               <label>	ชื่อผู้จัดการสถานประกอบการ </label><code>*</code>
                               <input type="text" class="form-control" id="alley" name="alley" value="<?php echo $company_person['fullname']; ?>" required disabled >                                             
                          </div>
                          <div class="form-group col-sm-4">
                               <label>ตำแหน่ง</label><code>*</code>
                               <input type="text" class="form-control" id="alley" name="alley" value="<?php echo $company_person['position']; ?>" required disabled >                                              
                          </div>

                            <div class="form-group col-sm-12">
                               <label>การติดต่อประสานงานกับคณะวิทยาการสารสนเทศ (การนิเทศงานนักศึกษา และอื่นๆ) ขอมอบให้</label><code>*</code>       
                                <div class="col-md-9 col-form-label">
                                <?php if($company['headoffice_person_id'] == $company['contact_person_id']) { ?>

                                    <div class="form-check form-check-inline mr-2">
                                      <input class="form-check-input" type="radio" id="" value="option1" name="inline-radios" checked>
                                      <label class="form-check-label" for="inline-radio1">ติดต่อกับผู้จัดการโดยตรง</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline mr-2">
                                      <input class="form-check-input" type="radio" id="show" value="option2" name="inline-radios" disabled>
                                      <label class="form-check-label" for="inline-radio2">มอบหมายให้บุคคลต่อไปนี้ประสานงานแทน</label>
                                    </div>

                               <?php } else { ?>

                                    <div class="form-check form-check-inline mr-1">
                                    &nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" id="" value="option1" name="inline-radios" disabled>
                                      <label class="form-check-label" for="inline-radio1">ติดต่อกับผู้จัดการโดยตรง</label>
                                    </div>
                                    <br>
                                    <div class="form-check form-check-inline mr-1">
                                    &nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" id="" value="option2" name="inline-radios" checked>
                                    <label class="form-check-label" for="inline-radio2">มอบหมายให้บุคคลต่อไปนี้ประสานงานแทน</label>
                                    </div>

                                <?php } ?>

                                </div>                     
                            </div>
                        </div>
                    <?php if($company['headoffice_person_id'] != $company['contact_person_id']) { ?>    
                        <div class="row" >
                            <div class="form-group col-sm-6">
                                <label>ชื่อ-นามสกุล</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" value="<?php echo $contact_person['fullname']; ?>" required disabled >                          
                            </div>

                            <div class="form-group col-sm-4">
                                <label>ตำแหน่ง(เลือก)</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" value="<?php echo $contact_person['position']; ?>" required disabled >                          
                            </div>

                            <div class="form-group col-sm-4">
                                <label>แผนก(เลือก)</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" value="<?php echo $contact_person['department']; ?>" required disabled >                          
                            </div>

                            <div class="form-group col-sm-4">
                               <label>โทรศัพท์ </label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $contact_person['telephone']; ?>" required disabled >                                                     
                            </div>

                            <div class="form-group col-sm-4">
                               <label>โทรสาร</label>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $contact_person['fax_number']; ?>" required disabled >                                   
                            </div>

                            <div class="form-group col-sm-8">
                               <label>E-mail</label><code></code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $contact_person['email']; ?>" required disabled >                                   
                            </div>
                        </div>
                    <?php } ?>
                        <!-- ข้อ 2 -->
                    <label for="name"><b>๒.	ผู้นิเทศงาน </b></label>
                        <div class="row">
                            <div class="form-group col-sm-6">
                               <label>ชื่อ-นามสกุล</label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $trainer['fullname']; ?>" required disabled >                          
                            </div>
                            <div class="form-group col-sm-4">
                                <label>ตำแหน่ง</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" value="<?php echo $trainer['position']; ?>" required disabled >                                                           
                            </div>
                            <div class="form-group col-sm-4">
                                <label>แผนก</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" value="<?php echo $trainer['department']; ?>" required disabled >                                                                                     
                            </div>
                            <div class="form-group col-sm-4">
                               <label>โทรศัพท์ </label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $trainer['telephone']; ?>" required disabled >                                                     
                            </div>
                            <div class="form-group col-sm-4">
                               <label>โทรสาร</label>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $trainer['fax_number']; ?>" required disabled >                                   
                            </div>
                            <div class="form-group col-sm-8">
                               <label>E-mail</label><code></code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $trainer['email']; ?>" required disabled >                                   
                            </div>
                        </div>
                     <!-- ข้อ 3 -->
                     <label for="name"><b>๓. งานที่มอบหมายนิสิต</b></label>
                        <div class="row">
                            <div class="form-group col-sm-6">
                               <label>ชื่อ – นามสกุล (นิสิต)</label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $student_name['fullname']; ?>" required disabled >                          
                            </div>
                            <div class="form-group col-sm-6">
                               <label>รหัสประจำตัว  (นิสิต)</label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $student_name['id']; ?>" required disabled >                          
                            </div>                         
                            <div class="form-group col-sm-5">
                                <label>สาขาวิชา</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" value="<?php echo $student_department['name']; ?>" required disabled >                                                                
                            </div>
                            <div class="form-group col-sm-5">
                                <label>คณะ</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" value="ลอ Profile" required disabled >                                                                    
                            </div>
                            <div class="form-group col-sm-8">
                               <label>ตำแหน่งงานที่นักศึกษาปฏิบัติ (Job Position) </label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $company_job_position['position_title']; ?>" required disabled >                                                     
                            </div>
                            <div class="form-group col-sm-8">
                               <label>ลักษณะงานที่นักศึกษาปฏิบัติ (Job Description)</label><code></code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $company_job_position['job_description']; ?>" required disabled >                                   
                            </div>
                        </div>
                    <!-- ปิดข้อ 3 -->
                    <!-- ข้อ 4 -->
                    <label for="name"><b>๔.	ที่อยู่ที่นิสิตพักระหว่างการทำสหกิจศึกษา</b></label>
                    <div class="row">
                          <div class="form-group col-sm-8">
                               <label>ชื่อหอพัก/อพาร์ทเมนท์ </label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $coop_student_dorm['dorm_name']; ?>" required disabled >                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>ห้อง</label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $coop_student_dorm['dorm_room']; ?>" required disabled >                          
                          </div>
                          <div class="form-group col-sm-2">
                               <label>เลขที่ </label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $coop_student_dorm['number']; ?>" required disabled >                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>ซอย </label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $coop_student_dorm['alley']; ?>" required disabled >                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>ถนน </label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $coop_student_dorm['road']; ?>" required disabled >                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>แขวง/ตำบล </label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $coop_student_dorm['district']; ?>" required disabled >                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>เขต/อำเภอ </label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $coop_student_dorm['area']; ?>" required disabled >                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>จังหวัด </label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $coop_student_dorm['province']; ?>" required disabled >                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>รหัสไปรษณีย์</label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $coop_student_dorm['postal_code']; ?>" required disabled >                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>โทรศัพท์</label><code>*</code>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $coop_student_dorm['telephone']; ?>" required disabled >                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>โทรสาร</label>
                               <input type="text" class="form-control" id="" name="" value="<?php echo $coop_student_dorm['fax_number']; ?>" required disabled >                          
                          </div>                
                        </div>
                      <!-- ปิดข้อ 4 -->
                         <!-- ข้อ 5 -->
                    <form action="<?php echo site_url('Coop_student/IN_S004/save');?>" method="post">
                    <label for="name"><b>๕. การรับเอกสารติดต่อจากทางมหาวิทยาลัย </b></label>
                        <div class="row">
                
                                    <div class="col-md-6 col-form-label">
                                        <div class="form-check checkbox">
                                        &nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" value="0" id="radio1" name="newsletter_receive" <?php if ($coop_student['newsletter_receive'] == 0) echo 'checked'; ?> >
                                            <label class="form-check-label" for="radio1">
                                            ไม่รับ โดยจะติดตามข่าวสารจาก <u>http://www.informatics.buu.ac.th/coop</u>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-form-label">
                                        <div class="form-check checkbox">
                                        &nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" value="1" id="radio2"  name="newsletter_receive" <?php if ($coop_student['newsletter_receive'] == 1) echo 'checked'; ?> >
                                            <label class="form-check-label" for="radio2">
                                            รับเอกสารจากมหาวิทยาลัย โดยขอให้ส่งไปที่ ที่พัก
                                            </label>
                                        </div>
                                    </div>
                           
                                    <div class="col-md-6 col-form-label">
                                        <div class="form-check checkbox">
                                        &nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" value="2" id="radio3"  name="newsletter_receive" <?php if ($coop_student['newsletter_receive'] == 2) echo 'checked'; ?> >
                                            <label class="form-check-label" for="radio3">
                                            รับเอกสารจากมหาวิทยาลัย โดยขอให้ส่งไปที่ สถานประกอบการ                            
                                            </label>
                                        </div>
                                    </div>                       
                    
                                                  
                        </div>
                      <!-- ปิดข้อ 5 -->
                       <!-- ข้อ 6 -->
                    <label for="name"><b>๖.	ชื่อที่อยู่ ผู้ที่สามารถติดต่อได้กรณีฉุกเฉิน</b></label>
                    <div class="row">
                          <div class="form-group col-sm-8">
                               <label>ชื่อ - สกุล  </label><code>*</code>
                               <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $coop_student_emergency_contact['fullname'] ;?>" required>                          
                          </div>
                          <div class="form-group col-sm-2">
                               <label>เลขที่ </label><code>*</code>
                               <input type="text" class="form-control" id="number" name="number" value="<?php echo $coop_student_emergency_contact['number'] ;?>" required>                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>ซอย </label><code>*</code>
                               <input type="text" class="form-control" id="alley" name="alley" value="<?php echo $coop_student_emergency_contact['alley'] ;?>" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>ถนน </label><code>*</code>
                               <input type="text" class="form-control" id="road" name="road" value="<?php echo $coop_student_emergency_contact['road'] ;?>" required>                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>แขวง/ตำบล </label><code>*</code>
                               <input type="text" class="form-control" id="district" name="district" value="<?php echo $coop_student_emergency_contact['district'] ;?>" required>                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>เขต/อำเภอ </label><code>*</code>
                               <input type="text" class="form-control" id="area" name="area" value="<?php echo $coop_student_emergency_contact['area'] ;?>" required>                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>จังหวัด </label><code>*</code>
                               <input type="text" class="form-control" id="province" name="province" value="<?php echo $coop_student_emergency_contact['province'] ;?>" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>รหัสไปรษณีย์</label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?php echo $coop_student_emergency_contact['postal_code'] ;?>" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>โทรศัพท์</label><code>*</code>
                               <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $coop_student_emergency_contact['telephone'] ;?>" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>โทรสาร </label>
                               <input type="text" class="form-control" id="fax_number" name="fax_number" value="<?php echo $coop_student_emergency_contact['fax_number'] ;?>" >                          
                          </div>                       
                        </div>
    
                      <!-- ปิดข้อ 6 -->
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">บันทึก </button>
                            <button type="reset" class="btn btn-secondary">ยกเลิก </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</main>


<style>
/*progressbar*/
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
}
#progressbar li {
	list-style-type: none;
	color: #000;
	text-transform: uppercase;
	font-size: 9px;
	width: 33.33%;
	/* width: 25%; */
    text-align: center;
	float: left;
	position: relative;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: white;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background: #27AE60;
	color: white;
}
</style>

<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery.thailand/dependencies/JQL.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery.thailand/dependencies/typeahead.bundle.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/jquery.thailand/dist/jquery.Thailand.min.css');?>">
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery.thailand/dist/jquery.Thailand.min.js');?>"></script>
<script>
$.Thailand({
    $district: $('#district'), // input ของตำบล
    $amphoe: $('#area'), // input ของอำเภอ
    $province: $('#province'), // input ของจังหวัด
    $zipcode: $('#postal_code'), // input ของรหัสไปรษณีย์
});
</script>
