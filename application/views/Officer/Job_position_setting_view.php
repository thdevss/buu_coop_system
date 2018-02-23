<!-- Breadcrumb -->

<!-- Main content -->
<main class="main">

<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">จัดการตำแหน่งงาน</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <!--1 box-->
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"> จัดการตำแหน่งงาน</div></i>
                    <div class="card-body">
                    <?php 
                        if($status){
                            echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
                        }
                     ?>
                        <div class="row">
                            <!-- แสดงรายการที่เพิ่ม -->
                            <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-bordered datatable" >
                                                <thead>
                                                    <tr>
                                                        <th class="text-left"></th>
                                                        <th class="text-left">ตำแหน่งงาน</th>
                                                        <th class="text-left"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php  $i=1; foreach($company_job_title as $row) {?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $i++ ;?></td>
                                                        <td class="text-left"><?php echo $row['job_title'];?></td>
                                                        <td>
                                                            <?php echo anchor('Officer/Setting/update_job_title/'.$row['job_title_id'], '<i class="fa fa-eraser"></i> แก้ไข', 'class="btn  btn-primary"');?>                                 
                                                            <?php echo anchor('Officer/Setting/delete_job_title/'.$row['job_title_id'], '<i class="fa fa-trash-o"></i> ลบ', 'class="btn btn-danger" onclick="return confirmDelete(this)"');?>

                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    
                                    </div>
                                </div>
                                
                            <!-- เพิ่ม -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php if($form_type == 'insert') { ?>
                                            <form action="<?php echo site_url('Officer/Setting/add_job_title');?>" method="post">
                                            <?php } else { ?>
                                            <form action="<?php echo site_url('Officer/Setting/update_job_title');?>" method="post">
                                            <input type="hidden" name="job_title_id" value="<?php echo $job_title_by_id['job_title_id'];?>">

                                            <?php } ?>

                                                <div class="form-group">
                                                    <label for="">บันทึกตำแหน่งงานใหม่ หรือ แก้ไข</label><code>*</code>
                                                    <input type="text" id="job_title" name="job_title" class="form-control" value="<?php echo @$job_title_by_id['job_title'];?>" placeholder="กรุณากรอก" required autofocus>
                                                </div>
                                            
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-md btn-success"> บันทึก</button>
                                                </div>
                                            </form>
                                        </div>
                        
                                    </div>
                                </div>
                                <!-- เพิ่ม -->

                                

                        </div>
                      
                            <!-- แสดงรายการที่เพิ่ม -->

                    </div><!-- close card  -->
                </div><!-- close card body -->
            </div><!-- close card col-md-6 -->


        </div><!-- close row -->
    </div><!-- close animated -->
 </div> <!-- close rocontainerw -->
 
 </main>
