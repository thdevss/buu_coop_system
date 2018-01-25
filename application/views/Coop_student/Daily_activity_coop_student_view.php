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
            <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th>วันที่</th>
                        <th>หัวข้องาน</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $row) {?>
                      <tr>
                      <td><?php echo $row->date; ?></td>
                          <td><?php echo $row->activity_subject; ?></td>
                          <td>
                          <?php echo anchor('Coop_student/Daily_activity/edit/'.$row->id  , '<i class="fa fa-star"></i> รายละเอียด', 'class="btn btn-primary"');?>
                          <?php echo anchor('/Coop_student/Daily_activity/edit/'.$row->id  , '<i class="fa fa-star"></i> เเก้ไข','class="btn btn-primary"');?>
                          <?php echo anchor(''.$row->id  , '<i class="fa fa-star"></i> ลบ', 'class="btn btn-danger"');?>
                          </td>
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
<!-- <script>


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


</script> -->