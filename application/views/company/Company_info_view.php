  <!-- Main content -->
<main class="main">

  <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
      <li class="breadcrumb-item active">ข้อมูลบริษัท</li>
    </ol>

        <div class="container-fluid">
          <div class="animated fadeIn">
              <div class="row" >
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i>ข้อมูลบริษัท</div>
                      <div class="card-body">
                      
                          <label for="name"><B>1. รายละเอียดเกี่ยวกับสถานประกอบการ / หน่วยงาน</B></label><br>
                    
                     
                          <label for="name">ชื่อสถานประกอบการ / หน่วยงาน</label>
                          <?php foreach ($data as $row) { ?>
                              <div class="row">
                              <div class="form-group col-sm-6">
                                <label>(ภาษาไทย)</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" placeholder="">
                              </div>

                              </div>

                              <div class="row">
                              <div class="form-group col-sm-6">
                                <label>(ภาษาอังกฤษ)</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" placeholder="">
                              </div>

                              </div>

                              <div class="row">

                                <div class="form-group col-sm-3">
                                  <label>ที่อยู่เลขที่</label><code>*</code>
                                  <input type="text" class="form-control" id="" name="" placeholder="">
                                </div>

                                <div class="form-group col-sm-5">
                                  <label>อาคาร</label><code>*</code>
                                  <input type="text" class="form-control" id="" name="" placeholder="">
                                </div>

                                <div class="form-group col-sm-4">
                                  <label>ถนน</label><code>*</code>
                                  <input type="text" class="form-control" id="" name="" placeholder="">
                                </div>

                              </div>

                              <div class="row">

                                <div class="form-group col-sm-3">
                                  <label>ซอย</label><code>*</code>
                                  <input type="text" class="form-control" id="" name="" placeholder="">
                                </div>

                                <div class="form-group col-sm-3">
                                  <label>แขวง</label><code>*</code>
                                  <input type="text" class="form-control" id="" name="" placeholder="">
                                </div>

                                <div class="form-group col-sm-3">
                                  <label>เขต</label><code>*</code>
                                  <input type="text" class="form-control" id="" name="" placeholder="">
                                </div>

                                <div class="form-group col-sm-3">
                                  <label>เขต</label><code>*</code>
                                  <input type="text" class="form-control" id="" name="" placeholder="">
                                </div>

                              </div>

                               <div class="row">

                                <div class="form-group col-sm-3">
                                  <label>รหัสไปรษณีย์</label><code>*</code>
                                  <input type="text" class="form-control" id="" name="" placeholder="">
                                </div>

                                <div class="form-group col-sm-4">
                                  <label>ประเภทกิจการ/ธุรกิจ/ผลิตภัณฑ์/ลักษณะการดำเนินงาน</label><code>*</code>
                                  <input type="text" class="form-control" id="" najme="" placeholder="">
                                </div>

                                <div class="form-group col-sm-3">
                                  <label>จำนวนพนักงาน</label><code>*</code>
                                  <input type="text" class="form-control" id="" name="" placeholder="">
                                </div>

                                <div class="form-group col-sm-2">
                                  <label>คน</label><code>*</code>
                                  <input type="text" class="form-control" id="" name="" placeholder="">
                                </div>

                              </div>

                             
                              <label for="name"><B>ชื่อผู้จัดการสถานประกอบการ / หัวหน้าหน่วยงาน</B></label>
                             

                              <div class="row">

                              <div class="form-group col-sm-4">
                                <label>ชื่อ-นามสกุล</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" placeholder="">
                              </div>

                              </div>

                              <div class="row">

                              <div class="form-group col-sm-4">
                                <label>ตำแหน่ง</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" placeholder="">
                              </div>

                              <div class="form-group col-sm-4">
                                <label>แผนก/ฝ่าย</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" placeholder="">
                              </div>

                              </div>

                              <div class="row">

                              <div class="form-group col-sm-4">
                                <label>โทรศัพท์</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" placeholder="">
                              </div>

                              <div class="form-group col-sm-4">
                                <label>โทรสาร</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" placeholder="">
                              </div>

                              </div>

                              <div class="row">

                                <div class="form-group col-sm-4">
                                  <label>E-mail</label><code>*</code>
                                  <input type="text" class="form-control" id="" name="" placeholder="">
                                </div>

                                </div>

                              <label for="name">หากมหาวิทยาลัย ฯ ประสงค์จะติดต่อประสานงานในรายละเอียดกับสถานประกอบการ / หน่วยงาน ขอให้</label>

                                <div class="row">
                                
                                <div class="radio col-sm-4 ">
                                <label>
                                <input type="radio" id="radio1" name="radios" value="option1"> ติดต่อโดยตรงกับผู้จัดการ / หัวหน้าหน่วยงาน<code>*</code>
                                </label>
                                <label>
                                <input type="radio" id="radio2" name="radios" value="option2"> ติดต่อโดยตรงกับผู้จัดการ / หัวหน้าหน่วยงาน<code>*</code>
                                </label>
                                </div>

                              </div>

                              <div class="row">

                              <div class="form-group col-sm-6">
                                <label>ชื่อ-นามสกุล</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" placeholder="">
                              </div>

                              </div>

                              <div class="row">

                              <div class="form-group col-sm-4">
                                <label>ตำแหน่ง</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" placeholder="">
                              </div>

                              <div class="form-group col-sm-4">
                                <label>แผนก/ฝ่าย</label><code>*</code>
                                <input type="text" class="form-control" id="" name="" placeholder="">
                              </div>

                              </div>

                              <div class="row">

                            <div class="form-group col-sm-4">
                              <label>โทรศัพท์</label><code>*</code>
                              <input type="text" class="form-control" id="" name="" placeholder="">
                            </div>

                            <div class="form-group col-sm-4">
                              <label>โทรสาร</label><code>*</code>
                              <input type="text" class="form-control" id="" name="" placeholder="">
                            </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-sm-4">
                                  <label>E-mail</label><code>*</code>
                                  <input type="text" class="form-control" id="" name="" placeholder="">
                                </div>

                              </div>

                              <div class="row">

                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                <button type="button" class="btn btn-success"><i class="fa fa-star"></i> บันทึก</button></div>
                                <div class="col-sm-4"></div>

                                </div>

                              <div class="row">

                              <div class="col-sm-5"></div>
                              <div class="col-sm-5"></div>
                              <div class="col-sm-2">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-star"></i> เพิ่มตำแหน่งงาน</button>
                              </div>

                              </div>
                        <br>
                     <table class="table table-striped datatable">
                            <thead>
                              <tr>
                                <th>ตำแหน่งงาน</th>
                                <th>ลักษณะงานที่นิสิตต้องปฏิบัติ (Job Description)</th>
                                <th>จำนวน</th>
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
                              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">เพิ่มตำแหน่งงาน</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="row">
                                            <div class="form-group col-sm-4">
                                              <label for="ccmonth">ตำแหน่ง</label><code>*</code>
                                              <select class="form-control" id="ccmonth">
                                                <option>Programer</option>
                                                <option>Testor</option>
                                                <option>IT support</option>
                                              </select>
                                              </div>

                                              <div class="form-group col-sm-3">
                                              <label>จำนวน</label><code>*</code>
                                              <input type="number" class="form-control" id="" name="">
                                              </div>

                                            </div>

                                            
                                            <div class="form-group row">
                                            <div class="col-md-12">
                                            <label class="col-md-8 form-control-label" for="textarea-input">ลักษณะงานที่นิสิตต้องปฏิบัติงาน<code>*</code></label>
                                              <textarea id="textarea-input" name="textarea-input" rows="9" class="form-control" placeholder=""></textarea>
                                            </div>
                                            </div>
                                            

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                      <button type="button" class="btn btn-success">บันทึก</button>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </main>
  
  <script>
$('.btn-submit').on('click',function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "คุณแน่ใจใช่ไหม",
        text: "ลบคำนิสิตที่เลือก",
        icon: "warning",
        buttons: true,
        dabgerMode: true
    })
    .then((isConfirm) => {
      if (isConfirm) {
        form.submit();
      } else {

      }
    })

});


</script>
      