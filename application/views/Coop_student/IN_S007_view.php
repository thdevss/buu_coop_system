<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>


<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <form action="<?php echo site_url('Coop_student/IN_S007/save');?>" method="post">
                <div class="card-header"><i class="fa fa-align-justify"></i>แบบคำร้องทั่วไป</div>
                    <div class="card-body">
                    <!--row1-->
                        <div class="row">
                            <div class="col-md-10"></div>

                            <div class="col-md-2">
                              <?php echo thaiDate(date('Y-m-d H:i:s')); ?>
                              <input type="hidden" value="<?php echo thaiDate(date('Y-m-d H:i:s')); ?>">
                            </div>
                        </div>
                    <!--row1-->
                    <!--row2-->
                        
                    <!--row2-->

                        <center>
                          <button type="button" class="btn btn-md btn-primary" name="print" value="1"><i ></i>พิมพ์เอกสาร</button>
                          <button type="submit" class="btn btn-md btn-success" name="save" value="1"><i ></i>บันทึกเอกสาร</button>     
                        </center>                           
                    </div>
            </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      