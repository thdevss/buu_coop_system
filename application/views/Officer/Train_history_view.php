<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">ประวัติการเข้าร่วมกิจกรรมมอบรม</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>ประวัติการเข้าร่วมกิจกรรมอบรม</div>
            <div class="card-body">
            
            <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>จำนวนชั่วโมงทั้งหมด</th>
                        <th>จำนวนชั่วโมงที่เก็บ</th>
                        <th>จำนวนชั่วโมงที่ขาด</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>อบรมเสริมทักษะทางวิชาการ</td>
                        <td>12</td>
                        <td class="text-center">
                        ...
                      </td>
                        <td>...</td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td>เตรียมความพร้อมสหกิจศึกษา</td>
                        <td>30</td>
                        <td>...</td>
                        <td>...</td>
                      </tr>
                    </tbody>
                  </table>

            <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th>วันที่เข้าร่วม</th>
                        <th>ประเภทโครงการ</th>
                        <th>ชื่อโครงการ</th>
                        <th>ชั่วโมงที่เก็บได้</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach($data as $row) {
                      ?>
                      <tr>
                      <td class="text-center"><?php echo $row['train']->date;?></td>
                      <td class="text-center"><?php if($row['train']->train_type_id == 1) {
                        echo 'เตรียมความพร้อมสหกิจศึกษา';
                      }else {
                        echo 'อบรมเสริมทักษาะทางวิชาการ';
                      }
                       ?>
                      </td>
                      <td class="text-center"><?php echo $row['train']->title;?></td>
                      <td class="text-center"><?php echo $row['train']->number_of_hour;?></td>
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
