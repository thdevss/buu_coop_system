<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show() ;?>


<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i> แบบฟอร์มยื่นสมัครกับบริษัท
          </div>
            <div class="card-body">
            <div class="card-header text-center">
                  <strong>ข้อมูลส่วนนิสิต (APPLICANT 'S INFORMATION)</strong>
                </div>
                <div class="card-body">
                  <div class="row">

                    <!--ส่วนของกรอกชื่อ-->
                      <div class="form-group col-sm-6">
                        <label for="name">ชื่อ(Name)</label><code>*</code>
                        <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>
                    <!--ส่วนของกรอกชื่อ-->

                    <!--ส่วนของกรอกนามสกุล-->
                      <div class="form-group col-sm-6">
                        <label for="name">นามสกุล(Surname)</label><code>*</code>
                        <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>
                    <!--ส่วนของกรอกนามสกุล-->

                  </div>

                    <div class="row">

                     <!--ส่วนของรหัสนิสิต-->
                      <div class="form-group col-sm-4">
                        <label for="ccnumber">รหัสนิสิต</label><code>*</code>
                        <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>
                     <!--ส่วนของรหัสนิสิต-->
                     <!--ส่วนของโทรศัพท์-->
                      <div class="form-group col-sm-4">
                        <label for="ccnumber">โทรศัพท์</label><code>*</code>
                        <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>
                      <!--ส่วนของโทรศัพท์-->
                      <!--ส่วนของมือถือ-->
                      <div class="form-group col-sm-4">
                        <label for="ccnumber">มือถือ</label><code>*</code>
                        <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>
                       <!--ส่วนของมือถือ-->

                  </div>

                  <div class="row">
                  <!--ส่วนของEmail-->
                  <div class="form-group col-sm-5">
                        <label for="ccnumber">Email</label><code>*</code>
                        <input type="email" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>
                  <!--ส่วนของEmail-->
                  </div>

                  <div class="row">
                  <!--ส่วนของเลือกสาขา-->
                  <div class="form-check col-sm-1">
                  <label>สาขา</label><code>*</code>
                  </div>
                  <div class="form-check col-sm-2">
                          <input class="form-check-input" type="radio" value="" id="radio1" name="radios">
                          <label class="form-check-label" for="radio1">
                            วิทยาการคอมพิวเตอร์
                          </label>
                        </div>

                    <div class="form-check col-sm-2">
                          <input class="form-check-input" type="radio" value="" id="radio2" name="radios">
                          <label class="form-check-label" for="radio2">
                            วิทยาการสารสนเทศ
                          </label>
                        </div>
                        
                    <div class="form-check col-sm-2">
                          <input class="form-check-input" type="radio" value="" id="radio3" name="radios">
                          <label class="form-check-label" for="radio3">
                            วิศวกรรมซอฟต์แวร์
                          </label>
                        </div>
                  <!--ส่วนของเลือกสาขา-->
                  </div>

                    <div class="row">
                    <div class="col-sm-12">
                    <div class="card-header text-center">
                  <strong>ชื่อสถานประกอบการที่ต้องการสมัคร รอบที่:</strong>
                    </div>
                    </div>
                    </div>
                    <!--br-->
                    <br>
                    <!--br-->
                    <div class="row">
                    <!--ส่วนของชื่อสถานประกอบการ-->
                    <div class="form-group col-sm-6">
                        <label for="name">ชื่อสถานประกอบการ</label><code>*</code>
                        <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>
                    <!--ส่วนของชื่อสถานประกอบการ-->

                    <!--ส่วนของตำแหน่งการสมัครงาน-->
                    <div class="form-group col-sm-6">
                        <label for="name">สมัครงานในตำแหน่ง</label><code>*</code>
                        <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>
                    <!--ส่วนของตำแหน่งการสมัครงาน-->
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-header text-center"><strong>ข้อมูลส่วนนิสิต (APPLICANT 'S INFORMATION)</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->

                    <div class="form-group row">
                      <div class="col-sm-12">
                      <img src="http://reg.buu.ac.th/registrar/getstudentimage.asp?id=<?php echo $user->login_value;?>" class="rounded-circle">
                      </div>

                      <div class="form-group col-sm-6">
                      <label for="name">ชื่อ(Name)</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-6">
                      <label for="name">นามสกุล(Surname)</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-6">
                      <label for="name">Name</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-6">
                      <label for="name">Surname</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">สาขาวิชา</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-2">
                      <label for="name">รหัสนิสิต</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">ชั้นปีที่</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">เกรดเฉลี่ยภาคการศึกษาที่ผ่านมา</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">เกรดเฉลี่ยสะสม</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">สถานที่เกิด</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">วันเดือนปีเกิด</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">อายุ</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">เพศ</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">บัตรประจำตัวประชาชนเลขที่</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">สัญชาติ</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">ศาสนา</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">ส่วนสูง</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">น้ำหนัก</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-6">
                      <label for="name">ที่อยู่ที่ติดต่อได้</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-6">
                      <label for="name">ที่อยู่ที่ตามทะเบียนบ้าน</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">โทรศัพท์</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-3">
                      <label for="name">มือถือ</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">Email</label><code>*</code>
                      <input type="email" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-8">
                      </div>

                      <div class="form-group col-sm-12">
                      <label><strong>บุคคลที่ติดต่อได้ในกรณีฉุกเฉิน</strong></label>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">ชื่อ</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">นามสกุล</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">โทรศัพท์</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">ความสัมพันธ์</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">ที่อยู๋</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-header text-center"><strong>ข้อมูลครอบครัว (FAMILY DETAILS)</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="form-group row">

                    <div class="form-group col-sm-4">
                      <label for="name">ชื่อบิดา</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">อาชีพ</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">โทรศัพท์</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">ชื่อมารดา</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">อาชีพ</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-4">
                      <label for="name">โทรศัพท์</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                      <div class="form-group col-sm-8">
                      <label for="name">ที่อยู่</label><code>*</code>
                      <input type="text" class="form-control" id="" name="" placeholder="กรุณากรอก" required>
                      </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-header text-center"><strong>ประวัติการศึกษา (EDUCATIONAL HISTORY)</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                    <div class="col-sm-12">
                    <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th>ระดับ</th>
                        <th>สถานศึกษา</th>
                        <th>ปีที่เริ่ม</th>
                        <th>ปีที่จบ</th>
                        <th>ผลการศึกษา</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr> 
                    </tbody>
                  </table>
                 </div>
                 </div>

                  <div class="row">
                        <div class="col-sm-12">
                            <div class="card-header text-center"><strong>ประวัติการอบรม และกิจกรรมนอกหลักสูตร</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                    <div class="col-sm-12">
                    <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th>หัวข้อฝึกอบรม/ฝึกงาน</th>
                        <th>หน่วยงานที่ให้การฝึกอบรม/ฝึกงาน</th>
                        <th>ระยะเวลา</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr> 
                    </tbody>
                  </table>
                  </div>
                  </div>

                  <div class="row">
                        <div class="col-sm-12">
                            <div class="card-header text-center"><strong>จุดหมายงานอาชีพ (CAREER VISION)</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                    <div class="col-sm-12">
                    <p>ระบุสายงานและลักษณะงานอาชีพที่นิสิตสนใจ (List your career goals, fields of interest and job preferences.)<code>*</code></p>
                    <textarea id="textarea-input" name="textarea-input" rows="9" class="form-control" placeholder="กรุณากรอก..."></textarea>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-header text-center"><strong>ความสามารถทางภาษา (LANGUAGE PROFICIENCY)</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                    <div class="col-sm-12">
                    <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th>ภาษา</th>
                        <th>ฟัง</th>
                        <th>พูด</th>
                        <th>อ่าน</th>
                        <th>เขียน</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr> 
                    </tbody>
                  </table>
                </div>
                </div>

                <div class="row">
                        <div class="col-sm-12">
                            <div class="card-header text-center"><strong>ความสามารถทางคอมพิวเตอร์</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                        <div class="col-sm-12">
                            <code>*</code>
                            <textarea id="textarea-input" name="textarea-input" rows="9" class="form-control" placeholder="กรุณากรอก..."></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-header text-center"><strong>โปรดอธิบายให้ผู้อื่นรู้จักตัวท่านดีขึ้น</strong>
                        </div>
                    </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                        <div class="col-sm-12">
                            <code>*</code>
                            <textarea id="textarea-input" name="textarea-input" rows="9" class="form-control" placeholder="กรุณากรอก..."></textarea>
                        </div>
                    </div>
                     <!--br-->
                     <br>
                    <!--br-->
                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-6">
                        <button type="button" class="btn btn-outline-primary active">พิมพ์เอกสาร</button>
                        </div>
                    </div>
                    


                </div>
                    
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

 
