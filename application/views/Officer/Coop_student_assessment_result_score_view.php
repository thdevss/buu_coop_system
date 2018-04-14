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
            <div class="card-header"><i class="fa fa-align-justify"></i>ประเมินผลการฝึกงานของนิสิตสหกิจ ของ <?php echo $student['student_fullname']." ".$student['student_id'];?></div>
              <div class="card-body">
              <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>หัวข้อประเมิน/Items</th>
                        <th>5</th>
                        <th>4</th>
                        <th>3</th>
                        <th>2</th>
                        <th>1</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $row) { ?>
                        <tr>
                          <td colspan="6"><b><?php echo $row['questionnaire_subject']['coop_student_questionnaire_subject_number']." ".$row['questionnaire_subject']['coop_student_questionnaire_subject_title'];?></b></td>
                        </tr>
                    
                      <?php foreach($row['questionnaire_item'] as $item) {?>
                        <tr>
                          <td>
                            <p><?php echo $item['coop_student_questionnaire_item_number']." ".$item['coop_student_questionnaire_item_title'];?></p>
                            <p><?php echo $item['coop_student_questionnaire_item_description'];?></p>
                          </td>
                          <?php for($i=5;$i>=1;$i--) { ?>
                            <td>
                              <?php if(@$result[$item['coop_student_questionnaire_item_id']] == $i) echo '<b>*</b>'; ?>
                              
                            </td>
                          <?php } ?>
                        </tr>

                      <?php } ?>
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
</div>
      