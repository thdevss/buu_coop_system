<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">กิจกรรมในการฝึกงานในแต่ละวัน</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>กิจกรรมในการฝึกงานในแต่ละวัน
          <div class="text-right">
        
            </div>
          </div>
            <div class="card-body">
            <!--<?php 
            if($status){
              echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
            }
     
             ?>-->
            <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th>รหัสนิสิต</th>
                        <th>ชื่อ-สกุล</th>
                        <th>สาขา</th>
                        <th>สาขาประกอบการที่ได้</th>
                        <th>จังหวัด</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $row) {?>
                      <tr>
                        <td><?php echo $row['student']['id']; ?></td>
                        <td><?php echo $row['student']['fullname']; ?></td>
                        <td><?php echo $row['department']['name']; ?></td>
                        <td><?php echo $row['company']['name_th']; ?></td>
                        <td><?php echo $row['company_address']['province']; ?></td>  
                        <td><?php echo anchor('Adviser/Daily_activity/lists/'.$row['student']['id']  , '<i class="fa fa-star"></i> รายละเอียด', 'class="btn btn-primary"');?></td>
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
