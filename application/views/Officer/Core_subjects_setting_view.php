<!-- Breadcrumb -->

<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>



<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <!--1 box-->
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><i class="fa fa-align-justify">  จัดการวิชาแกน</div></i>
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
                                                        <th class="text-left">รหัสวิชา</th>
                                                        <th class="text-left"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <?php  $i=1; foreach($student_core_subject as $row) {?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $i++; ?></td>
                                                        <td class="text-left"><?php echo $row['subject_id'];?></td>
                                                        <td class="text-center">
                                                            <?php echo anchor('Officer/Setting/delete_core_subjects/'.$row['subject_id'], '<i class="fa fa-trash-o"></i> ลบ', 'class="btn btn-danger" onclick="return confirmDelete(this)"');?>

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
                                            <form action="<?php echo site_url('Officer/Setting/add_core_subjects');?>" method="post">
                                                <div class="form-group">
                                                    <label for="">บันทึกวิชาใหม่ หรือ แก้ไข</label><code>*</code>
                                                    <input type="text" id="" name="subject_id" class="form-control" placeholder="กรุณากรอก" required autofocus>
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
