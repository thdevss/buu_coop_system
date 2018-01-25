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
                <table class="table table-bordered datatable" >
                    <thead>
                        <tr>
                            <th class="text-center">วันที่</th>
                            <th class="text-center">หัวข้อ</th>
                            <th class="text-center" >ผู้ประกาศ</th>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $row){?>
                      <tr>

                        <td class="text-center"><?php echo $row['news']->date;?></td>
                        <td class="text-center"><?php echo $row['news']->title;?></td>
                        <td class="text-center"><?php echo $row['author']->fullname;?></td>
                        <td class="text-center">
                            <a href="#" data-newsid="<?php echo $row['news']->id;?>" class="btn btn-secondary">แชร์</a>
                        </td>
                        <td class="text-center">
                            <form action="<?php echo site_url('Officer/News/delete');?>" method="post">
                                <input type="hidden" value="<?php echo $row['news']->id;?>" name="id">
                                <a href="<?php echo site_url('Officer/news/edit/'.$row['news']->id);?>" class="btn btn-primary">แก้ไข</a>
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


</script>