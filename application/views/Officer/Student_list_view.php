<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">รายชื่อนิสิต</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <!--table รายชื่อนิสิต-->
      <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i>รายชื่อนิสิต</div>
          <div class="card-body">

              <!---->
              
              <!---->

              <table class="table table-bordered" id="student_table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th class="text-center">รหัสนิสิต</th>
                        <th class="text-center">ชื่อ-สกุล</th>
                        <th class="text-center">GPAX</th>
                        <th class="text-center">สาขาวิชา</th>
                        <th class="text-center">สถานะ</th>
                        <th class="text-center">สถานะจากสถานประกอบการ</th>
                        <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                   
              </table>
              <div style="height:40px;"></div>
                    <!---->
                        <div class="container-fluid row">
                          <div class="col-sm-12">
                            <label>เปลี่ยนสถานะนิสิต</label>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <select id="select" name="select" class="form-control coop_status_type_val">
                                <option value="">---กรุณาเลือก--</option>
                                <?php foreach ($coop_status_type as $row){?>
                                <option value="<?php echo $row['id'];?>"> <?php echo $row['status_name'];?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <label></label>
                            <button type="button" class="btn btn-success" id="change_student_status">Success</button>                             
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
    var table = $('#student_table').DataTable( {
        'columnDefs': [
          {
            'targets': 0,
            "searchable": false,
            "orderable": false,
            'checkboxes': {
              'selectRow': true
            }
          },
          {
              "searchable": false,
              "orderable": false,
              "targets": 1
          }
        ],
        'select': {
          'style': 'multi'
        },
        'order': [[2, 'asc']],
        "ajax": {
          "url": "<?php echo site_url('Officer/Student_list/ajax_list');?>",
          "dataSrc": ""
        },
        "columns": [
            { "data": "student.id" },
            { "data": "student.id" },            
            { "data": "student.id" },            
            { "data": "student.fullname" },
            { "data": "student.gpax" },
            { "data": "department.name" },
            { "data": "coop_student_type.status_name" },
            { "data": "student.company_status" },
            { "data": "action_box" }  
        ],
        
    } );

    table.on( 'order.dt search.dt', function () {
        table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    $('#change_student_status').click( function () {
      var current_table_page = $('#student_table').DataTable().page.info().page
      var coop_status_type = jQuery(".coop_status_type_val option:selected").val()
      var arr = $('#student_table').DataTable().column(0).checkboxes.selected()
      
      if(!arr[0]) {
        swal("โปรดเลือกนิสิตที่ต้องการเปลี่ยนสถานะ", {
          icon: "warning",
        });
        return;
      }
      if(!coop_status_type) {
        swal("โปรดเลือกสถานะที่ต้องการเปลี่ยน", {
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

          var data = { students: student_arr, status: coop_status_type }
          jQuery.post(SITE_URL+"/Officer/Student_list/ajax_change_status/", data, function(response) {
            if(response.status) {
              swal("เปลี่ยนสถานะเรียบร้อย", {
                icon: "success",
              });
            } else {
              swal("ผิดพลาด", {
                icon: "warning",
              });
            }
            $('.coop_status_type_val').prop('selectedIndex', 0)
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