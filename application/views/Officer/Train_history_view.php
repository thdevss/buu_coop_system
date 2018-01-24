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
                      <td class="text-center"><?php echo $row['train']->train_type_id;?></td>
                      <td class="text-center"><?php echo $row['train']->date;?></td>
                      <td class="text-center"><?php echo $row['train']->title;?></td>
                      <td class="text-center"><?php echo $row['train']->number_of_seat;?></td>
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
