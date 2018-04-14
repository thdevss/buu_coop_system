<!-- Main content -->
<main class="main">
<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>

        <div class="container-fluid">
            <div class="animated fadeIn">
                <ul id="progressbar">
                    <li class="active">รายละเอียดเกี่ยวกับสถานประกอบการ / หน่วยงาน</li>
                    <li>ชื่อผู้จัดการสถานประกอบการ/หัวหน้าหน่วยงาน</li>
                    <li>เพิ่มตำแหน่งงาน</li>
                </ul>

                <div class="card">
                    <form action="<?php echo $form_url;?>" method="post">
                    <input type="hidden" name="company_id" value="<?php echo $company['company_id'];?>">
                    
                    
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
                                <input type="text" class="form-control" id="company_name_th" name="company_name_th" value="<?php echo set_value('company_name_th', $company['company_name_th']); ?>" required>
                                <?php echo form_error('company_name_th', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>(ภาษาอังกฤษ)</label><code>*</code>
                                <input type="text" class="form-control" id="company_name_en" name="company_name_en" value="<?php echo set_value('company_name_en', $company['company_name_en']); ?>" required>
                                <?php echo form_error('company_name_en', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label>ที่อยู่เลขที่</label><code>*</code>
                                <input type="text" class="form-control" id="company_address_number" name="company_address_number" value="<?php echo set_value('company_address_number', $company_address['company_address_number']);?>" required>
                                <?php echo form_error('company_address_number', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                                
                            </div>

                            <div class="form-group col-sm-5">
                                <label>อาคาร</label><code>*</code>
                                <input type="text" class="form-control" id="company_address_building" name="company_address_building" value="<?php echo set_value('company_address_building', $company_address['company_address_building']);?>" required>
                                <?php echo form_error('company_address_building', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                            
                            </div>

                          <div class="form-group col-sm-4">
                               <label>ถนน</label>
                               <input type="text" class="form-control" id="company_address_road" name="company_address_road" value="<?php echo set_value('company_address_road', $company_address['company_address_road']);?>" required>
                               <?php echo form_error('company_address_road', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                          
                          </div>

                        </div>

                        <div class="row">

                          <div class="form-group col-sm-3">
                               <label>ซอย</label>
                               <input type="text" class="form-control" id="company_address_alley" name="company_address_alley" value="<?php echo set_value('company_address_alley', $company_address['company_address_alley']);?>" required>
                               <?php echo form_error('company_address_alley', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                         
                          </div>

                          <div class="form-group col-sm-3">
                               <label>แขวง</label><code>*</code>
                               <input type="text" class="form-control" id="company_address_district" name="company_address_district" value="<?php echo set_value('company_address_district', $company_address['company_address_district']);?>" required>
                               <?php echo form_error('company_address_district', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                          
                          </div>

                          <div class="form-group col-sm-3">
                               <label>เขต/อำเภอ</label><code>*</code>
                               <input type="text" class="form-control" id="company_address_area" name="company_address_area" value="<?php echo set_value('company_address_area', $company_address['company_address_area']);?>" required>
                               <?php echo form_error('company_address_area', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                          
                          </div>

                          <div class="form-group col-sm-3">
                               <label>จังหวัด</label><code>*</code>
                               <input type="text" class="form-control" id="company_address_province" name="company_address_province" value="<?php echo set_value('company_address_province', $company_address['company_address_province']);?>" required>
                               <?php echo form_error('company_address_province', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                            
                            </div>
                        </div>

                        <div class="row">

                          <div class="form-group col-sm-3">
                               <label>รหัสไปรษณีย์</label><code>*</code>
                               <input type="text" class="form-control" id="company_address_postal_code" name="company_address_postal_code" value="<?php echo set_value('company_address_postal_code', $company_address['company_address_postal_code']);?>" required>
                               <?php echo form_error('company_address_postal_code', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                          
                          </div>

                          <div class="form-group col-sm-4">
                               <label>ประเภทกิจการ/ธุรกิจ/ผลิตภัณฑ์/ลักษณะการดำเนินงาน</label><code>*</code>
                               <input type="text" class="form-control" id="company_type" name="company_type" value="<?php echo set_value('company_type', $company['company_type']);?>" required>
                               <?php echo form_error('company_type', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                          
                          </div>

                          <div class="form-group col-sm-3">
                               <label>จำนวนพนักงาน</label><code>*</code>
                               <input type="text" class="form-control" id="company_total_employee" name="company_total_employee" value="<?php echo set_value('company_total_employee', $company['company_total_employee']);?>" required>
                               <?php echo form_error('company_total_employee', '<div class="invalid-feedback" style="display:block;">', '</div>'); ?>                          
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
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
<script>

    $.Thailand({
        $district: $('#district'), // input ของตำบล
        $amphoe: $('#area'), // input ของอำเภอ
        $province: $('#province'), // input ของจังหวัด
        $zipcode: $('#postal_code'), // input ของรหัสไปรษณีย์
    })

</script>