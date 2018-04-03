
<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >

        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i> แบบประเมินสถานประกอบการ</div>
              <div class="card-body">
              <form action="<?php echo site_url('Coop_student/Assessment_company/save/');?>" method="post">
              <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>หัวข้อประเมิน/Items</th>
                        <th>คะแนน</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $row) { ?>
                        <tr>
                          <td><b><?php echo $row['questionnaire_subject']['number']." ".$row['questionnaire_subject']['title'];?></b></td>
                          <td></td>
                        </tr>
                    
                      <?php foreach($row['questionnaire_item'] as $item) {?>
                        <tr>
                          <td>
                            <p><?php echo $item['number']." ".$item['title'];?></p>
                            <p><?php echo $item['description'];?></p>
                          </td>
                          <td class="text-right">
                            <?php echo number_format($item['avg_score'], 2); ?>
                          </td>
                        </tr>

                      <?php } ?>
                      <?php } ?>
                    </tbody>
                  </table>
                  
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      