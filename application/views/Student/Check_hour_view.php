<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">ตรวจสอบชั่วโมงการอบรมทั้งหมด</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>ตรวจสอบชั่วโมงการอบรมทั้งหมด</div>
            <div class="card-body">
            
            <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th></th>
                        <th>จำนวนชั่วโมงทั้งหมด</th>
                        <th>จำนวนชั่วโมงที่เก็บ</th>
                        <th>จำนวนชั่วโมงที่ขาด</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($train_type as $row) { ?>
                      <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['total_hour'];?></td>
                        <td><?php echo $row['check_hour'];?></td>
                        <td><?php echo $row['total_hour'] - $row['check_hour'];?></td>
                        
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
