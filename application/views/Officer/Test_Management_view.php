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
                        
                        <td><button type="close" class="btn btn-danger"><i class="fa fa-rss"></i> ลบ</button></td>
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
                      <label class="col-md-4 form-control-label" for="text-input">รหัสนิสิต</label>
                      <input type="text" class="form-control" id="" name="id" placeholder="กรุณากรอก">
                      </div>
                    </div>  
              <!--รหัสนิสิต-->
                    <!--สอบรอบที่-->
                    <div class="form-group row">
                      <div class="col-md-9">
                      <label class="col-md-4 form-control-label" for="text-input">สอบรอบที่</label>
                        <select id="select" name="select" class="form-control">
                          <option value="">Please select</option>

                          <?php foreach ($coop_test_list as $row) { ?>
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
