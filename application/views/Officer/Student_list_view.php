<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#">เจ้าหน้าที่</a></li>
  <li class="breadcrumb-item active">รายชื่อนิสิต</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i>รายชื่อนิสิต</div>
              <div class="card-body">
              <table class="table table-bordered datatable" >
                    <thead>
                      <tr bgcolor="MediumSeaGreen">
                        <th class="text-center"> </th>
                        <th class="text-center">รหัสนิสิต</th>
                        <th class="text-center" >ชื่อ-สกุล</th>
                        <th class="text-center">GPAX</th>
                        <th class="text-center">สาขาวิชา</th>
                        <th class="text-center">สถานะสหกิจ</th>
                        <th class="text-center">สถานะจากสถานประกอบการ</th>

                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $row){?>
                      <tr>

                        <td>
                        <div class="form-group row">
                      <label class="col-sm-5 form-control-label"></label>
                      <div class="col-sm-5">
                        <div class="checkbox">
                          <label for="checkbox1">
                            <input type="checkbox" id="checkbox1" name="checkbox1" value="option1">
                          </label>
                        </div>
                        </td>

                        <td class="text-center"><?php echo $row['student']->id;?></td>
                        <td class="text-center"><?php echo $row['student']->fullname;?></td>
                        <td></td>
                        <td class="text-center"><?php echo $row['student_field']->name;?></td>
                        <td class="text-center"><?php echo $row['student']->coop_status;?></td>
                        <td class="text-center"><?php echo $row['student']->company_status;?></td>
                      </tr>
                    <?php 
                    }
                    ?>
                    </table>
                    <div class="form-group row">
                    <label class="col-md-9 form-control-label" for="select"></label>
                    <div class="col-md-9">
                    <table>
                    <th>
                      <select id="select" name="select" class="form-control form-control-md">
                        <option value="1">เปลี่ยนสถานะ</option>
                        <option value="2">รอ</option>
                        <option value="3">รอสัมภาษณ์</option>
                        <option value="4">รอผลสอบสัมภาษณ์</option>
                        <option value="5">ผ่าน รอบที่ 1</option>
                        <option value="6">ผ่าน รอบที่ 2</option>
                        <option value="7">ผ่าน รอบที่ 3</option>
                      </select>
                      </th>
                      <th>
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-success btn-md">บันทึก</button>
                          </span>
                    </div>
                    </th>
                    </table>
                    </tbody>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>