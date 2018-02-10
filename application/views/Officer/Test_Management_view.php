<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">จัดการข้อมูลนิสิตเข้าสอบ</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>จัดการข้อมูลนิสิตเข้าสอบ
          <div class="text-right">
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal"><i class="fa fa-star"></i> เพิ่ม</button>
            </div>
          </div>
            <div class="card-body">
            <?php 
            if($status){
              echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
            }
     
             ?>

              <div class="container-fluid">
                  <form action="" method="post" class="form-horizontal">
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="hf-email">เลือกครั้งการสอบ</label>
                      <div class="col-md-10">
                        <select name="form_id" id="form_id" class="form-control">
                          <option> ------ </option>
                          <?php
                          foreach($coop_test_list as $test) { 
                            echo '<option value="'.$test['id'].'">'.$test['name'].' - '.$test['test_date'].'</option>';
                          }
                          ?>
                        </select>
                        <!-- <span class="help-block">Please enter your email</span> -->
                      </div>
                    </div>
                  </form>
                </div>


            <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th>รหัสนิสิต</th>
                        <th>ชื่อนิสิต</th>
                        <th>สาขา</th>
                        <th>สอบรอบที่</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach($data as $row) {
                      ?>

                      <tr>

                        <td><?php echo $row['student']->id;?></td>
                        <td><?php echo $row['student']->fullname;?></td>
                        <td><?php echo $row['student_field']->name;?></td>
                        <td><?php echo $row['coop_test']->name;?></td>
                        
                        <td>
                        <form action="<?php echo site_url('Officer/Test_Management/delete'); ?>" method="post">
                        <input type="hidden"   name="student_id" value="<?php echo $row['student']->id ; ?>">
                        <input type="hidden"  name="coop_test_id" value="<?php echo $row['coop_test']->id ; ?>">
                        <button type="submit" class="btn btn-danger btn-submit"><i class="fa fa-rss"></i> ลบ</button>

                        </form>
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

<!--ส่วนของ ModalLabel -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title icon-magnifier-add"> เพิ่ม</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body">
              <!--รหัสนิสิต-->
              <form action="<?php echo site_url('Officer/Test_Management/add');?>" method="post">
              <div class="form-group row">
                      <div class="col-md-9">
                      <label class="col-md-4 form-control-label" for="text-input"> รหัสนิสิต</label>
                      <input type="text" class="form-control" id="" name="id"  required placeholder="กรุณากรอก" >
                      </div>
                    </div>  
              <!--รหัสนิสิต-->
                    <!--สอบรอบที่-->
                    <div class="form-group row">
                      <div class="col-md-9">
                      <label class="col-md-4 form-control-label" for="text-input">สอบรอบที่</label>
                        <select id="select" name="select" class="form-control" required>
                          <option value="">Please select</option>

                          <?php foreach ($coop_test_list as $row) { 
                            if($row->register_status != 1){
                              continue;
                            }
                            ?>
                          <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <!--สอบรอบที่-->
              </div>
              <div class="modal-footer">
                <button type="close" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-rss"></i> ปิด</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-magic"></i> บันทึก</button>
              </div>
            </div>
            </div>
            </div>
            <!--ส่วนของ ModalLabel -->
<script>


$('.btn-submit').on('click',function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "คุณแน่ใจใช่ไหม",
        text: "ลบคำนิสิตที่เลือก",
        icon: "warning",
        buttons: true,
        dabgerMode: true
    })
    .then((isConfirm) => {
      if (isConfirm) {
        form.submit();
      } else {

      }
    })

});


</script>