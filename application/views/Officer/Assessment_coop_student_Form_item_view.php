<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">จัดการหัวข้อย่อยแบบประเมินผลการฝึกงานของนิสิตสหกิจ</li>
</ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
              <div class="row" >
              <!--table รายชื่อนิสิต-->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> จัดการหัวข้อย่อยแบบประเมินผลการฝึกงานของนิสิตสหกิจ
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add_item_form">
                          เพิ่มหัวข้อการประเมิน
                        </button>
                    </div>
                      <div class="card-body">
                    
                    
                      <table class="table table-bordered datatable" >
                            <thead>
                              <tr bgcolor="">
                                <th>ลำดับหัวข้อย่อย</th>
                                <th>การให้คะแนน</th>
                                <th>หัวข้อย่อยการประเมิน</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach($coop_student_questionnaire_item as $row) { ?>
        
                              <tr>
                                <td><?php echo $row['number'];?></td>
                                <td><?php echo $row['type'];?></td>
                                <td><?php echo $row['title'];?></td>
                                <td>
                                  <a href="#" data-itemid="<?php echo $row['id'];?>" class="btn btn-info editBtn">แก้ไข</a>
                                  <a href="<?php echo site_url('officer/Assessment_coop_student_Form/delete_coop_student_questionnaire_item/'.$row['id']);?>" class="btn btn-danger" onclick="return confirmDelete(this)">ลบ</a>
                                </td>
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


</main>

<div class="modal fade" id="add_item_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <input type="hidden" name="subject_id" value="<?php echo $subject['id']; ?>">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>ลำดับหัวข้อย่อย</label>
                    <input type="text" id="number" name="number" class="form-control" placeholder="กรุณากรอก" value="<?php echo $next_number;?>" required>
                  </div>
                  
                  <div class="form-group">
                    <label>ชื่อหัวข้อย่อยการประเมิน</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="กรุณากรอก" required>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-4 col-form-label">การให้คะแนน</label>
                    <div class="col-md-4 col-form-label">
                      <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" type="radio" id="inline-radio1" value="score" name="type" required>
                      <label class="form-check-label" for="inline-radio1">คะแนน 1 - 5</label>
                      </div>
                    </div>
                    <div class="col-md-4 col-form-label">
                      <div class="form-check form-check-inline mr-2">
                      <input class="form-check-input" type="radio" id="inline-radio2" value="comment" name="type" required>
                      <label class="form-check-label" for="inline-radio2">ความคิดเห็น</label>
                      </div>
                    </div>
                  </div>

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






<div class="modal fade" id="edit_item_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">แก้ไขหัวข้อย่อยการประเมิน</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
            </div>
            <form action="<?php echo site_url('Officer/Assessment_coop_student_Form/update_coop_student_questionnaire_item');?>" method="post">
              <div class="modal-body">
                <input type="hidden" name="item_id" id="item_id">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>ลำดับหัวข้อย่อย</label>
                    <input type="text" id="item_number" name="number" class="form-control" placeholder="กรุณากรอก" disabled>
                  </div>
                  
                  <div class="form-group">
                    <label>ชื่อหัวข้อย่อยการประเมิน</label>
                    <input type="text" id="item_title" name="title" class="form-control" placeholder="กรุณากรอก" required>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-4 col-form-label">การให้คะแนน</label>
                    <div class="col-md-4 col-form-label">
                      <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" type="radio" id="type_score" value="score" name="type" required>
                      <label class="form-check-label" for="type_score">คะแนน 1 - 5</label>
                      </div>
                    </div>
                    <div class="col-md-4 col-form-label">
                      <div class="form-check form-check-inline mr-2">
                      <input class="form-check-input" type="radio" id="type_comment" value="comment" name="type" required>
                      <label class="form-check-label" for="type_comment">ความคิดเห็น</label>
                      </div>
                    </div>
                  </div>

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


<script>
jQuery(".editBtn").click(function(event) {
  var item_id = jQuery(this).data('itemid')
  //ajax get
  jQuery.get( SITE_URL+"/officer/Assessment_coop_student_Form/get_ajax_item/"+item_id, function( result ) {
    var data = result.data
    jQuery("#item_title").val(data.title)
    jQuery("#item_number").val(data.number)
    jQuery("#item_id").val(data.id)

    if(data.type == 'score') {
      jQuery("#type_score").prop('checked', true);
    }
    if(data.type == 'comment') {
      jQuery("#type_comment").prop('checked', true);
    }

    jQuery('#edit_item_form').modal('show')
    
    
  }, "json" );
})

</script>