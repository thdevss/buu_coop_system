<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">จัดการข้อมูลรับสมัครการสอบ</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>จัดการข้อมูลรับสมัครการสอบ</div>
            <div class="card-body">
             <!--ส่วนของ Button Modal-->
            <div class="text-right">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">ขึ้นปีการศึกษาใหม่</button>
            </div>
             <!--ส่วนของ Button Modal-->
            <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>ครั้ง</th>
                        <th>วันที่สอบ</th>
                        <th>สถานะการรับสมัครสอบ</th>
                      </tr>
                    </thead>
                    <?php foreach ($data as $row) { ?>
                    <tbody>
                      <tr>
                        <td><?php echo $row->name ?></td>
                        <td><?php echo $row->test_date ?></td>
                        <td>
                        <label class="switch switch-text switch-pill switch-success-outline-alt">
                         <input type="checkbox" class="switch-input" <?php if($row->register_status == 1) echo 'checked=""' ?>>
                         <span class="switch-label" data-on="On" data-off="Off"></span>
                         <span class="switch-handle"></span>
                        </label>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
            </div>
            <!--ส่วนของ Modal-->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title icon-magnifier-add"> เพิ่ม</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
              </div>
              <div class="modal-body">
              <!--ปีการศึกษา-->
              <form action="<?php echo site_url('officer/Train_register_management/post_register_Train');?>" method="post">
              <div class="form-group row">
                      <label class="col-md-3 form-control-label" for="text-input">ปีการศึกษา</label>
                      <div class="col-md-9">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter year">
                      </div>
                    </div>  
              <!--ปีการศึกษา-->
              <!--สอบรอบที่-->
              <div class="form-group row">
                      <label class="col-md-3 form-control-label" for="text-input">สอบรอบที่</label>
                      <div class="col-md-9">
                        <select id="select" name="select" class="form-control">
                          <option value="">Please select</option>
                          <option value="สอบรอบที่1">สอบรอบที่1</option>
                          <option value="สอบรอบที่2">สอบรอบที่2</option>
                          <option value="สอบรอบที่3">สอบรอบที่3</option>
                          <option value="สอบรอบที่4">สอบรอบที่4</option>
                        </select>
                      </div>
                    </div>
                <!--สอบรอบที่-->
                <!--วันที่สอบ-->
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label" for="text-input">วันที่สอบ</label>
                      <div class="col-md-9">
                        <input type="date" class="form-control" id="" name="test_date">                      
                        <input type="time" class="form-control" id="" name="test_date">
                      </div>
                    </div>  
              </div>
              <!--วันที่สอบ-->
              <div class="modal-footer">
                <button type="close" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-rss"></i>ปิด</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-star"></i>บันทึก</button>
              </div>
            </div>
            </div>
            </div>
        </div>
         <!--ส่วนของ Modal-->
      </div>
    </div>
  </div>
</div>
