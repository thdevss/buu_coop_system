<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">จัดการหัวข้อรายงาน</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>จัดการหัวข้อรายงาน</div>
            <div class="card-body">
            <?php 
            if(@$status == 'successinsert'){ 
              echo '<div class="alert alert-success" role="alert">
              <strong>สำเร็จ!</strong>
            </div>';
            } else if(@$status == 'successupdate') {
              echo '<div class="alert alert-success" role="alert">
              <strong>สำเร็จ!</strong> 
            </div>';
            } else if (@$status == 'error') {
              echo '<div class="alert alert-danger" role="alert">
              <strong>ล้มเหลว!</strong>
            </div>';
            }?>
      
            <form action=<?php echo site_url("Coop_student/Reportmanager/post_report"); ?> method="post" class="form-horizontal">  
            <div class="form-group row">
                      <label class="col-md-3 form-control-label" for="text-input">หัวข้ออบรม</label>
                      <div class="col-md-4">
                      <select class="form-control" id="ccmonth">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                      </select>
                      </div>
                    </div>
                   </div>
          <div class="card-footer text-center">
                  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>สมัคร</button>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>
