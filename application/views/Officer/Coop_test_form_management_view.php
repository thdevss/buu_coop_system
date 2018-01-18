<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">จัดการข้อมูลรับสมัครการสอบ</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i>จัดการข้อมูลรับสมัครการสอบ
            <div class="text-right">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">ขึ้นปีการศึกษาใหม่</button>
            </div>
          </div>
            <div class="card-body">
             <!--ส่วนของ Button Modal-->
            
             <!--ส่วนของ Button Modal-->
                  <table class="table table-bordered datatable">
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



            
        </div>
      </div>
    </div>
  </div>
</div>










<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.16/jquery.datetimepicker.full.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.16/jquery.datetimepicker.css" />
<script>
jQuery(function() {
  jQuery('#datetimepicker3').datetimepicker({
    format:'Y-m-d H:i:00',
    inline:true,
    allowTimes:['00:00', '00:05', '00:10', '00:15', '00:20', '00:25', '00:30', '00:35', '00:40', '00:45', '00:50', '00:55', '01:00', '01:05', '01:10', '01:15', '01:20', '01:25', '01:30', '01:35', '01:40', '01:45', '01:50', '01:55', '02:00', '02:05', '02:10', '02:15', '02:20', '02:25', '02:30', '02:35', '02:40', '02:45', '02:50', '02:55', '03:00', '03:05', '03:10', '03:15', '03:20', '03:25', '03:30', '03:35', '03:40', '03:45', '03:50', '03:55', '04:00', '04:05', '04:10', '04:15', '04:20', '04:25', '04:30', '04:35', '04:40', '04:45', '04:50', '04:55', '05:00', '05:05', '05:10', '05:15', '05:20', '05:25', '05:30', '05:35', '05:40', '05:45', '05:50', '05:55', '06:00', '06:05', '06:10', '06:15', '06:20', '06:25', '06:30', '06:35', '06:40', '06:45', '06:50', '06:55', '07:00', '07:05', '07:10', '07:15', '07:20', '07:25', '07:30', '07:35', '07:40', '07:45', '07:50', '07:55', '08:00', '08:05', '08:10', '08:15', '08:20', '08:25', '08:30', '08:35', '08:40', '08:45', '08:50', '08:55', '9:00', '9:05', '9:10', '9:15', '9:20', '9:25', '9:30', '9:35', '9:40', '9:45', '9:50', '9:55', '10:00', '10:05', '10:10', '10:15', '10:20', '10:25', '10:30', '10:35', '10:40', '10:45', '10:50', '10:55', '11:00', '11:05', '11:10', '11:15', '11:20', '11:25', '11:30', '11:35', '11:40', '11:45', '11:50', '11:55', '12:00', '12:05', '12:10', '12:15', '12:20', '12:25', '12:30', '12:35', '12:40', '12:45', '12:50', '12:55', '13:00', '13:05', '13:10', '13:15', '13:20', '13:25', '13:30', '13:35', '13:40', '13:45', '13:50', '13:55', '14:00', '14:05', '14:10', '14:15', '14:20', '14:25', '14:30', '14:35', '14:40', '14:45', '14:50', '14:55', '15:00', '15:05', '15:10', '15:15', '15:20', '15:25', '15:30', '15:35', '15:40', '15:45', '15:50', '15:55', '16:00', '16:05', '16:10', '16:15', '16:20', '16:25', '16:30', '16:35', '16:40', '16:45', '16:50', '16:55', '17:00', '17:05', '17:10', '17:15', '17:20', '17:25', '17:30', '17:35', '17:40', '17:45', '17:50', '17:55', '18:00', '18:05', '18:10', '18:15', '18:20', '18:25', '18:30', '18:35', '18:40', '18:45', '18:50', '18:55', '19:00', '19:05', '19:10', '19:15', '19:20', '19:25', '19:30', '19:35', '19:40', '19:45', '19:50', '19:55', '20:00', '20:05', '20:10', '20:15', '20:20', '20:25', '20:30', '20:35', '20:40', '20:45', '20:50', '20:55', '21:00', '21:05', '21:10', '21:15', '21:20', '21:25', '21:30', '21:35', '21:40', '21:45', '21:50', '21:55', '22:00', '22:05', '22:10', '22:15', '22:20', '22:25', '22:30', '22:35', '22:40', '22:45', '22:50', '22:55', '23:00', '23:05', '23:10', '23:15', '23:20', '23:25', '23:30', '23:35', '23:40', '23:45', '23:50', '23:55'],
  });

})
</script>




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
                        <input class="form-control" id="datetimepicker3" name="test_date">                      
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
