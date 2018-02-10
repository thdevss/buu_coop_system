<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">รายการประกาศข่าวสารหน้าเว็บ</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>รายการประกาศข่าวสารหน้าเว็บ
                <a class="btn btn-success float-right" href="<?php echo site_url('Officer/News/add');?>">เพิ่มประกาศข่าวสาร</a>
            </div>
              <div class="card-body">
                <?php 
                if($status){
                    echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
                }
                ?>   
                <table class="table table-bordered" id="news_table">
                    <thead>
                        <tr>
                            <th class="text-center">วันที่</th>
                            <th class="text-center">หัวข้อ</th>
                            <th class="text-center">ผู้ประกาศ</th>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $row){?>
                      <tr>

                        <td class="text-center"><?php echo $row['date'];?></td>
                        <td class="text-center"><?php echo $row['title'];?></td>
                        <td class="text-center"><?php echo $row['author']['fullname'];?></td>
                        <td class="text-center">
                            <a href="#" data-newsid="<?php echo $row['id'];?>" class="btn btn-secondary" data-toggle="modal" data-target="#share_modal">แชร์</a>
                        </td>
                        <td class="text-center">
                            <form action="<?php echo site_url('Officer/News/delete');?>" method="post">
                                <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                                <a href="<?php echo site_url('Officer/news/edit/'.$row['id']);?>" class="btn btn-primary">แก้ไข</a>
                                <button type="submit" class="btn btn-delete btn-danger">ลบ</button>
                            </form>
                        </td>
                      </tr>
                    <?php 
                    }
                    ?>
                    </table>
                    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</main>


<!-- Modal -->
<div class="modal fade" id="share_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="share_modal_view">แชร์ข่าวสาร</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <a href="#" class="btn btn-info btn-lg">Facebook</a>
        <a href="#" class="btn btn-info btn-lg">Twitter</a>
        <a href="#" class="btn btn-info btn-lg">LINE</a>
        <a href="#" class="btn btn-info btn-lg" data-dismiss="modal" data-toggle="modal" data-target="#sent_email_modal">Email</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="sent_email_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sent_email_modal_view">ส่งอีเมลข่าวสาร</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="emails">อีเมล</label>
            <input type="text" class="form-control" id="emails" name="emails" placeholder="a@a.com, b@b.com">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">หัวข้อประกาศข่าว</label>
            <p>xxxxxxxx</p>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info">Send Email</button>
      </div>
    </div>
  </div>
</div>

<script>


$('.btn-delete').on('click',function(e){
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

$(document).ready(function() {
    $('#news_table').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );


</script>