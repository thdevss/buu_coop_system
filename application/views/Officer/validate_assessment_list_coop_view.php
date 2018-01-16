<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#">เจ้าหน้าที่</a></li>
  <li class="breadcrumb-item active">ตรวจสอบเอกสารรายบุคคล</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i>ตรวจสอบเอกสารรายบุคคล</div>
              <div class="card-body">
              <table class="table table-bordered">
                    <thead>
                      <tr bgcolor="MediumSeaGreen">
                        <th class="text-center" >รหัสนิสิต</th>
                        <th class="text-center">ชื่อ-นามสกุล</th>
                        <th class="text-center">GPX</th>
                        <th class="text-center">สาขาวิชา</th>
                        <th class="text-center">สถานะการส่งเอกสาร</th>
                        <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $row){?>
                      <tr>
                        <td class="text-center"><?php echo $row->student_id ?></td>
                        <td class="text-center"><?php echo $row->fullname ?></td>
                        <td class="text-center">3.50</td>
                        <td class="text-center"><?php echo $row->name ?></td>
                        <td class="text-center"><font color="#006600">ไม่ผ่าน</font></td>
                        <td class="text-center">
                          <a class="btn btn-primary Document_check" data-studentid="<?php echo $row->student_id;?>">รายละเอียด</a>
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