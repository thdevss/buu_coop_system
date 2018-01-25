<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">จัดการกิจกรรมฝึกงานในเเต่ล่ะวัน</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> เเก้ไข</div>
                    <div class="card-body">             
                        <form id="train_location_form">
                            <input type="hidden" name="id" id="id" value="<?php echo @$row->id;?>">
                            <div class="row">
                                <div class="form-group col-md-6 offset-md-3">
                                    <label for="building">ประจำวันที่</label>          
                                    <input value="<?php echo @$data->date;?>" class="form-control" type="text" name="building" id="building">
                                </div>

                                <div class="form-group col-md-6 offset-md-3">
                                    <label for="room">หัวข้อ</label>          
                                    <input value="<?php echo @$data->activity_subject;?>" class="form-control" type="text" name="activity_subject" id="activity_subject">
                                </div>

                                <div class="form-group col-md-6 offset-md-3">
                                    <label for="detail">รายละเอียด</label>          
                                    <textarea id="summernote" name="activity_content" required><?php echo @$data->activity_content;?></textarea>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="reset" class="btn btn-warning" name="" value="1"><i class="fa fa-dot-circle-o"></i> ยกเลิก</button>                                
                                    <button type="submit" class="btn btn-primary" name="save" value="1"><i class="fa fa-dot-circle-o"></i> บันทึกข้อมูล</button>                
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</main>

<script src="<?php echo base_url('/assets/js/officer/train_location_form.js?'.time());?>"></script>
<!-- include summernote css/js -->
<link href="<?php echo base_url('assets/plugins/summernote/summernote-lite.css');?>" rel="stylesheet">
<script src="<?php echo base_url('assets/plugins/summernote/summernote-lite.js');?>"></script>
<script>
window.onload = function() {
    $('#summernote').summernote({
        height:300,
    });
}
</script>