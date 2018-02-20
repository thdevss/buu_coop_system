
<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">รายชื่อนิสิต</li>
</ol>

                <div class="container-fluid">
                  <div class="animated fadeIn">
                    <div class="row">
                      <div class="col-lg-6">
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
                              <dd>รอกลุ่ม Profile</dd>
                              </dl>

                              <dl class="row">
                              <dt class="col-sm-4">หลักสูตร</dt>
                              <dd>รอกลุ่ม Profile</dd>
                              </dl>

                              <dl class="row">
                              <dt class="col-sm-4">สาขา</dt>
                              <dd><?php echo $department['name'];?></dd>
                              </dl>

                              <dl class="row">
                              <dt class="col-sm-4">ชื่อเล่น</dt>
                              <dd>รอกลุ่ม Profile</dd>
                              </dl>

                              <dl class="row">
                              <dt class="col-sm-4">จำนวนหน่วยกิจที่เรียนแล้ว</dt>
                              <dd>รอกลุ่ม Profile</dd>
                              </dl>

                              <dl class="row">
                              <dt class="col-sm-4">GPAX</dt>
                              <dd>รอกลุ่ม Profile</dd>
                              </dl>

                        </div>
                      </div>
                    </div>

                      <div class="col-lg-6">
                        <div class="card">
                          <div class="card-header"><i class="fa fa-align-justify"></i> ข้อมูลติดต่อ</div>
                            <div class="card-body">
                                    
                       
                        </div>
                      </div>
                    </div>
     
                      <div class="col-lg-6">
                        <div class="card">
                          <div class="card-header"><i class="fa fa-align-justify"></i> ข้อมูลสหกิจศึกษา</div>
                            <div class="card-body">
                            <dl class="row">
                              <dt class="col-sm-4">สถานะ</dt>
                              <dd>
                              <?php if($coop_test_status['coop_test_status'] == 0){ ?>
                              <?php echo 'ไม่พบผลลัพธ์'; ?></dd>
                              <?php } ?>
                              </dl>

                              <dl class="row">
                              <dt class="col-sm-4">สถานะสอบ</dt>
                              <dd><?php echo $coop_status_type['status_name']; ?></dd>
                              </dl>

                              <dl class="row">
                              <dt class="col-sm-4">วิชาแกน</dt>
                              <dd>รอกลุ่ม Profile</dd>
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
                                    <li><?php echo $train_type[0]['check_hour'];?> / <?php echo $train_type[0]['total_hour'];?></li>
                                    <li><?php echo $train_type[1]['check_hour'];?> / <?php echo $train_type[1]['total_hour'];?></li>
                                  </ul>
                                </dd>
                              </dl>
                        </div>
                      </div>
                    </div>

                    <?php
                    if(@$coop_student) {
                    ?>
          
                      <div class="col-lg-6">
                        <div class="card">
                          <div class="card-header"><i class="fa fa-align-justify"></i> ข้อมูลสถานประกอบการ</div>
                          <div class="card-body">
                            <dl class="row">
                              <dt class="col-sm-4">ชื่อสถานประกอบการ</dt>
                              <dd><?php echo $company['name_th'] ?></dd>
                            </dl>

                            <dl class="row">
                              <dt class="col-sm-4">ตำแหน่งงานที่สมัคร</dt>
                              <dd><?php echo $company['name_th'] ?></dd>
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
                              <dd><a href="#">ดูผลการประเมิน</a></dd>
                            </dl>

                          </div>
                        </div>
                      </div>
                    <?php } ?>
                    </div>
                  </div>
                </div>   
</main>     