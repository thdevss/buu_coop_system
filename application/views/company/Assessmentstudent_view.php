<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo $user->login_type;?></a></li>
  <li class="breadcrumb-item active">ประเมินผลการฝึกงานของนิสิตสหกิจ</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i>ประเมินผลการฝึกงานของนิสิตสหกิจ</div>
              <div class="card-body">

              <table class="table table-striped datatable">
                    <thead>
                      <tr>
                        <th>รหัสนิสิต</th>
                        <th>ชื่อ-สกุล</th>
                        <th>GPAX</th>
                        <th>สาขาวิชา</th>
                        <th>ตำแหน่งที่สมัคร</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $row) { ?>
                      <tr>
                        <td><?php echo $row['student']['id'];?></td>
                        <td><?php echo $row['student']['fullname'];?></td>
                        <td class=" text-right">4</td>
                        <td><?php echo $row['department']['name'];?></td>
                        <td><?php echo $row['company_job_position']['position_title']?></td>
                        <td><?php echo anchor('company/assessmentstudent/form/'.$row['assessment_student']['student_id'], 'ประเมินผล', 'class="btn btn-primary"');?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                  <!--table รายชื่อนิสิต-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      