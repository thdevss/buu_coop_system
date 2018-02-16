<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">จัดอาจารย์ที่ปรึกษากับนิสิต</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <!--table รายชื่อนิสิต-->
      <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i> จัดอาจารย์ที่ปรึกษากับนิสิต</div>
          <div class="card-body">
              <table class="table table-bordered" id="student_table">
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th class="text-center">รหัสนิสิต</th>
                        <th class="text-center">ชื่อ-สกุล</th>
                        <th class="text-center">อาจารย์ที่ปรึกษา</th>
                        <th class="text-center">ชื่อบริษัท</th>
                        <th class="text-center">เเขวง</th>
                        <th class="text-center">จังหวัด</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                   
              </table>
            <div style="height:40px;"></div>
                    <!---->
                        <div class="container-fluid row">
                          <div class="col-sm-12">
                            <label>เลือกอาจารย์ที่ปรึกษา</label>
                          </div>
                          <div class="col-sm-4">
                                <div class="form-group">
                                <select id="select" name="select" class="form-control adviser_val">
                                    <option value="">---กรุณาเลือก--</option>
                                    <?php foreach ($adviser as $row){?>
                                    <option value="<?php echo $row['id'];?>"> <?php echo $row['fullname'];?></option>
                                    <?php } ?>
                                </select>
                                </div>
                          </div>
                            <div class="col-sm-4">
                                <label></label>
                                <button type="button" class="btn btn-success" id="select_adviser_btn">ตั้งค่า</button>                             
                            </div>
                        </div> 
                </div>     
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>


<script>
$(document).ready(function() {
    $('#student_table').DataTable( {
        'columnDefs': [{
          'targets': 0,
          'checkboxes': {
            'selectRow': true
          }
        }],
        'select': {
          'style': 'multi'
        },
        'order': [[1, 'asc']],
        "ajax": {
          "url": "<?php echo site_url('Officer/Management_student_adviser/ajax_list');?>",
          "dataSrc": ""
        },
        "columns": [
            { "data": "student.id" },
            { "data": "student.id" },            
            { "data": "student.fullname" },
            { "data": "adviser.fullname" },
            { "data": "company.name_th" },
            { "data": "company_address.area" },
            { "data": "company_address.province" },
        ],
        
    } );

    $('#select_adviser_btn').click( function () {
      var current_table_page = $('#student_table').DataTable().page.info().page
      var adviser_id = jQuery(".adviser_val option:selected").val()
      var arr = $('#student_table').DataTable().column(0).checkboxes.selected()
      
      if(!arr[0]) {
        swal("โปรดเลือกนิสิตที่ต้องการเพิ่ม", {
          icon: "warning",
        });
        return;
      }
      if(!adviser_id) {
        swal("โปรดเลือกอาจารย์ที่ปรึกษา", {
          icon: "warning",
        });
        return;
      }
      
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willUpdate) => {
        if (willUpdate) {
          var student_arr = []
          jQuery.each(arr, function( index, value ) {
            student_arr.push(value)
          });

          console.log(student_arr)

          var data = { students: student_arr, adviser: adviser_id }
          jQuery.post(SITE_URL+"/Officer/Management_student_adviser/ajax_change_status/", data, function(response) {
            if(response.status) {
              swal("เพิ่มนิสิตในอาจารย์เรียบร้อย", {
                icon: "success",
              });
            } else {
              swal("ผิดพลาด", {
                icon: "warning",
              });
            }
            $('.adviser_val').prop('selectedIndex', 0)
            $('#student_table').DataTable().clear().draw().ajax.reload(function(){ 
              $('#student_table').DataTable().page( current_table_page ).draw( 'page' );              
            });            
            // $('#student_table').DataTable().page( current_table_page ).draw( 'page' );

          }, 'json');


          
        }
      });

    } );
} );

</script>