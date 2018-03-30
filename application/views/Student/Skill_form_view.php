<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>
<!-- <ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">ทักษะที่ถนัด</li>
</ol> -->
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <div class="col-sm-12">
                <div class="card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> ทักษะที่ถนัด</div>
                    <div class="card-body">
                        <?php 
                            if($status){
                                echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
                            }
                        ?>
                    <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                    <?php foreach ($skills as $skill ) { ?>
                        <th><?php echo $skill['skill_category_name']; ?></th>
                    <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td class="text-left"></td>
                                                     
                        </tr>
                   
                    </tbody>
                    
                </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



 <!-- <form action="<?php echo site_url('Student/Skill/save');?>" method="post">
                            <div class="form-group row">
                              <label class="col-md-2 col-form-label">เลือกทักษะที่ถนัด</label>
                                <div class="col-md-10 col-form-label">
                                //
                                //$checked = false;
                                //foreach(@$skill as $key => $row) { 
                                    //if(in_array($row['skill_id'], @$has_skill)) {
                                       // $checked = true;
                                    //} else {
                                      //  $checked = false;
                                    //}
                                
                                    <div class="form-check form-check-inline mr-5">
                                    <input class="form-check-input" type="checkbox" id="<?php echo $key;?>" value="<?php echo $row['skill_id'];?>" name="skill[]" <?php if($checked) echo 'checked'; ?>>
                                    <label class="form-check-label" for="<?php echo $key;?>"><?php echo $row['skill_name'];?></label>
                                    </div>
                                //
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                  <button type="submit" class="btn btn-sm btn-success"><i class=""></i> บันทึก</button>
                                </div>  
                                    
                            </div>
                        </form> -->
 
