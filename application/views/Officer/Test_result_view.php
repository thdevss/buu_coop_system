<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">จัดการผลการสอบของนิสิต</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>จัดการผลการสอบของนิสิต</div>
                 <div class="card-body text-center  ">
                 <?php echo form_open_multipart('coop_student/upload_document');?>
                  <?php 
                  if(@$status == 'success') {
                    echo '<div class="alert alert-success" role="alert"><strong>สำเร็จ!</strong></div>';
                  } else if(@$status == 1) {
                    echo '<div class="alert alert-info" role="alert"><strong>ข้อควรรู้!</strong> โปรดอัพโหลดไฟล์ .pdf, .docx ขนาดไม่เกิน 500kb</div>';
                  } else {
                    echo '<div class="alert alert-warning" role="alert"><strong>ผิดพลาด!</strong> '.@$status.'</div>';
                  }

                  if(@$old_document) {
                    echo '<div class="alert alert-warning" role="alert"><strong>โปรดระวัง!</strong> เอกสารชุดนี้เคยถูกอัพโหลดแล้ว, <a href="'.base_url($old_document->pdf_file).'">คลิ้กเพื่อดูไฟล์</a></div>';
                  }
                  ?>
                  <div class="row">
                  <div class="text-center col-sm-4">
                  
                  </div>
                  <div class="text-center col-sm-4">
                  <div class="form-group">
                      <label for="ccmonth">สอบครั้งที่</label>
                      <select class="form-control" id="" name="">
                        <option>--กรุณาเลือก--</option>
                        <?php foreach ($coop_test as $row) { ?>
                        <option value="<?php echo $row->id; ?>" ><?php echo $row->name; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                 <div class="text-center col-sm-12">
                      <label class="form-control-label" for="file-input">เลือกไฟล์เอกสาร</label>
                        <input type="file" name="file-input">
                </div>
                </div>
                  <input type="hidden" name="code" value="1">
                  
              <div class="text-center" style="margin-top:70px;">
                  <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-dot-circle-o"></i>อัพโหลดเอกสาร</button>
                </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>