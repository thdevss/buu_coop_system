<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">ประเมินผลการฝึกงานของนิสิต</li>
</ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
              <div class="row" >
              <!--table รายชื่อนิสิต-->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> ประเมินผลการฝึกงานของนิสิต
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">
                        เพิ่มหัวข้อการประเมิน
                        </button>
                    </div>
                      <div class="card-body">
                    
                    
                      <table class="table table-bordered datatable" >
                            <thead>
                              <tr bgcolor="">
                                <th>ลำดับหัวข้อย่อย</th>
                                <th>หัวข้อย่อยการประเมิน</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach($coop_student_questionnaire_item as $row){?>
        
                              <tr>
                                <td><?php echo $row['number'];?></td>
                                <td><?php echo $row['title'];?></td>
                              </tr>

                            <?php } ?> 
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มหัวข้อย่อยการประเมิน</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
            </div>
            <form action="<?php echo site_url('Officer/Assessment_coop_student_Form/add_coop_student_questionnaire_item');?>" method="post">
              <div class="modal-body">
                <div class="col-md-12">
                  <label>ลำดับหัวข้อย่อย</label>
                  <input type="text" id="number" name="number" class="form-control" placeholder="กรุณากรอก" required>
                  <input type="hidden" name="subject_id" value="<?php echo $subject['id']; ?>">
                  <input type="hidden" name="subject_term_id" value="<?php echo $subject['term_id']; ?>">
                  <label>ชื่อหัวข้อย่อยการประเมิน</label>
                  <input type="text" id="title" name="title" class="form-control" placeholder="กรุณากรอก" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-success">บันทึก</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
      <!-- /.modal-dialog -->
</div>