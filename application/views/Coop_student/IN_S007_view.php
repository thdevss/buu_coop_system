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
                    <div class="row">
                            <div class="form-group col-sm-10">           
                                <label>เรื่อง (ภาษาไทย)</label><code>*</code>
                                <input type="text" class="form-control" id="subject_th" name="subject_th" value="" required>
                            </div>
                            <div class="form-group col-sm-8">           
                                <label>ชื่อ - นามสกุล (ภาษาไทย)</label><code>*</code>
                                <input type="text" class="form-control" id="name_th" name="name_th" value="<?php echo $student['fullname']; ?>" required>
                            </div>
                            <div class="form-group col-sm-4">           
                                <label>รหัสนิสิต </label><code>*</code>
                                <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo $coop_student['student_id']; ?>" required>
                            </div>
                            <div class="form-group col-sm-4">           
                                <label>หลักสูตร </label><code>*</code>
                                <input type="text" class="form-control" id="student_id" name="student_id" value="วท.บ 4ปี (รอดึง)" required>
                            </div>
                            <div class="form-group col-sm-4">           
                            <label>สาขาวิชา </label><code>*</code>
                            <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo $department['name']; ?>" required>
                            </div>
                            <div class="form-group col-sm-6">           
                                <label>ชื่ออาจารย์ที่ปรึกษาวิชาการ (ภาษาไทย)</label><code>*</code>
                                <input type="text" class="form-control" id="name_th" name="name_th" value="<?php echo $adviser['fullname']; ?>" required>
                            </div>
                            <div class="form-group col-sm-4">           
                                <label>โทรศัพท์มือถือ </label><code>*</code>
                                <input type="text" class="form-control" id="name_th" name="name_th" value=" (รอดึง)" required>
                            </div>
                            <div class="form-group col-sm-8">           
                                <label>อีเมล์  </label><code>*</code>
                                <input type="text" class="form-control" id="name_th" name="name_th" value=" (รอดึง)" required>
                            </div>
                            <div class="form-group col-sm-8">           
                                <label>มีความประสงค์  </label><code>*</code>
                                <textarea id="textarea-input" name="textarea-input" rows="4" class="form-control" placeholder="(ส่งค่า)"></textarea>
                            </div>
                            <div class="form-group col-sm-8">           
                                <label>เนื่องจาก   </label><code>*</code>
                                <textarea id="textarea-input" name="textarea-input" rows="4" class="form-control" placeholder="(ส่งค่า)"></textarea>
                            </div>
                        </div>




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
      