<!-- Breadcrumb -->

<!-- Main content -->
<main class="main">

<!--breadcrumb-->
<?php echo $this->breadcrumbs->show(); ?>



<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <div class="col-md-12">
                <div class="card">
                 <div class="card-header"><i class="fa fa-align-justify"></i>เพิ่มข้อมูลโครงการอบรม</div>
                  <form action="<?php echo site_url('Officer/Company_info/edit/'.$company_job_position_by_id['id']);?>" method="post">
                    <div class="card-body "> 
                    <?php
                        if($this->session->flashdata('form-alert')) {
                            echo $this->session->flashdata('form-alert');
                        }
                    ?>
                        <div class="row">
                            <div class="col-sm-4"></div>

                            <div class="form-group col-sm-4">
                                <label for="job_title_id">ตำแหน่ง</label><code>*</code>
                                <select class="form-control" id="job_title_id" name="job_title_id">

                                    <option value="<?php echo $company_job_position_by_id['position_title'];?>"><?php echo $company_job_position_by_id['position_title'];?></option>
                                    <?php foreach($company_job_title as $row) {?>
                                        <option value="<?php echo $row['job_title'];?>"><?php echo $row['job_title'];?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-sm-4"></div>
                            <input type="hidden" name="company_id" value="<?php echo $company_job_position_by_id['company_id'];?>">

                            <div class="col-sm-4"></div>
                            
                            <div class="form-group col-sm-4">
                                <label for="number_of_employee">จำนวน</label><code>*</code>
                                <input type="number" min="1" class="form-control" id="number_of_employee" name="number_of_employee" value="<?php echo $company_job_position_by_id['number_of_employee'];?>">
                            </div>

                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>

                            <div class="form-group col-sm-4">
                                <label class="col-md-8 form-control-label" for="textarea-input">ลักษณะงานที่นิสิตต้องปฏิบัติงาน<code>*</code></label>
                                <textarea id="textarea-input" name="job_description" rows="9" class="form-control"><?php echo $company_job_position_by_id['job_description'];?></textarea>
                            </div>

                            <div class="col-sm-4"></div>
                        </div>     
                        <div class="col-md-12 text-center"> 
                            <button type="reset" class="btn btn-danger"><i></i>ยกเลิก</button>
                            <button type="submit" class="btn btn-success"><i></i>บันทึก</button>                
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

