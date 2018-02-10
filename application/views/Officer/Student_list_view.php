<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
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

              <!---->
              
              <!---->

              <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th class="text-center"> </th>
                        <th class="text-center">รหัสนิสิต</th>
                        <th class="text-center" >ชื่อ-สกุล</th>
                        <th class="text-center">GPAX</th>
                        <th class="text-center">สาขาวิชา</th>
                        <th class="text-center">สถานะ</th>
                        <th class="text-center">สถานะจากสถานประกอบการ</th>
                        <th class="text-center"></th>
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

                        <td class="text-center"><?php echo $row['student']['id'];?></td>
                        <td class="text-center"><?php echo $row['student']['fullname'];?></td>
                        <td></td>
                        <td class="text-center"><?php echo $row['department']['name'];?></td>
                        <td class="text-center"><?php echo $row['coop_student_type'][0]['status_name'];?></td>
                        <td class="text-center"><?php echo $row['student']['company_status'];?></td>
                        <td><?php echo anchor('Officer/Student_list/student_detail/'.$row['student']['id'], 'รายละเอียด', 'class="btn btn-primary" target="_blank"');?></td>
                      </tr>
                    <?php 
                    }
                    ?>
                    </table>
                    <!---->
                        <div class="row">
                          <div class="col-sm-3"></div>
                              <div class="form-group col-sm-3">
                              <select id="select" name="select" class="form-control">
                                <option>---กรุณาเลือก--</option>
                                <?php foreach ($coop_status_type as $row){?>
                                <option value="<?php echo $row['id'];?>"> <?php echo $row['status_name'];?></option>
                                <?php } ?>
                              </select>
                          </div>
                          <div class="col-sm-6"></div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                            <button type="button" class="btn btn-success">Success</button>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>           
                    <!---->
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>