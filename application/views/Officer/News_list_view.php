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
                <a class="btn btn-primary float-right" href="<?php echo site_url('Officer/News/add');?>"><i class="fa fa-hand-pointer-o"></i> เพิ่มประกาศข่าวสาร</a>
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
                            <th></th>
                            <th class="text-center">วันที่</th>
                            <th class="text-center">หัวข้อ</th>
                            <th class="text-center">ผู้ประกาศ</th>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    foreach ($data as $row) {
                    ?>
                      <tr>
                        <td class="text-center"><?php echo $i++;?></td>
                        <td class="text-left"><?php echo thaiDate($row['date']);?></td>
                        <td class="text-left">
                          <?php echo $row['title'];?>
                          <?php 
                          if($row['is_hide'] == '1') {
                            echo '<span class="badge badge-warning">ถูกซ่อน</span>';
                          }
                          ?>
                        </td>
                        <td class="text-left"><?php echo $row['author']['fullname'];?></td>
                        <td class="text-center">
                            <a href="#" data-newsid="<?php echo $row['id'];?>" class="btn btn-info btn-share" data-toggle="modal" data-target="#share_modal"><i class="fa fa-share"></i> แชร์</a>
                        </td>
                        <td class="text-center">
                            <form action="<?php echo site_url('Officer/News/delete');?>" method="post">
                                <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                                <a href="<?php echo site_url('Officer/news/edit/'.$row['id']);?>" class="btn btn-primary"><i class="fa fa-eraser"></i> แก้ไข</a>
                                <a href="<?php echo site_url('Officer/news/hide_status/'.$row['id']);?>" class="btn btn-secondary" onclick="return confirmDelete(this);"><i class="fa fa-eraser"></i> <?php if($row['is_hide'] == '1') echo 'โชว์ข่าว'; else echo 'ซ่อนข่าว'; ?></a>
                                
                                <button type="submit" class="btn btn-delete btn-danger"><i class="fa fa-trash-o"></i> ลบ</button>
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
        <a target="_blank" class="btn btn-info btn-md btn-facebook">
          <span>Facebook</span>
        </a>
        <a target="_blank" class="btn btn-info btn-md btn-twitter">
          <span>Twitter</span>
        </a>
        <a target="_blank" class="btn btn-info btn-md btn-spotify text btn-line">
          <i class="fa fa-whatsapp"></i>
          <span>LINE</span>
        </a>
        <a target="_blank" class="btn btn-info btn-md btn-openid text btn-email data-dismiss="modal" data-toggle="modal" data-target="#sent_email_modal"">
          <i class="fa fa-windows"></i> 
          <span>Email</span>
        </a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
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
$('.btn-share').on('click',function(e){
  e.preventDefault();
  var news_id = jQuery(this).data("newsid")

  jQuery(".btn-facebook").attr('href', 'https://www.facebook.com/sharer/sharer.php?u='+SITE_URL+'/news/'+news_id)
  jQuery(".btn-twitter").attr('href', 'https://twitter.com/home?status='+SITE_URL+'/news/'+news_id)
  jQuery(".btn-line").attr('href', 'https://social-plugins.line.me/lineit/share?url='+SITE_URL+'/news/'+news_id)
  


  jQuery("#share_modal").modal('show')
});





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
        // "order": [[ 1, "desc" ]]
    } );
} );


</script>