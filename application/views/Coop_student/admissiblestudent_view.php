<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#">นิสิตสหกิจ</a></li>
  <li class="breadcrumb-item active">แบบอนุญาติให้นิสิตไปปฏิบัติงานสหกิจ</li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>แบบอนุญาติให้นิสิตไปปฏิบัติงานสหกิจ</div>
            <div class="card-header"><strong> 1.ข้อมูลทั่วไป</strong></div>
                 <div class="card-body">
                 <div class="row">
                 <div class="form-group col-sm-8">
                   <label for="city">ชื่อนิสิต นาย/นางสาว</label>
                   <?php foreach ($data as $row) { ?>
                   <input type="text" class="form-control" id="city" placeholder="<?php echo $row->fullname ?>">
                   <?php } ?>
                  </div>
                 </div>
                 <div class="row">
                  <div class="form-group col-sm-4">
                   <label for="city">รหัสนิสิต</label>
                   <input type="text" class="form-control" id="city" placeholder="<?php echo $row->student_id ?>">
                  </div>
                  <div class="form-group col-sm-4">
                   <label for="postal-code">สาขาวิชา</label>
                   <input type="text" class="form-control" id="postal-code" placeholder="<?php echo $row->name ?>">
                </div>
                <div class="form-group col-sm-4">
                   <label for="city">หลักสูตร</label>
                   <input type="text" class="form-control" id="city" placeholder="">
                  </div>
              </div>
              <div class="row">
              <div class="form-group col-sm-8">
                   <label for="city">ชื่อผู้ปกครอง นาย/นาง/นางสาว</label>
                   <input type="text" class="form-control" id="city" placeholder="">
                  </div>
              </div>
              <div class="row">
              <div class="form-group col-sm-8">
                   <label for="city">ความสัมพันธ์กับนิสิต</label>
                   <input type="text" class="form-control" id="city" placeholder="">
                  </div>
              </div>
              <div><label for="city">สถานที่ติดต่อสะดวก</label></div>
              <div class="row">
                  <div class="form-group col-sm-4">
                   <label for="city">บ้านเลขที่</label>
                   <input type="text" class="form-control" id="city" placeholder="">
                  </div>
                  <div class="form-group col-sm-4">
                   <label for="postal-code">ถนน</label>
                   <input type="text" class="form-control" id="postal-code" placeholder="">
                </div>
                <div class="form-group col-sm-4">
                   <label for="city">ตำบล</label>
                   <input type="text" class="form-control" id="city" placeholder="">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-sm-4">
                   <label for="city">อำเภอ</label>
                   <input type="text" class="form-control" id="city" placeholder="">
                  </div>
                  <div class="form-group col-sm-4">
                   <label for="postal-code">จังหวัด</label>
                   <input type="text" class="form-control" id="postal-code" placeholder="">
                </div>
                <div class="form-group col-sm-4">
                   <label for="city">ฃรหัสไปรษณีย์</label>
                   <input type="text" class="form-control" id="city" placeholder="">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-sm-4">
                   <label for="city">โทรศัพท์</label>
                   <input type="text" class="form-control" id="city" placeholder="">
                  </div>
                  <div class="form-group col-sm-4">
                   <label for="postal-code">โทรสาร</label>
                   <input type="text" class="form-control" id="postal-code" placeholder="">
                </div>
                <div class="form-group col-sm-4">
                   <label for="city">E-mail</label>
                   <input type="text" class="form-control" id="city" placeholder="">
                  </div>
              </div>
              <div class="row">
               <div class="card-header"><strong> 2.การตอบรับอนุญาติให้นิสิตไปปฏิบัติงานสหกิจศึกษา</strong></div>
              </div>
              <div class="row">
              <div class="radio col-sm-12">
                          <label for="radio1">
                            <input type="radio" id="radio1" name="radios" value="option1"> อนุญาติให้นิสิตในปกครองไปปฏิบัติงานสหกิจศึกษาตามที่มหาวิทยาลัยกำหนด
                          </label>
                        </div>
              </div>
              <div class="row">
              <div class="radio col-sm-12">
                          <label for="radio2">
                            <input type="radio" id="radio2" name="radios" value="option2"> ไม่อนุญาติอนุญาติให้นิสิตในปกครองไปปฏิบัติงานสหกิจศึกษา
                          </label>
                        </div>
              </div>
              <div class="card-footer text-center">
                  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>พิมพ์เอกสาร</button>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
