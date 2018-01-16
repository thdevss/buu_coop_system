    <!-- Main content -->
<main class="main">
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">ระบบสหกิจ</li>
        <li class="breadcrumb-item"><a href="#">เจ้าหน้าที</a></li>
        <li class="breadcrumb-item active">จัดการแบบประเมินนิสิตสหกิจศึกษา</li>
      </ol>
<div class="card">
<div class="card-header"><i class="fa fa-align-justify"></i>จัดการแบบประเมินนิสิตสหกิจศึกษา</div>
      <div class="card-body">
              <form action="<?php echo site_url('officer/Assessment_studentForm/save');?>" method="post" class="form-horizontal">

            <?php 
            $i=1; 
            foreach($rows as $row) { 
            ?>
                <div class="row">    
                    <div class="form-group col-md-12 offset-md-2">
                        <div class="col-md-6">
                        <div class="input-group">
                            <label class="form-control-label" for="hf-text"><h4><b><?php echo $i;?></b></h4></label>
                            <div style="width:30px;"></div>
                                <input type="text" id="input2-group2" name="input2-group2" class="form-control" value="<?php echo $row['headline_name'];?>">
                                <span class="input-group-btn" >
                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-window-close fa-lg"></i> ลบ </button>
                                </span>
                            </div>
                        </div>
                    </div>     

                    <?php 
                    $ii = 1; 
                    foreach($row['choice'] as $choice) { 
                    ?>
                        <div class="form-group col-md-12 offset-md-3">
                            <div class="col-md-6">
                            <div class="input-group">
                                <label class="form-control-label" for="hf-text"><h4><b><?php echo $i;?>.<?php echo $ii;?></b></h4></label>
                                <div style="width:30px;"></div>
                                    <input type="text" id="input2-group2" name="input2-group2" class="form-control" value="<?php echo $choice['name'];?>">
                                    <span class="input-group-btn" >
                                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-window-close fa-lg"></i> ลบ </button>
                                    <button type="reset" class="btn btn-sm btn-info"><i class="icon-plus icons font-2xl "></i> เพิ่ม </button>                                    
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php $ii++; } ?>
                </div>
            <?php $i++; } ?>

                  <div class="form-group col-md-9 offset-md-2">
                        <div class="col-md-9">
                           <div class="input-group">
                          
                           <button type="reset" class="btn btn-lg btn-info btn-block"><i class="icon-plus icons font-2xl "></i> เพิ่ม </button>  
                          
                           <div class="radio col-sm-3">
                          <label for="radio1">
                            <input type="radio" id="radio1" name="radios" value="option1"> ให้คะเเนน
                          </label>
                        </div>
                        <div class="radio col-sm-3">
                          <label for="radio1">
                            <input type="radio" id="radio1" name="radios" value="option1"> ให้ความเห็น
                          </label>
                             </div>
                            </div>
                       </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6 offset-md-3">
                        <div style="height:50px;"></div>
                        <div class="col-md-9">
                           <div class="input-group">
                  <button type="submit"  class="btn btn-lg btn-success btn-block"><i class="fa fa-dot-circle-o"></i>บันทึก</button>
                  </div>
                            </div>
                       </div>
            </form> 
        </div>
    </div>
</div>


            