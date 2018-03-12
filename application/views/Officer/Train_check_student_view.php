<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">เช็คชื่อเข้าอบรม</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> เช็คชื่อเข้าอบรม</div>
                    <div class="card-body">     
                        <?php 
                        if($status){
                            echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
                        }
                        ?>        
                        <form action="<?php echo site_url('officer/Train_check_student/check');?>" method="post">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="building">โครงการ</label>          
                                    <select class="form-control" name="train_id">
                                        <option>--- please select ----</option>
                                        <?php foreach($data as $row) { ?>
                                            <option value="<?php echo $row['train']['id'];?>"><?php echo thaiDate($row['train']['date']);?> - <?php echo $row['train']['title'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="note">บันทึกช่วยจำ</label>          
                                    <input class="form-control" type="text" name="note" id="note">
                                </div>

                                <div class="col-sm-12 text-center">
                                    <button type="reset" class="btn btn-warning" name="" value="1"> ยกเลิก</button>                                
                                    <button type="submit" class="btn btn-success" name="save" value="1"> บันทึกข้อมูล</button>                
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> รายการเช็คชื่อ</div>
                    <div class="card-body">
                        <table class="table table-bordered" id="student_table">
                            <thead>
                                <tr>
                                  <th></th>
                                  <th>วันที่</th>
                                  <th>ครั้งที่</th>
                                  <th>โครงการ</th>
                                  <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td class="text-center"></td>
                                  <td class="text-left"></td>
                                  <td class="text-right"></td>
                                  <td class="text-left"></td>
                                  <td class="text-center">
                                    <?php echo anchor('Officer/Training/#/'.$row['train']['id'], '<i class="fa fa-list"></i> รายชื่อนิสิต', 'class="btn  btn-primary"');?>
                                  </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</main>
