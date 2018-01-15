<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#">อาจารย์</a></li>
  <li class="breadcrumb-item active">แบบแจ้งแผนปฏิบัติงานสหกิจศึกษา</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i>แบบแจ้งแผนปฏิบัติงานสหกิจศึกษา</div>
              <div class="card-body">
              <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>รหัสนิสิต</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>สาขาวิชา</th>
                        <th>สถานประกอบการที่ได้</th>
                        <th>จังหวัด</th>
                        <th>รายละเอียด</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $row){?>
                      <tr>
                        <td><?php echo $row->student_id ?></td>
                        <td><?php echo $row->fullname ?></td>
                        <td><?php echo $row->name ?></td>
                        <td><?php echo $row->name_th ?></td>
                        <td><?php echo $row->province ?></td>
                        <td>
                          <a class="btn btn-primary openActionplanForm" data-studentid="<?php echo $row->student_id;?>">รายละเอียด</a>
                        </td>
                      </tr>
                    <?php 
                    }
                    ?>
                    </tbody>
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

<script src="<?php echo base_url('/assets/js/teacher/actionplan.js?'.time());?>"></script>
<!-- The Modal -->
<div class="modal fade" id="actionplan_student">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">รายละเอียด</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        
        <table class="table table-bordered" id="actionplan_table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>หัวข้องาน</th>
                        <th>เดือนที่ 1</th>
                        <th>เดือนที่ 2</th>
                        <th>เดือนที่ 3</th>
                        <th>เดือนที่ 4</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        </div>
        
      </div>
    </div>
  </div>
</div>