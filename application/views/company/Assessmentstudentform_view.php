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
            <div class="card-header"><i class="fa fa-align-justify"></i>ประเมินผลการฝึกงานของนิสิตสหกิจ</div>
              <div class="card-body">
              <?php
              if($status) {
                echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
              }
              ?>
              <form action="<?php echo site_url('Company/Assessmentstudent/save/'.$student_id);?>" method="post">
              <input type="hidden" value="<?php echo $student_id;?>" name="student_id">
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
                          <td><b><?php echo $row['questionnaire_subject']['number']." ".$row['questionnaire_subject']['title'];?></b></td>
                        </tr>
                    
                      <?php foreach($row['questionnaire_item'] as $item) {?>
                        <tr>
                          <td>
                            <p><?php echo $item['number']." ".$item['title'];?></p>
                            <p><?php echo $item['description'];?></p>
                          </td>
                          <?php for($i=5;$i>=1;$i--) { ?>
                            <td>
                              <input class="form-check-input" type="radio" value="<?php echo $i;?>" name="item[<?php echo $item['id'];?>]" style="margin-left: unset !important; position: unset !important;" required <?php if(@$result[$item['id']] == $i) echo 'checked'; ?>>
                            </td>
                          <?php } ?>
                        </tr>

                      <?php } ?>
                      <?php } ?>
                    </tbody>
                  </table>
                  <div class="text-center">
                    <button type="reset" class="btn btn-md btn-danger"><i class=""></i> ยกเลิก</button>
                    <button type="submit" class="btn btn-md btn-success"><i class=""></i> บันทึก</button>                    
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
</div>
      