<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">เพิ่ม | เเก้ไขข้อมูลโครงการอบรม</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>เพิ่ม | เเก้ไขข้อมูลโครงการอบรม</div>
              <div class="card-body">             
                 <form id="permit_form">
                    <div class="row">
                        <div class="form-group col-sm-8">
                            <label for="fullname">ประเภทโครงการ</label>          
                            <select class="form-control" type="text" class="form-control" name="train_type" id="train_type">
                            <?php 
                            foreach($train_type as $t) {
                                if($t->id == $data->train_type_id) {
                                    echo '<option value="'.$t->id.'" selected>'.$t->name.'</option>';
                                } else {
                                        echo '<option value="'.$t->id.'" >'.$t->name.'</option>';                           
                                }
                            } 
                            ?>               
                            </select>
                        </div>
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    <label for="student_code">ชื่อโครงการ</label>
                                    <input type="text" class="form-control" id="title" placeholder="" name="title" value="<?php echo $data->title?>">
                                </div>
                                 <div class="form-group col-sm-8">
                                    <label for="student_field">วิทยากร</label>
                                    <input type="text" class="form-control" id="lecturer" placeholder="" name="lecturer" value="<?php echo $data->lecturer ?>">
                                </div>
                                <div class="form-group col-sm-8">
                                    <label for="city">จำนวนที่นั่งเปิดรับ</label>
                                    <input type="text" class="form-control" id="number_of_seat" placeholder="" name="number_of_seat" value="<?php echo $data->number_of_seat ?>">
                                </div>
                                <div class="form-group col-sm-8">
                                    <label for="city">วันที่อบรม</label>
                                    <input type="text" class="form-control" id="" placeholder="" name="date" value="<?php echo $data->date ?>">    
                                </div>
                                <div class="form-group col-sm-8">
                                    <label for="room">เลือกห้อง</label>  
                                    <select class="form-control" type="text" class="form-control" name="train_location" id="train_location">
                                <?php 
                                            foreach($train_location as $r) {
                                                if($r->id == $data->train_location_id) {
                                                    echo '<option value="'.$r->id.'" selected>'.$r->room.'</option>';
                                                } else {
                                                    echo '<option value="'.$r->id.'" >'.$r->room.'</option>';       
                                                }
                                            } 
                                            ?>
                                            </select>
                                </div>
                                <div class="form-group col-sm-8">
                                    <label for="city">ระยะเวลาเปิดรับสมัคร</label>
                                    <input type="text" class="form-control" id="register_period" placeholder="" name="register_period" value"<?php echo $data->register_period ?>">
                                </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-sm btn-primary" name="save" value="1"><i class="fa fa-dot-circle-o"></i>บันทึกเอกสาร</button>                
                                            <button type="submit" class="btn btn-sm btn-primary" name="print" value="1"><i class="fa fa-dot-circle-o"></i>พิมพ์เอกสาร</button>
                                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src="<?php echo base_url('/assets/js/coop_student/permit_form.js?'.time());?>"></script>
