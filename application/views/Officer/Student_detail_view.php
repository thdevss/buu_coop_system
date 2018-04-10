
<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>

                <div class="container-fluid">
                  <div class="animated fadeIn">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="row">

                            <div class="col-lg-12">
                              <div class="card">
                                <div class="card-header"><i class="fa fa-align-justify"></i> รายละเอียดนิสิต</div>
                                <div class="card-body">
                                    <dl class="row">
                                    <dt class="col-sm-4">ชื่อ-นามสกุล</dt>
                                    <dd><?php echo $student['fullname'];?></dd>
                                    </dl>

                                    <dl class="row">
                                    <dt class="col-sm-4">รหัสนิสิต</dt>
                                    <dd><?php echo $student['id'];?></dd>
                                    </dl>

                                    <dl class="row">
                                    <dt class="col-sm-4">ชั้นปี</dt>
                                    <dd><?php echo get_student_level_from_entry_year($student_profile['Entry_Years']);?></dd>
                                    </dl>

                                    <dl class="row">
                                    <dt class="col-sm-4">หลักสูตร</dt>
                                    <dd><?php echo $student_profile['Course'];?></dd>
                                    </dl>

                                    <dl class="row">
                                    <dt class="col-sm-4">สาขา</dt>
                                    <dd><?php echo $department['name'];?></dd>
                                    </dl>

                                    <dl class="row">
                                    <dt class="col-sm-4">ชื่อเล่น</dt>
                                    <dd><?php echo isEmptyText($student_profile['Student_Nickname']); ?></dd>
                                    </dl>

                                    <dl class="row">
                                    <dt class="col-sm-4">จำนวนหน่วยกิจที่เรียนแล้ว</dt>
                                    <dd><?php echo isEmptyText();?></dd>
                                    </dl>

                                    <dl class="row">
                                    <dt class="col-sm-4">GPAX</dt>
                                    <dd><?php echo $student_profile['GPAX']; ?></dd>
                                    </dl>

                                </div>
                              </div>
                            </div>   

                            <div class="col-lg-12">
                            <div class="card">
                              <div class="card-header"><i class="fa fa-align-justify"></i> ข้อมูลติดต่อ</div>
                              <div class="card-body">
                                <dl class="row">
                                  <dt class="col-sm-4">เบอร์โทรศัพท์</dt>
                                  <dd><?php echo isEmptyText($student_profile['Student_Phone']); ?></dd>
                                </dl>

                                <dl class="row">
                                  <dt class="col-sm-4">อีเมล</dt>
                                  <dd><?php echo isEmptyText($student_profile['Student_Email']); ?></dd>
                                </dl>

                                <dl class="row">
                                  <dt class="col-sm-4">เฟสบุ๊ค</dt>
                                  <dd><?php echo isEmptyText($student_profile['Facebook']); ?></dd>
                                </dl>

                                <dl class="row">
                                  <dt class="col-sm-4">Line ID</dt>
                                  <dd><?php echo isEmptyText($student_profile['Line']); ?></dd>
                                </dl>
                                        
                          
                              </div>
                            </div>
                          </div>

                           



                        </div>


                      </div>

                      <div class="col-lg-6">
                        <div class="row">

                         <div class="col-lg-12">
                              <div class="card">
                                <div class="card-header"><i class="fa fa-align-justify"></i> ข้อมูลสหกิจศึกษา</div>
                                  <div class="card-body">

                                    <dl class="row">
                                    <dt class="col-sm-4">สถานะ</dt>
                                    <dd><?php echo $coop_status_type['status_name']; ?></dd>
                                    </dl>

                                    <dl class="row">
                                    <dt class="col-sm-4">วิชาแกน</dt>
                                    <dd>
                                      <label class="switch switch-text switch-pill switch-success-outline-alt">
                                        <input type="checkbox" value="1" name="student_pass_subject" class="switch-input" <?php if($student['student_pass_subject'] == 1) echo "checked"; ?>>
                                        <span class="switch-label" data-on="On" data-off="Off"></span>
                                        <span class="switch-handle"></span>
                                      </label>
                                    </dd>
                                    &nbsp;&nbsp;<dd><a href="<?php echo site_url('');?>">ตรวจสอบสถานะจากระบบโปรไฟล์</a></dd>
                                    </dl>

                                    <dl class="row">
                                      <dt class="col-sm-4">จำนวนชั่วโมงอบรม</dt>
                                      <dd><a href="<?php echo site_url('Officer/Student_list/training_history_student/'.$student['id']);?>">ประวัติการอบรมของนิสิตคนนี้</a></dd>
                                    </dl>

                                    <dl class="row">
                                      <dt class="col-sm-4">
                                        <ul>
                                          <li>วิชาการ</li>
                                          <li>เตรียมความพร้อม</li>
                                        </ul>
                                      </dt>
                                      <dd>
                                        <ul class="list-unstyled">
                                          <li><?php echo $train_type[0]['check_hour'];?> / <?php echo $train_type[0]['total_hour'];?> ชั่วโมง</li>
                                          <li><?php echo $train_type[1]['check_hour'];?> / <?php echo $train_type[1]['total_hour'];?> ชั่วโมง</li>
                                        </ul>
                                      </dd>
                                    </dl>
                              </div>
                            </div>
                          </div>

                          
        
                          

                        <?php
                        if(@$coop_student) {
                        ?>
              
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="card-header"><i class="fa fa-align-justify"></i> ข้อมูลสถานประกอบการ</div>
                              <div class="card-body">
                                <dl class="row">
                                  <dt class="col-sm-4">ชื่อสถานประกอบการ</dt>
                                  <dd><?php echo $company['name_th'] ?></dd>
                                </dl>

                                <dl class="row">
                                  <dt class="col-sm-4">ตำแหน่งงานที่สมัคร</dt>
                                  <dd><?php echo $job['position_title'] ?></dd>
                                </dl>

                                <dl class="row">
                                  <dt class="col-sm-4">อาจารย์ที่ปรึกษา</dt>
                                  <dd><?php echo $adviser['fullname'] ?></dd>
                                </dl>

                                <dl class="row">
                                  <dt class="col-sm-4">พี่เสี่ยง</dt>
                                  <dd><?php echo $trainer['fullname'] ?></dd>
                                </dl>

                                <dl class="row">
                                  <dt class="col-sm-4">ผลการประเมิน</dt>
                                  <dd><a href="<?php echo site_url('Officer/Coop_student_assessment_result/assessment_detail/'.$student['id']); ?>">ดูผลการประเมิน</a></dd>
                                </dl>

                              </div>
                            </div>
                          </div>
                        <?php } ?>


                        </div>
                      </div>






                      

                      
                    </div>
                  </div>
                </div>   
</main>     



<script>
jQuery("input:checkbox").on('click', function() {
    var status_val = 0
    if(jQuery(this).prop("checked")) {
      status_val = 1
    }
        var datastring = "student_id=<?php echo $student['id'];?>&student_pass_subject="+status_val
        jQuery.post(SITE_URL+"/officer/Student_list/update_pass_subject", datastring, function(response) {
            if(response.status) {
                toastr["success"]("ok ja")
            } else {
                toastr["error"]("err ja")
            }
        }, 'json');

});




</script>