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
              <strong>สำเร็จ!</strong>
            </div>';
            } else if(@$status == 'successupdate') {
              echo '<div class="alert alert-success" role="alert">
              <strong>สำเร็จ!</strong> 
            </div>';
            } else if (@$status == 'error') {
              echo '<div class="alert alert-danger" role="alert">
              <strong>ล้มเหลว!</strong>
            </div>';
            }?>
            <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-8">
            <form action=<?php echo site_url("Coop_student/Reportmanager/post_report"); ?> method="post" class="form-horizontal">
                 <div class="form-group row">
                      <div class="col-md-6">
                      <label class="col-md-5" for="text-input">หัวข้อภาษาไทย</label>
                        <input type="text" id="text-input" name="subject_th" class="form-control" value="<?php echo @$row->subject_th ?>" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6"> 
                      <label class="col-md-5" for="text-input">หัวข้อภาษาอังกฤษ</label>
                        <input type="text" id="text-input" name="subject_en" class="form-control" value="<?php echo @$row->subject_en ?>" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                      <label class="col-md-6 form-control-label" for="textarea-input">รายละเอียดเนื้อหาของรายงาน</label>
                        <textarea id="textarea-input" name="report_detail" rows="9" class="form-control" required><?php echo @$row->report_detail?></textarea>
                      </div>
                    </div>
                    </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-md btn-primary"><i class="fa fa-dot-circle-o"></i>พิมพ์เอกสาร</button>
                      <button type="submit" class="btn btn-md btn-success"><i class="fa fa-dot-circle-o"></i>บันทึกเอกสาร</button>

                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
