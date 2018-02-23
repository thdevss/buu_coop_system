<!-- Breadcrumb -->

<!-- Main content -->
<main class="main">

<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">จัดการประเภททักษะ</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <!--1 box-->
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"> จัดการประเภททักษะ</div></i>
                    <div class="card-body">
                    <?php 
                        if($status){
                            echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
                        }
                     ?>
                        <div class="row">

                            <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-bordered datatable" >
                                                <thead>
                                                    <tr>
                                                        <th class="text-left"></th>
                                                        <th class="text-left">ทักษะงาน</th>
                                                        <th class="text-left"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php  $i=1; foreach($skill as $row) {?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $i++ ;?></td>
                                                        <td class="text-left"><?php echo $row['skill_name']; ?></td>
                                                        <td>
                                                            <?php echo anchor('Officer/Setting/update_skill_name/'.$row['skill_id'], '<i class="fa fa-eraser"></i> แก้ไข', 'class="btn  btn-primary"');?>                                 
                                                            <?php echo anchor('Officer/Setting/delete_skill_name/'.$row['skill_id'], '<i class="fa fa-trash-o"></i> ลบ', 'class="btn btn-danger" onclick="return confirmDelete(this)"');?>

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
                                            <form action="<?php echo site_url('Officer/Setting/add_skill_name');?>" method="post">
                                            <?php } else { ?>
                                            <form action="<?php echo site_url('Officer/Setting/update_skill_name');?>" method="post">
                                            <input type="hidden" name="skill_id" value="<?php echo $skill_by_skill_id['skill_id'];?>">

                                            <?php } ?>

                                                <div class="form-group">
                                                    <label for="">ชื่อทักษะงาน</label><code>*</code>
                                                    <input type="text" id="skill_name" name="skill_name" class="form-control" value="<?php echo @$skill_by_skill_id['skill_name'];?>" placeholder="กรุณากรอก" required autofocus>
                                                </div>
                                            
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-md btn-success"> บันทึก</button>
                                                </div>
                                            </form>
                                        </div>
                        
                                    </div>
                                </div>
                                <!-- เพิ่ม -->

                                <!-- แสดงรายการที่เพิ่ม -->
                            

                        </div>
                      
                            <!-- แสดงรายการที่เพิ่ม -->

                    </div><!-- close card  -->
                </div><!-- close card body -->
            </div><!-- close card col-md-6 -->


        </div><!-- close row -->
    </div><!-- close animated -->
 </div> <!-- close rocontainerw -->
 
 </main>
