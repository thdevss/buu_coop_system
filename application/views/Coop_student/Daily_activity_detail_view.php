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
          <div class="card-header">
          <div class="btn btn-dark">
            <i class="fa fa-align-justify"></i> หัวข้อ: <?php echo $coop_student_daily_detail['activity_subject'];?>
          </div>
          </div>
            <div class="card-body">
                <p><?php echo $coop_student_daily_detail['activity_content'];?>
            </div>
            <div class="card-footer">
            <div class="pull-right">
            <div class="btn btn-dark">
            <i class="fa fa-clock-o fa-spin"></i> กิจกรรมการฝึกงานในวันที่: <?php echo thaiDate($coop_student_daily_detail['date']);?>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



</main>