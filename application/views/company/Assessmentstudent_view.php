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
                        <th>ชื่อ-สกุล</th>
                        <th>GPAX</th>
                        <th>สาขาวิชา</th>
                        <th>ตำแหน่งที่สมัคร</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($data as $row){
                      ?>
                      <tr>
                        <td><?php echo $row->fullname;?></td>
                        <td class=" text-right">4</td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo anchor('company/assessmentstudent/form/'.$row->student_id, '<i class="fa fa-star"></i> ประเมินผล', 'class="btn btn-secondary"');?></td>
                      </tr>
                      <?php
                      }
                      ?>
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
      