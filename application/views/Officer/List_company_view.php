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
              <i class="fa fa-align-justify"></i> จัดการข้อมูลสถานประกอบการ
              <a class="btn btn-primary float-right" href="<?php echo site_url('officer/Train_list/add');?>">เพิ่มสถานประกอบการ</a>

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
                        <th class="text-center">ชื่อสถานประกอบการ</th>
                        <th class="text-center">จำนวนเจ้าหน้าที่</th>
                        <th class="text-center">สาขาย่อย</th>
                        <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($data as $row){?>
                      <tr>
                        <td class="text-center">
                        <?php echo $i++; ?>
                        </td>
                        <td class="text-center"><?php echo $row->name_th;?></td>
                        <td class="text-center"><?php echo $row->total_employee; ?></td>
                        <td class="text-center"><?php echo $row->parent_id;?></td>
                        <td class="form-inline">
                              <?php echo anchor('Officer/Train_list/edit/'.$row->id, '<i class="icon-people"></i> เจ้าหน้าที่', 'class="btn  btn-primary"');?>                              
                              <div style="width:2%"></div>
                              <?php echo anchor('Officer/Train_list/edit/'.$row->id, '<i class="icon-share-alt"></i> สาขาย่อย', 'class="btn  btn-primary"');?>                              
                              <div style="width:2%"></div>
                              <?php echo anchor('Officer/Train_list/edit/'.$row->id, '<i class="icon-star"></i> รายละเอียด', 'class="btn  btn-primary"');?>                              
                         
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