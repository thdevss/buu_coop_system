<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->




<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i> รายชื่อนิสิตฝึกงานของนิสิตสหกิจ</div>
              <div class="card-body">

              <table class="table table-striped datatable">
                    <thead>
                      <tr>
                        <th></th>
                        <th>รหัสนิสิต</th>
                        <th>ชื่อ-สกุล</th>
                        <th>GPAX</th>
                        <th>สาขาวิชา</th>
                        <th>ตำแหน่งที่สมัคร</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    foreach($data as $row) { ?>
                      <tr>
                        <td class="text-center"> <?php echo $i++; ?></td>
                        <td><?php echo $row['student']['id'];?></td>
                        <td><?php echo $row['student']['fullname'];?></td>
                        <td class=" text-right">3.52</td>
                        <td><?php echo $row['department']['name'];?></td>
                        <td><?php echo $row['company_job_position']['position_title']?></td>
                        <td class="text-center"><?php echo anchor('company/assessmentstudent/form/'.$row['assessment_student']['student_id'], 'ประเมินผล', 'class="btn btn-primary"');?></td>
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
      