<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i>เจ้าหน้าที่ในบริษัท
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#company_person_form">
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
                        <?php echo anchor('Officer/Trainer/edit_form/'.$row['company_person']['id'], '<i class="icon-pencil "></i> แก้ไข', 'class="btn btn-info"');?>
                        <input type="hidden"   name="company_person_id" value="<?php echo $row['company_person']['id'] ; ?>">
                        <input type="hidden"   name="company_id" value="<?php echo $company['id'] ; ?>">
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




<style>
.modal-dialog {
    max-width: 800px;
}
</style>
<!-- The Modal -->
<div class="modal fade" id="company_person_form">
    <div class="modal-dialog model-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มผู้นิเทศงาน</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form action="<?php echo site_url('Officer/Trainer/add_employee');?>" method="post" id="save_trainer">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="fullname">ชื่อ-นามสกุล</label><code>*</code>
                        <input type="text" id="fullname" name="fullname" class="form-control" placeholder="ชื่อ-นามสกุล" value="" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for"email">E-mail</label><code>*</code>
                        <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for"position">ตำเเหน่ง</label><code>*</code>
                        <input type="text" id="position" name="position" class="form-control" placeholder="ตำเเหน่ง" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for"department">แผนกงาน</label><code>*</code>
                        <input type="text" id="department" name="department" class="form-control" placeholder="เเผนกงาน" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for"telephone">เบอร์โทร</label>
                        <input type="text" id="telephone" name="telephone" class="form-control" placeholder="เบอร์โทร" required>
                    </div>  
                    <div class="form-group col-md-12">
                        <label for"fax_number">FAX</label>
                        <input type="text" id="fax_number" name="fax_number" class="form-control" placeholder="FAX">
                    </div>
   
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" id="company_id" name="company_id" value="<?php echo $company['id'];?>">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
                
            </div>
            </form>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function(){
    jQuery("#save_trainer").validate();
});


jQuery( "#save_trainer" ).submit(function( event ) {
    event.preventDefault();

    if(jQuery("#save_trainer").valid()) {
      jQuery( "#save_trainer" )[0].submit();
    }
});

</script>


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