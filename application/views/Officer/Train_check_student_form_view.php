<!-- Breadcrumb -->

<!-- Main content -->
<main class="main">

<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">เช็คชื่อนิสิตเข้าอบรมเก็บชั่วโมง</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <!--code box-->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> ใส่รหัสนิสิต, ยิงบาร์โค้ด</div>
                    <div class="card-body"> 
                        <input type="text" name="" class="form-control" id="enter_student_code">
                        <input type="hidden" id="train_set_check_id" value="<?php echo $check_id;?>">
                        <br><hr><br>
                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <img id="student_img">
                            </div>
                            <div class="col-sm-6">
                                <p><b>ชื่อ:</b> <span id="student_name"></span></p>
                                <p><b>รหัสนิสิต:</b> <span id="student_code"></span></p>
                                <p><br></p>
                                <p><b>เข้าเมื่อ:</b> <span id="entry_time"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--table box-->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> รายชื่อนิสิต</div>
                    <div class="card-body"> 
                        <table class="table table-bordered" id="student_table">
                            <thead>
                            <tr>
                                <th class="text-center">เวลา</th>
                                <th class="text-center">รหัสนิสิต</th>
                                <th class="text-center">ชื่อ - สกุล</th>
                            </tr>
                            </thead>
                            <tbody>
                               

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
<script>
updateStudentList()

$('#enter_student_code').keyup(function(e){
    if(e.keyCode == 13)
    {
        addStudent($('#enter_student_code').val())
    }
});
 
function addStudent(student_code) 
{
	var student_code = jQuery("#enter_student_code").val();
	if(student_code!="") {
        jQuery('#enter_student_code').val(null)

        var datastring = "train_set_check_id="+$("#train_set_check_id").val()+"&student_code="+student_code;
        jQuery.post(SITE_URL+"/officer/Train_check_student/ajax_post", datastring, function(response) {
            if(response.status) {
                toastr["success"]("เช็คชื่อเรียบร้อย ID: "+response.student.id)

		        jQuery("#student_img").attr("src", "http://reg.buu.ac.th/registrar/getstudentimage.asp?id="+student_code);                
                jQuery("#student_name").html(response.student.fullname)
                jQuery("#student_code").html(response.student.id)
                jQuery("#entry_time").html(response.entry_time)
                

            } else {
                toastr["error"]("รหัสนิสิตซ้ำ")
                jQuery("#student_img").attr("src", "");                
                jQuery("#student_name").html(null)
                jQuery("#student_code").html(null)
                jQuery("#entry_time").html(null)

            }
            updateStudentList()
            
        }, 'json');


	} else {
		toastr["error"]("Error ja, please enter student code before enter")
	}
}

function updateStudentList()
{
    $("#student_table").find("tr:gt(0)").remove();

    var datastring = "train_set_check_id="+$("#train_set_check_id").val();
    jQuery.post(SITE_URL+"/officer/Train_check_student/ajax_get", datastring, function(response) {
        if(response.status) {
			$(response.rows).each(function(index, row){ 
				$('#student_table').append('<tr><td>'+ row.train_check.date_check +'<td> '+row.train_check.student_id+' </td><td> '+row.student.fullname+' </td></tr>');       
			})

        } else {
            

            toastr["error"]("err ja")

        }
    }, 'json');
}



</script>