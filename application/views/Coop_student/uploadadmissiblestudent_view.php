<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">แบบอนุญาติให้นิสิตไปปฏิบัติงานสหกิจ</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>อัฟโหลดเอกสารแบบอนุญาติให้นิสิตไปปฏิบัติงานสหกิจ</div>
                 <div class="card-body text-center  ">
                 <?php echo form_open_multipart('coop_student/uploadadmissiblestudent/upload');?>
                 <div class="text-center">
                      <label class="form-control-label" for="file-input">เลือกไฟล์เอกสาร</label>
                        <input type="file" name="file-input">
                </div>
              <div class="card-footer text-center">
                  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>อัฟโหลดเอกสาร</button>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
