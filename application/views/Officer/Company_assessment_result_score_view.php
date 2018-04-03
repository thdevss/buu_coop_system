<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>

  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row" >
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i>  รายชื่อสถานประกอบการ</div>
            <div class="card-body">
              <!--table รายชื่อนิสิต-->
              <table class="table table-bordered datatable" >
                <thead>
                  <tr>
                    <th></th>
                    <th>ลำดับหัวข้อ</th>
                    <th>หัวข้อประเมิน</th>
                    <th>คะแนน</th>
                  </tr>
                </thead>
                  <tbody>
                    <?php $i=1; foreach($data as $row) { ?>
                      <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td class="text-right"><?php echo $row['questionnaire_subject']['number'];?></td>
                        <td class="text-left"><?php echo $row['questionnaire_subject']['title']; ?></td>
                        <td class="text-right"></td>
                      </tr> 
                    <?php } ?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</main>

