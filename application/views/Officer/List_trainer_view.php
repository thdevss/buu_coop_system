<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">จัดการข้อมูลสถานประกอบการ</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i>เจ้าหน้าที่ในบริษัท
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">
                เพิ่มเจ้าหน้าที่
                </button>
            </div>
              <div class="card-body">
              <?php 
                  if($status){
                    echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
                  }
                ?>
              <table class="table table-bordered datatable" >
                    <thead>
                      <tr bgcolor="">
                        <th></th>
                        <th>ชื่อ</th>
                        <th>E-mail</th>
                        <th>ตำเเหน่ง</th>
        
                        <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($data as $row){?>
                      <tr>
                        <td class="text-center">
                        <?php echo $i++; ?>
                        </td>
                        <td class="text-left"><?php echo $row['company_person']['fullname'];?></td>
                        <td class="text-left"><?php echo $row['company_person']['email']; ?></td>
                        <td class="text-left"><?php echo $row['company_person']['position'];?></td> 
                        <td class="form-inline">
                        <form action="<?php echo site_url('Officer/Trainer/delete/'); ?>" method="post">
                        <button type="submit" class="btn btn-info btn-submit"><i class="icon-pencil "></i> เเก้ไข</button>
                        <input type="hidden"   name="company_person_id" value="<?php echo $row['company_person']['id'] ; ?>">
                        <input type="hidden"   name="company_id" value="<?php echo $row['company']['id'] ; ?>">
                        <button type="submit" class="btn btn-danger btn-submit"><i class="icon-trash"></i> ลบ</button>
                        </form>        
                        </td>
                      </tr>
                    <?php 
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>


</main>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <form action="<?php echo site_url('Officer/Trainer/add_employee');?>" method="post">

      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">เพิ่ม | เจ้าหน้าที่</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <label for"fullna me">ชื่อ-นามสกุล</label><code>*</code>
            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="ชื่อ-นามสกุล" value="" required>
            <input type="hidden" id="company_id" name="company_id" value="<?php echo $data[0]['company_person']['company_id'];?>">
          </div>
          <div class="col-md-12">
          <label for"email">E-mail</label><code>*</code>
            <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required>
          </div>
          <div class="col-md-12">
          <label for"position">ตำเเหน่ง</label><code>*</code>
            <input type="text" id="position" name="position" class="form-control" placeholder="ตำเเหน่ง" required>
          </div>
          <div class="col-md-12">
          <label for"department">เเผนกงาน</label><code>*</code>
            <input type="text" id="department" name="department" class="form-control" placeholder="เเผนกงาน" required>
          </div>
          <div class="col-md-12">
          <label for"telephone">เบอร์โทร</label>
            <input type="text" id="telephone" name="telephone" class="form-control" placeholder="เบอร์โทร" required>
          </div>
          <div class="col-md-12">
          <label for"fax_number">FAX</label>
            <input type="text" id="fax_number" name="fax_number" class="form-control" placeholder="FAX">
          </div>
   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
          <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
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