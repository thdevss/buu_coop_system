<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">จัดการหัวข้อรายงาน</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>จัดการหัวข้อรายงาน</div>
            <div class="card-body">
            <?php 
            if(@$status == 'successinsert'){ 
              echo '<div class="alert alert-success" role="alert">
              <strong>Well done!</strong> You successfully read this important alert message.
            </div>';
            } else if(@$status == 'successupdate') {
              echo '<div class="alert alert-success" role="alert">
              <strong>Well done!</strong> You successfully read this important alert message.
            </div>';
            } else if (@$status == 'error') {
              echo '<div class="alert alert-danger" role="alert">
              <strong>Oh snap!</strong> Change a few things up and try submitting again.
            </div>';
            } ?>
      
            <form action=<?php echo site_url("Coop_student/Reportmanager/index"); ?> method="post" class="form-horizontal">
                 <div class="form-group row">
                      <label class="col-md-3" for="text-input">หัวข้อภาษาไทย</label>
                      <div class="col-md-6">
                        <input type="text" id="text-input" name="subject_th" class="form-control" value="<?php echo @$row->subject_th ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3" for="text-input">หัวข้อภาษาอังกฤษ</label>
                      <div class="col-md-6"> 
                        <input type="text" id="text-input" name="subject_en" class="form-control" value="<?php echo @$row->subject_en ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label" for="textarea-input">รายละเอียดเนื้อหาของรายงาน</label>
                      <div class="col-md-6">
                        <textarea id="textarea-input" name="report_detail" rows="9" class="form-control" value="<?php echo @$row->report_detail?>"></textarea>
                      </div>
                    </div>
              
          </div>
          <div class="card-footer text-center">
                  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>บันทึกเอกสาร</button>
                  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>พิมพ์เอกสาร</button>
                </div>
        </div>
      </div>
    </div>
  </div>
</div>
