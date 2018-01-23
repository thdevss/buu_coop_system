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
                        <td><?php echo $row['student']->id; ?></td>
                        <td><?php echo $row['student']->fullname; ?></td>
                        <td><?php echo $row['student_field']->name; ?></td>
                        <td><?php echo $row['company']->name_th; ?></td>
                        <td><?php echo $row['company_address']->province; ?></td>  
                        <td><?php echo anchor('#/#/', '<i class="fa fa-star"></i> รายละเอียด', 'class="btn btn-primary"');?></td>
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
<script>


$('.btn-submit').on('click',function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "คุณแน่ใจใช่ไหม",
        text: "ลบคำนิสิตที่เลือก",
        icon: "warning",
        buttons: true,
        dabgerMode: true
    })
    .then((isConfirm) => {
      if (isConfirm) {
        form.submit();
      } else {

      }
    })

});


</script>