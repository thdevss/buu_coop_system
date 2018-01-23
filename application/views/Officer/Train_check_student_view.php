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
            <div class="col-sm-12">
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
                                <div class="form-group col-md-6 offset-md-3">
                                    <label for="building">โครงการ</label>          
                                    <select class="form-control" name="train_id">
                                        <option>--- please select ----</option>
                                        <?php foreach($data as $row) { ?>
                                            <option value="<?php echo $row['train']->id;?>"><?php echo $row['train']->date;?> - <?php echo $row['train']->title;?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6 offset-md-3">
                                    <label for="note">Note</label>          
                                    <input value="<?php echo @$row->room;?>" class="form-control" type="text" name="note" id="note">
                                </div>

                                <div class="col-sm-12 text-center">
                                    <button type="reset" class="btn btn-warning" name="" value="1"><i class="fa fa-dot-circle-o"></i> ยกเลิก</button>                                
                                    <button type="submit" class="btn btn-primary" name="save" value="1"><i class="fa fa-dot-circle-o"></i> บันทึกข้อมูล</button>                
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</main>
