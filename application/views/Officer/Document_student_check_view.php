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
              <table class="table table-bordered datatable" >
                    <thead>
                      <tr>
                        <th></th>
                        <th class="text-left">รหัสนิสิต</th>
                        <th class="text-left">ชื่อ-นามสกุล</th>
                        <th class="text-left">GPAX</th>
                        <th class="text-left">สาขาวิชา</th>
                        <th class="text-left">สถานะการส่งเอกสาร</th>
                        <th class="text-left"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    foreach ($data as $row){
                    ?>
                      <tr>
                        <td><?php echo $i++;?></td>
                        <td class="text-left"><?php echo $row['student']['id']; ?></td>
                        <td class="text-left"><?php echo $row['student']['fullname']; ?></td>
                        <td class="text-right">3.50</td>
                        <td class="text-left"><?php echo $row['department']['name']; ?></td>
                        <td class="text-left">
                        <?php
                        if($row['complete_form']) {
                          echo '<font color="#006600">ครบ</font>';
                        } else {
                          echo '<font color="red">ไม่ผ่าน</font>';
                        }
                        ?>
                        </td>
                        <td class="text-center">
                          <a class="btn btn-primary document_check_btn " data-studentid="<?php echo $row['student']['id'];?>"><i class="fa fa-list-alt"></i> รายละเอียด</a>
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

<script src="<?php echo base_url('/assets/js/officer/document_check.js?'.time());?>"></script>
<!-- The Modal -->
<div class="modal fade" id="document_check_student">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ตรวจสอบเอกสารรายบุคคล</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table table-bordered" id="document_check_table">
                    <thead>
                      <tr>
                      <th width="60%">เอกสาร</th>
                      <th width="40%">ดาวน์โหลด</th>
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