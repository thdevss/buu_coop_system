<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#">เจ้าหน้าที่</a></li>
  <li class="breadcrumb-item active">จัดการสถานที่อบรม</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>จัดการสถานที่อบรม
                <a class="btn btn-primary float-right" href="<?php echo site_url('officer/train_location/add');?>">เพิ่มสถานที่อบรม</a>
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
                        <th class="text-center">ลำดับที่</th>
                        <th class="text-center">ตึก</th>
                        <th class="text-center">ห้อง</th>
                        <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1; 
                    foreach ($train_locations as $row){ 
                    ?>
                      <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td class="text-center"><?php echo $row->building; ?></td>
                        <td class="text-center"><?php echo $row->room?></td>
                        <td class="text-center">
                            <form action="<?php echo site_url('Officer/train_location/delete'); ?>" class="form-inline" method="post">
                                <input type="hidden" name="id" value="<?php echo $row->id ; ?>">
                                <?php echo anchor('Officer/train_location/edit/'.$row->id, '<i class="icon-pencil"></i> เเก้ไขข้อมูล', 'class="btn btn-primary"');?>                                
                                <p style="width:10px;"></p>
                                <button type="submit" class="btn btn-danger btn-submit"><i class="fa fa-rss"></i> ลบ</button>
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

</main>


<script>


$('.btn-submit').on('click',function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "คุณแน่ใจใช่ไหม",
        text: "ที่จะลบข้อมูลที่เลือก",
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