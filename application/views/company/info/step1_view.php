<!-- Main content -->
<main class="main">
<!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
        <li class="breadcrumb-item active">ข้อมูลสถานประกอบการ</li>
    </ol>


        <div class="container-fluid">
            <div class="animated fadeIn">
                <ul id="progressbar">
                    <li class="active">รายละเอียดเกี่ยวกับสถานประกอบการ / หน่วยงาน</li>
                    <li>ชื่อผู้จัดการสถานประกอบการ/หัวหน้าหน่วยงาน</li>
                    <li>เพิ่มตำแหน่งงาน</li>
                </ul>

                <div class="card">
                    <form action="<?php echo $form_url;?>" method="post">
                    <input type="hidden" name="company_id" value="<?php echo $company['id'];?>">
                    
                    
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> รายละเอียดเกี่ยวกับสถานประกอบการ / หน่วยงาน 
                    </div>
                    <div class="card-body">
                        <?php if(validation_errors()) { ?>
                            <div class="alert alert-warning"><?php echo validation_errors();?></div>
                        <?php } ?>

                       <label for="name">ชื่อสถานประกอบการ / หน่วยงาน</label>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                
                                <label>(ภาษาไทย)</label><code>*</code>
                                <input type="text" class="form-control" id="name_th" name="name_th" value="<?php echo set_value('name_th', $company['name_th']); ?>" required>
                                <?php echo form_error('name_th', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>(ภาษาอังกฤษ)</label><code>*</code>
                                <input type="text" class="form-control" id="name_en" name="name_en" value="<?php echo set_value('name_en', $company['name_en']); ?>" required>
                                <?php echo form_error('name_en', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label>ที่อยู่เลขที่</label><code>*</code>
                                <input type="text" class="form-control" id="number" name="number" value="<?php echo set_value('number', $company_address['number']);?>" required>
                                <?php echo form_error('number', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                                
                            </div>

                            <div class="form-group col-sm-5">
                                <label>อาคาร</label><code>*</code>
                                <input type="text" class="form-control" id="building" name="building" value="<?php echo set_value('building', $company_address['building']);?>" required>
                                <?php echo form_error('building', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                            
                            </div>

                          <div class="form-group col-sm-4">
                               <label>ถนน</label>
                               <input type="text" class="form-control" id="road" name="road" value="<?php echo set_value('road', $company_address['road']);?>" required>
                               <?php echo form_error('road', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                          
                          </div>

                        </div>

                        <div class="row">

                          <div class="form-group col-sm-3">
                               <label>ซอย</label>
                               <input type="text" class="form-control" id="alley" name="alley" value="<?php echo set_value('alley', $company_address['alley']);?>" required>
                               <?php echo form_error('alley', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                         
                          </div>

                          <div class="form-group col-sm-3">
                               <label>แขวง</label><code>*</code>
                               <input type="text" class="form-control" id="district" name="district" value="<?php echo set_value('district', $company_address['district']);?>" required>
                               <?php echo form_error('district', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                          
                          </div>

                          <div class="form-group col-sm-3">
                               <label>เขต/อำเภอ</label><code>*</code>
                               <input type="text" class="form-control" id="area" name="area" value="<?php echo set_value('area', $company_address['area']);?>" required>
                               <?php echo form_error('area', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                          
                          </div>

                          <div class="form-group col-sm-3">
                               <label>จังหวัด</label><code>*</code>
                               <input type="text" class="form-control" id="province" name="province" value="<?php echo set_value('province', $company_address['province']);?>" required>
                               <?php echo form_error('province', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                            
                            </div>

                        </div>

                        <div class="row">

                          <div class="form-group col-sm-3">
                               <label>รหัสไปรษณีย์</label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?php echo set_value('postal_code', $company_address['postal_code']);?>" required>
                               <?php echo form_error('postal_code', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                          
                          </div>

                          <div class="form-group col-sm-4">
                               <label>ประเภทกิจการ/ธุรกิจ/ผลิตภัณฑ์/ลักษณะการดำเนินงาน</label><code>*</code>
                               <input type="text" class="form-control" id="company_type" name="company_type" value="<?php echo set_value('company_type', $company['company_type']);?>" required>
                               <?php echo form_error('company_type', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                          
                          </div>

                          <div class="form-group col-sm-3">
                               <label>จำนวนพนักงาน</label><code>*</code>
                               <input type="text" class="form-control" id="total_employee" name="total_employee" value="<?php echo set_value('total_employee', $company['total_employee']);?>" required>
                               <?php echo form_error('total_employee', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                          
                          </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="text-right">
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
	width: 33.33%;
	/* width: 25%; */
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

<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery.thailand/dependencies/JQL.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery.thailand/dependencies/typeahead.bundle.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/jquery.thailand/dist/jquery.Thailand.min.css');?>">
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery.thailand/dist/jquery.Thailand.min.js');?>"></script>
<script>
$.Thailand({
    $district: $('#district'), // input ของตำบล
    $amphoe: $('#area'), // input ของอำเภอ
    $province: $('#province'), // input ของจังหวัด
    $zipcode: $('#postal_code'), // input ของรหัสไปรษณีย์
});
</script>