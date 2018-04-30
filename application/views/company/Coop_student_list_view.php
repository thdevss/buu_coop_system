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
            <div class="card-header"><i class="fa fa-align-justify"></i>รายชื่อนิสิตสหกิจ</div>
              <div class="card-body">
              <table class="table table-bordered" id="student_table">
                    <thead>
                      <tr>
                        <th></th>
                        <th class="text-left">รหัสนิสิต</th>
                        <th class="text-left">ชื่อ-สกุล</th>
                        <th class="text-left">ตำแหน่งงาน</th>
                        <th class="text-left">บริษัท</th>
                        <th class="text-left">พี่เลียง</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($data as $row){?>
                        <tr>
                          <td><?php echo $i++; ?></tb>
                          <td><?php echo $row['coop_student_name']['student_id']; ?></tb>
                          <td><?php echo $row['coop_student_name']['student_prefix']."".$row['coop_student_name']['student_fullname']; ?></tb>
                          <td><?php echo $row['coop_student_job']['job_title']; ?></tb>
                          <td><?php echo $row['coop_student_company']['company_name_th']; ?></tb>
                          <td>
                          <?php if($row['trainer']){?>
                          <?php echo $row['trainer']['person_fullname']; ?>
                          <?php } ?>
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



</main>


