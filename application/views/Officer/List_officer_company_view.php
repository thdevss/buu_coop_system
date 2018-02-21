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
      <!--table รายชื่อนิสิต-->
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
                        <th class="text-center" >ลำดับ</th>
                        <th class="text-center">ชื่อ</th>
                        <th class="text-center">E-mail</th>
                        <th class="text-center">ตำเเหน่ง</th>
        
                        <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($data as $row){?>
                      <tr>
                        <td class="text-center">
                        <?php echo $i++; ?>
                        </td>
                        <td class="text-center"><?php echo $row['company_person']['fullname'];?></td>
                        <td class="text-center"><?php echo $row['company_person']['email']; ?></td>
                        <td class="text-center"><?php echo $row['company_person']['position'];?></td> 
                        <td class="form-inline">
                        <form action="<?php echo site_url('Officer/Officer_company/delete/'); ?>" method="post">
                        <button type="submit" class="btn btn-info btn-submit"><i class="icon-pencil "></i> เเก้ไข</button>
                        <!-- <input type="hidden"   name="company_person_id" value="<?php echo $row['company_person']['id'] ; ?>">
                        <input type="hidden"   name="company_id" value="<?php echo $row['company']['id'] ; ?>">                          -->
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
    </div>
  </div>
</div>   
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">เพิ่ม | สถานประกอบการ</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="col-md-12">
        <b>ชื่อสถานประกอบการ</b><br></br>
        <input type="text" id="text-input" name="text-input" class="form-control" placeholder="ชื่อบริษัท">
     </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
      <button type="button" class="btn btn-success">บันทึก</button>
    </div>
  </div>
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