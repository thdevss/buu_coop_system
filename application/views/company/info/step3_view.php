<!-- Main content -->
<main class="main">
<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>

        <div class="container-fluid">
            <div class="animated fadeIn">
                <ul id="progressbar">
                    <li class="active">รายละเอียดเกี่ยวกับสถานประกอบการ / หน่วยงาน</li>
                    <li class="active">ชื่อผู้จัดการสถานประกอบการ/หัวหน้าหน่วยงาน</li>
                    <li class="active">ข้อตกลง, สวัสดิการที่เสนอให้นิสิตในระหว่างปฏิบัติงาน</li>
                    <li>เพิ่มตำแหน่งงาน</li>
                </ul>

                <div class="card">
                    <form action="<?php echo $form_url;?>" method="post">
                    <input type="hidden" name="company_id" value="<?php echo $company['company_id'];?>">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> ข้อตกลง, สวัสดิการที่เสนอให้นิสิตในระหว่างปฏิบัติงาน 
                    </div>
                    <div class="card-body">
                        
                        <label for="name"><b>ข้อตกลง</b></label>

                        <div class="row">
                            <div class="form-group col-sm-5">
                                <label>เวลาเริ่มงาน</label><code>*</code> <?php echo form_error('company_start_time'); ?>
                                <input type="time" class="form-control" id="company_start_time" name="company_start_time" value="<?php echo form_value_db('company_start_time', @$company['company_start_time']); ?>">                                
                            </div>
                            <div class="form-group col-sm-5">
                                <label>เวลาเลิกงาน</label><code>*</code> <?php echo form_error('company_end_time'); ?>
                                <input type="time" class="form-control" id="company_end_time" name="company_end_time" value="<?php echo form_value_db('company_end_time', @$company['company_end_time']); ?>">                                
                            </div>
                            <div class="form-group col-sm-2">
                                <label>จำนวนวันทำงาน</label><code>*</code> <?php echo form_error('company_work_day'); ?>
                                <input type="number" class="form-control" id="company_work_day" name="company_work_day" value="<?php echo form_value_db('company_work_day', @$company['company_work_day']); ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label>ข้อกำหนดอื่น ๆ </label><code>*</code> <?php echo form_error('company_agreement'); ?>
                                <textarea class="form-control" id="company_agreement" name="company_agreement"><?php echo form_value_db('company_agreement', @$company['company_agreement']); ?></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name">ต้องการนิสิตในสาขาวิชา (เลือกได้มากกว่า 1 สาขา)</label> <?php echo form_error('company_has_department'); ?> <code>*</code> 
                            </div>
                            <?php foreach($departments as $department) { ?>
                            <div class="form-group col-sm-4">
                                <input type="checkbox" name="company_has_department[]" value="<?php echo $department['department_id'];?>"> <label><?php echo $department['department_name'];?></label>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name">ระยะเวลาที่ต้องการให้นักศึกษาไปปฏิบัติงาน (สามารถเลือกได้มากกว่า 1 ช่วงเวลา)</label> <code>*</code>                       
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="checkbox" name="company_work_month[]" value="4|7"> <label>ภาคเรียนฤดูร้อน (เม.ษ. - ก.ค.)</label>
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="checkbox" name="company_work_month[]" value="8|12"> <label>ภาคเรียนที่ 1 (ส.ค. - ธ.ค.)</label>
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="checkbox" name="company_work_month[]" value="1|5"> <label>ภาคเรียนที่ 2 (ม.ค. - พ.ค.)</label>
                            </div>
                        </div>

                        <div style="height:20px;"></div>
                        <hr>
                        <div style="height:20px;"></div>

                        <label for="name"><b>สวัสดิการที่เสนอให้นิสิตในระหว่างปฏิบัติงาน</b></label>

                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label>ค่าตอบแทน</label><code>*</code> <?php echo form_error('benefit_wage'); ?>
                            </div>
                            <div class="form-group col-sm-5">
                                <input type="radio" name="benefit_wage" value="0"> <label>ไม่มี</label>
                            </div>
                            <div class="form-group col-sm-5">
                                <input type="radio" name="benefit_wage" value="1"> <label>มี</label><br>
                                ค่าใช้จ่าย <input type="text" id="benefit_wage_period" name="benefit_wage_period" value="<?php echo form_value_db('benefit_wage_period', @$company['benefit_wage_period']); ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label>ที่พัก</label><code>*</code> <?php echo form_error('benefit_dorm'); ?>
                            </div>
                            <div class="form-group col-sm-5">
                                <input type="radio" name="benefit_dorm" value="0"> <label>ไม่มี</label>
                            </div>
                            <div class="form-group col-sm-5">
                                <input type="radio" name="benefit_dorm" value="1"> <label>มี</label><br>
                                ค่าใช้จ่าย <input type="text" id="benefit_dorm_period" name="benefit_dorm_period" value="<?php echo form_value_db('benefit_dorm_period', @$company['benefit_dorm_period']); ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label>รถรับส่ง</label><code>*</code> <?php echo form_error('benefit_shuttlebus'); ?>
                            </div>
                            <div class="form-group col-sm-5">
                                <input type="radio" name="benefit_shuttlebus" value="0"> <label>ไม่มี</label>
                            </div>
                            <div class="form-group col-sm-5">
                                <input type="radio" name="benefit_shuttlebus" value="1"> <label>มี</label><br>
                                ค่าใช้จ่าย <input type="text" id="benefit_shuttlebus_period" name="benefit_shuttlebus_period" value="<?php echo form_value_db('benefit_shuttlebus_period', @$company['benefit_shuttlebus_period']); ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label>สวัสดิการอื่น ๆ </label><code>*</code> <?php echo form_error('benefit_other'); ?>
                                <textarea class="form-control" id="benefit_other" name="benefit_other"><?php echo form_value_db('benefit_other', @$company['benefit_other']); ?></textarea>
                            </div>
                        </div>



                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="<?php echo $back_url;?>" class="btn btn-secondary"> < ย้อนกลับ </a>                        
                            <button type="submit" class="btn btn-success">บันทึก > </button>
                            
                        </div>
                    </div>
                    </form>
                </div>
                


            </div>
        </div>

</main>


<style>
/*progressbar*/
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
}
#progressbar li {
	list-style-type: none;
	color: #000;
	text-transform: uppercase;
	font-size: 9px;
	/* width: 33.33%; */
	width: 25%;
    text-align: center;
	float: left;
	position: relative;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: white;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background: #27AE60;
	color: white;
}
</style>

<script>
$(document).ready(function(){
    $("#show").click(function(){
        $("#show_select").show();
    });

    $("#hide").click(function(){
        $("#show_select").hide();
    });
});
</script>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
       
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มตำแหน่งงาน</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <form action="<?php echo $work_form_url;?>/job_add" method="post">
            <div class="modal-body">   
                <input type="hidden" name="company_id" value="<?php echo $company['company_id'];?>">
            
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="job_title_id">ตำแหน่ง</label><code>*</code>
                        <select class="form-control" id="job_title_id" name="job_title_id">
                            <option value="">--กรุณาเลือก--</option>
                            <?php foreach($job_title as $row) {?>
                                <option value="<?php echo $row['job_title_id'];?>"><?php echo $row['job_title'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="number_of_employee">จำนวน</label><code>*</code>
                        <input type="number" min="1" class="form-control" id="number_of_employee" name="number_of_employee">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="col-md-8 form-control-label" for="textarea-input">ลักษณะงานที่นิสิตต้องปฏิบัติงาน<code>*</code></label>
                        <textarea id="textarea-input" name="job_description" rows="9" class="form-control" value=""></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-success">บันทึก</button>
            </div>
            </form>                        
        </div>
    </div>
</div>            
