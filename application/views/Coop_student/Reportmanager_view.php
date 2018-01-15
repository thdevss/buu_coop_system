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
               
                 <div class="form-group row">
                      <label class="col-md-3" for="text-input">หัวข้อภาษาไทย</label>
                      <div class="col-md-6">
                      <?php foreach ($data as $row) { ?>
                        <input type="text" id="text-input" name="text-input" class="form-control" placeholder="<?php echo $row->subject_th ?>">
                        <?php  } ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3" for="text-input">หัวข้อภาษาอังกฤษ</label>
                      <div class="col-md-6"> 
                        <input type="text" id="text-input" name="text-input" class="form-control" placeholder="<?php echo $row->subject_en ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label" for="textarea-input">รายละเอียดเนื้อหาของรายงาน</label>
                      <div class="col-md-6">
                        <textarea id="textarea-input" name="textarea-input" rows="9" class="form-control" placeholder="<?php echo $row->report_detail?>"></textarea>
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
