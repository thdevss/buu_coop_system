<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#">อาจารย์</a></li>
  <li class="breadcrumb-item active">เอกสารประกอบการนิเทศงาน</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i>เอกสารประกอบการนิเทศงาน</div>
              <div class="card-body">
              <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>รหัสนิสิต</th>
                        <th>ชื่อ-สกุล</th>
                        <th>สาขาวิชา</th>
                        <th>สถานประกอบการที่ได้</th>
                        <th>จังหวัด</th>
                        <th>เอกสาร</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $row){?>
                      <tr>
                        <td><?php echo $row->student_id ?></td>
                        <td><?php echo $row->fullname ?></td>
                        <td><?php echo $row->name ?></td>
                        <td><?php echo $row->name_th ?></td>
                        <td><?php echo $row->province ?></td>
                        <td><?php echo $row->pdf_file ?><td>
                        </tr>
                        <?php
                        }
                        ?>
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