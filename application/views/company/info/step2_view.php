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
                    <li class="active">ชื่อผู้จัดการสถานประกอบการ/หัวหน้าหน่วยงาน</li>
                    <li>เพิ่มตำแหน่งงาน</li>
                </ul>

                <div class="card">
                    <form action="<?php echo $form_url;?>" method="post">
                    <input type="hidden" name="company_id" value="<?php echo $company['id'];?>">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> ชื่อผู้จัดการสถานประกอบการ/หัวหน้าหน่วยงาน
                    </div>
                    <div class="card-body">

                        <label for="name">หากมหาวิทยาลัย ฯ ประสงค์จะติดต่อประสานงานในรายละเอียดกับสถานประกอบการ / หน่วยงาน ขอให้</label>

                        <div class="row">
                            <div class="radio col-sm-6 ">
                                <label>
                                <input type="radio" id="hide" name="radios" value="0">
                                </label>
                                <label for="hide">
                                    ติดต่อโดยตรงกับผู้จัดการ / หัวหน้าหน่วยงาน<code>*</code>
                                </label>
                            </div>

                        </div>

                        <div class="row">
                            <div class="radio col-sm-6 ">
                                <label>
                                <input type="radio" id="show" name="radios" value="1">
                                </label>
                                <label for="show">
                                ติดต่อกับบุคคลที่ สถานประกอบการ / หน่วยงาน มอบหมายต่อไปนี้<code>*</code>
                                </label>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12" id="show_select" style="display:none;">
                                <select id="contact_person_id" name="contact_person_id" class="form-control">
                                <option >Please select</option>
                                    <?php foreach($company_employee as $row){ ?>
                                <option value="<?php echo $row['id'];?> "><?php echo $row['fullname']."/".$row['position']."/".$row['department']."/".$row['telephone']."/".$row['fax_number']."/".$row['email'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                     
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="<?php echo site_url('company/info/step1');?>" class="btn btn-secondary"> < ย้อนกลับ </a>                                                
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