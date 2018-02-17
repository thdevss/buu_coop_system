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
          <div class="card-header"><i class="fa fa-align-justify"></i>กิจกรรมในการฝึกงานในแต่ละวัน ของ <B><?php echo $student['fullname'].' '.$student['id']; ?></B> 
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
                        <th></td>
                        <th>วันที่</th>
                        <th>หัวข้อ</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <?php $i=1; foreach ($data as $row){ ?>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo thaiDate($row['date']); ?></td>
                        <td><?php echo $row['activity_subject']; ?></td>
                        <td class="text-center"><?php echo anchor('Adviser/Daily_activity/detail/'.$row['id'], '<i class="fa fa-star"></i> รายละเอียด', 'class="btn btn-primary" target="_blank"');?></td>  
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



</main>