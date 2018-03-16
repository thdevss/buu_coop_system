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
            <div class="card-header"><i class="fa fa-align-justify"></i> รายละเอียดแบบแจ้งแผนปฎิบัติการสหกิจ ของ <B><?php echo $student['fullname'].' '.$student['id']; ?></B> </div>
              <div class="card-body">
              <form action="" method="post">
              <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th></th>
                        <th>หัวข้องาน</th>
                        <th>เดือนที่ 1</th>
                        <th>เดือนที่ 2</th>
                        <th>เดือนที่ 3</th>
                        <th>เดือนที่ 4</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($coop_student_plan as $row) { ?>
                        <tr>
                          <td class="text-center"><?php echo $i++;?></td>
                          <td><?php echo $row['work_subject'];?></td>
                        <!-- เดือนที่1 -->
                          <td class="text-left"><div class="progress mb-3">
                          <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                          </td>
                        <!-- เดือนที่2 -->
                          <td><div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                        <!-- เดือนที่3 -->
                          <td><div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                        <!-- เดือนที่4 -->
                          <td><div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          
                        </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      