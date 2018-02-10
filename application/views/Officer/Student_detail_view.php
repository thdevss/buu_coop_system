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
                              <dt class="col-sm-3">ชื่อ-นามสกุล</dt>
                              <dd><?php echo $student['fullname'];?></dd>
                              </dl>

                              <dl class="row">
                              <dt class="col-sm-3">รหัสนิสิต</dt>
                              <dd><?php echo $student['id'];?></dd>
                              </dl>

                              <dl class="row">
                              <dt class="col-sm-3">ชั้นปี</dt>
                              <dd>4</dd>
                              </dl>

                              <dl class="row">
                              <dt class="col-sm-3">หลักสูตร</dt>
                              <dd><?php echo $department['name'];?></dd>
                              </dl>

                              <dl class="row">
                              <dt class="col-sm-3">สาขา</dt>
                              <dd><?php echo $department['name'];?></dd>
                              </dl>

                              <dl class="row">
                              <dt class="col-sm-3">ชื่อเล่น</dt>
                              <dd>ปืน</dd>
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
                              <dt class="col-sm-3">สถานะ</dt>
                              <dd><?php echo $coop_status_type['status_name']; ?></dd>
                              </dl>

                              <dl class="row">
                              <dt class="col-sm-3">สถานะสอบ</dt>
                              <dd><?php echo $coop_status_type['status_name']; ?></dd>
                              </dl>
                                    
                        
                        </div>
                      </div>
                    </div>
          
                      <div class="col-lg-6">
                        <div class="card">
                          <div class="card-header"><i class="fa fa-align-justify"></i> ข้อมูลสถานประกอบการ</div>
                            <div class="card-body">
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>        