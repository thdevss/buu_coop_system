<!-- Main content -->
<main class="main">
<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>

        <div class="container-fluid">
            <div class="animated fadeIn">
                <ul id="progressbar">
                    <li class="active">รายละเอียดเกี่ยวกับสถานประกอบการ / หน่วยงาน</li>
                    <li class="active">ชื่อผู้จัดการสถานประกอบการ/หัวหน้าหน่วยงาน</li>
                    <li class="active">เพิ่มตำแหน่งงาน</li>
                </ul>

                <div class="card">
                    <form action="<?php echo $form_url;?>" method="post">
                    <input type="hidden" name="company_id" value="<?php echo $company['id'];?>">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> เพิ่มตำแหน่งงาน 
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                                if($this->session->flashdata('form-alert')) {
                                    echo $this->session->flashdata('form-alert');
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-star"></i> เพิ่มตำแหน่งงาน</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ตำแหน่งงาน</th>
                                            <th>ลักษณะงานที่นิสิตต้องปฏิบัติ (Job Description)</th>
                                            <th>จำนวน</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($company_job as $row) {?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo $row['position_title']; ?></td>
                                                <td><?php echo $row['job_description']; ?></td>
                                                <td class="text-right"><?php echo $row['number_of_employee']; ?></td>
                                                <td>
                                                    <a href="<?php echo $work_form_url.'/job_form_edit/'.$row['id'];?>" class="btn btn-info">แก้ไข</a>
                                                    <a href="<?php echo $work_form_url.'/job_hide/'.$row['id'];?>" class="btn btn-warning">ลบ</a>
                                                    
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
                <input type="hidden" name="company_id" value="<?php echo $company['id'];?>">
            
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="job_title_id">ตำแหน่ง</label><code>*</code>
                        <select class="form-control" id="job_title_id" name="job_title_id">
                            <option>--กรุณาเลือก--</option>
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
