<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">กิจกรรมในการฝึกงานในแต่ละวัน</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i> <B>หัวข้อ</B>: <?php echo $data->activity_subject; ?>
          <div class="text-left">
            </div>
          </div>
            <div class="card-body">
                <?php echo $data->activity_content;?>
            </div>
            <div class="card-footer"><i class="fa fa-thermometer-4 fa-lg mt-4"></i> <B>กิจกรรมการฝึกงานในวันที่</B>: <?php echo $data->date; ?> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



</main>