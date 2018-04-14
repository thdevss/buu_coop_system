<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>



<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> แบบฟอร์มข้อมูลสถานที่อบรม</div>
                    <div class="card-body">             
                        <form id="train_location_form">
                            <input type="hidden" name="location_id" id="location_id" value="<?php echo @$row['location_id'];?>">
                            <div class="row">
                                <div class="form-group col-md-6 offset-md-3">
                                    <label for="location_building">ชื่อตึก</label>          
                                    <input value="<?php echo @$row['location_building'];?>" class="form-control" type="text" name="location_building" id="location_building">
                                </div>

                                <div class="form-group col-md-6 offset-md-3">
                                    <label for="location_room">ชื่อห้อง</label>          
                                    <input value="<?php echo @$row['location_room'];?>" class="form-control" type="text" name="location_room" id="location_room">
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

<script src="<?php echo base_url('/assets/js/officer_js/train_location_form.js?'.time());?>"></script>
