<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">จัดการข้อมูลนิสิตเข้าสอบ</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>จัดการข้อมูลนิสิตเข้าสอบ</div>
            <div class="card-body">
            <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th>รหัสนิสิต</th>
                        <th>ชื่อนิสิต</th>
                        <th>สาขา</th>
                        <th>สอบรอบที่</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach($data as $row) {
                        print_r($row);
                      ?>

                      <tr>
                        <td><?php echo $row['student']->id;?></td>
                        <td><?php echo $row['student']->fullname;?></td>
                        <td><?php echo $row['student_field']->name;?></td>
                        <td><?php echo $row['coop_test']->name;?></td>
                        
                        <td>Member</td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
