<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>อัพโหลดเอกสาร<?php echo $document['document_name'];?></div>
                 <div class="card-body text-center  ">
                 <?php echo form_open_multipart('student/upload_document');?>
                  <?php 
                  if(@$status == 'success') {
                    echo '<div class="alert alert-success" role="alert"><strong>สำเร็จ!</strong></div>';
                  } else if(@$status == 1) {
                    echo '<div class="alert alert-info" role="alert"><strong>ข้อควรรู้!</strong> โปรดอัพโหลดไฟล์ .pdf, .docx ขนาดไม่เกิน 500kb</div>';
                  } else {
                    echo '<div class="alert alert-warning" role="alert"><strong>ผิดพลาด!</strong> '.@$status.'</div>';
                  }
                  
                  if(@$old_document) {
                    echo '<div class="alert alert-warning" role="alert"><strong>โปรดระวัง!</strong> เอกสารชุดนี้เคยถูกอัพโหลดแล้ว, <a href="'.base_url($old_document['pdf_file']).'">คลิ้กเพื่อดูไฟล์</a></div>';
                  }
                  ?>

                  <div class="text-center">
                      <label class="form-control-label" for="">เลือกประเภทเอกสาร</label>
                      <select class="form-control" style="width:50%; margin: 0 auto;" name="coop_document_id" required>
                        <option disabled> ---- </option>
                        <?php foreach($ins007 as $row) { ?>
                          <option><?php echo $row['petition_subject'];?></option>
                        <?php } ?>
                        

                      </select>
                  </div>
                  <div style="height:20px;"></div>

                  <div class="text-center">
                      <label class="form-control-label" for="file-input">เลือกไฟล์เอกสาร</label>
                      <input type="file" name="file-input">
                  </div>
                  <input type="hidden" name="code" value="<?php echo $document['name'];?>">
                  
              <div class="text-center" style="margin-top:70px;">
                  <button type="submit" class="btn btn-md btn-primary"><i class="fa fa-dot-circle-o"></i>อัพโหลดเอกสาร</button>
                </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
