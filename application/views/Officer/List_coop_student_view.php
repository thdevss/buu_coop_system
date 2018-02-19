<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#">เจ้าหน้าที่</a></li>
  <li class="breadcrumb-item active">รายชื่อนิสิตสหกิจ</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i>รายชื่อนิสิตสหกิจ</div>
              <div class="card-body">
              <table class="table table-bordered" id="student_table">
                    <thead>
                      <tr>
                        <th></th>
                        <th class="text-left">รหัสนิสิต</th>
                        <th class="text-left">ชื่อ-สกุล</th>
                        <th class="text-left">ตำแหน่งงาน</th>
                        <th class="text-left">บริษัท</th>
                        <th class="text-left">พี่เลียง</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
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
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
        "ajax": {
          "url": "<?php echo site_url('Officer/Coop_student/ajax_list');?>",
          "dataSrc": ""
        },
        "columns": [
            { "data": "student.id" },            
            { "data": "student.id" },
            { "data": "student.fullname" },
            { "data": "job_position.position_title" },
            { "data": "company.name_th" },
            { "data": "trainer.fullname" }
        ],
        
        
    } )
    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


} );

</script>