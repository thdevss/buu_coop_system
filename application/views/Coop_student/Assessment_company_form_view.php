
<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >

        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i> แบบประเมินสถานประกอบการที่ให้ความอนุเคราะห์รับนักศึกษาฝึกงาน </div>
              <div class="card-body">
              <div class="alert alert-info" role="alert">
              ระดับคะแนน 5 = ดีมาก 4 = ดี 3 = ปานกลาง 2=พอใช้ 1 = ต้องปรับปรุง N/A  ไม่สามารถประเมินได้
                </div>
              <!-- <div align="right">
              <lable><code>*ระดับคะแนน 5 = ดีมาก 4 = ดี 3 = ปานกลาง 2=พอใช้ 1 = ต้องปรับปรุง N/A  ไม่สามารถประเมินได้</code></lable>
              </div> -->
              <br>
              <?php
              if($status) {
                echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
              }
              ?>
              <form action="<?php echo site_url('Coop_student/Assessment_company/save/');?>" method="post">
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
                    <div class="col-md-9">
                    <lable><b>4. ตามข้อ 1.2 สถานประกอบการได้สนับสนุนสิ่งอำนวยความสะดวกต่าง ๆ ได้แก่<b></lable>
                    <textarea id="textarea-input" name="textarea-input" rows="6" class="form-control" placeholder="......"></textarea>
                    </div>
                    <br>
                    <div class="col-md-9">
                    <lable><b>5 .ตามข้อ 1.3 สถานประกอบการได้ให้การสนับสนุนด้านสวัสดิการ ได้แก่ <b></lable>
                    <textarea id="textarea-input" name="textarea-input" rows="6" class="form-control" placeholder="......"></textarea>
                    </div>
                    <br>
                    <div class="col-md-9">
                    <lable><b>6. ในปีการศึกษาถัดไป ท่านคิดว่าสมควรส่งนักศึกษาไปปฏิบัติสหกิจศึกษา/ฝึกงาน ณ สถานประกอบการแห่งนี้หรือไม่ <b></lable>
                    <div class="custom-controls-stacked">
                          <label class="custom-control custom-radio">
                            <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">เห็นสมควรส่งไป</span>
                          </label>
                          <label class="custom-control custom-radio">
                            <input id="radioStacked2" name="radio-stacked" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">ไม่สมควรส่งไป</span>
                          </label>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-9">
                    <lable><b>7.ข้อคิดเห็นเพิ่มเติม <b></lable>
                    <textarea id="textarea-input" name="textarea-input" rows="6" class="form-control" placeholder="......"></textarea>
                    </div>
                    <br><br>
                  <div class="text-center">
                    <button type="submit" class="btn btn-md btn-primary" value="1" name="print"><i class="fa fa-dot-circle-o"></i>พิมพ์เอกสาร</button>
                    <button type="submit" class="btn btn-md btn-success" value="0" name="print"><i class="fa fa-dot-circle-o"></i> บันทึก </button>                    
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
      