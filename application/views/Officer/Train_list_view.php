<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#">เจ้าหน้าที่</a></li>
  <li class="breadcrumb-item active">จัดการข้อมูลการอบรม</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i>จัดการข้อมูลการอบรม</div>
            <div class="text-right">
            <?php echo anchor('Officer/Train_list/add/', '<i class="icon-plus"></i> เพิ่มการอบรม', 'class="btn  btn-info"');?>
            </div>
              <div class="card-body">
              <?php if(@$_GET['delete'] == 1) { ?>
                <div class="alert alert-warning">สำเร็จ </div>
              <?php }?>
              <table class="table table-bordered datatable" >
                    <thead>
                      <tr bgcolor="">
                        <th class="text-center" >วันที่</th>
                        <th class="text-center">ประเภท</th>
                        <th class="text-center">ชื่อโครงการ</th>
                        <th class="text-center">วิทยากร</th>
                        <th class="text-center">จำนวนชั่วโมง</th>
                        <th class="text-center">จำนวนที่นั่ง</th>
                        <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $row){?>
                      <tr>
                        <td class="text-center"><?php echo $row['train']->date ?></td>
                        <td class="text-center"><?php echo $row['train_type']->name ?></td>
                        <td class="text-center"><?php echo $row['train']->title?></td>
                        <td class="text-center"><?php echo $row['train']->lecturer ?></td>
                        <td class="text-center"><?php echo $row['train']->number_of_hour ?></td>
                        <td class="text-center"><?php echo $row['train']->number_of_seat ?></td>
                        <td class="text-center">
                        <?php echo anchor('Officer/Train_list/edit/'.$row['train']->id, '<i class="icon-pencil"></i> เเก้ไขข้อมูล', 'class="btn  btn-primary"');?>
                        <?php echo anchor('Officer/Train_list/delete/'.$row['train']->id, '<i class="icon-trash"></i> ลบ', 'class="btn  btn-danger"');?>
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