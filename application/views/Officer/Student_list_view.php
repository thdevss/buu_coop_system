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
              <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>รหัสนิสิต</th>
                        <th>ชื่อ-สกุล</th>
                        <th>GPAX</th>
                        <th>สาขาวิชา</th>
                        <th>สถานะสหกิจ</th>
                        <th>สถานะจากสถานประกอบการ</th>
                        <th>รายละเอียด</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      foreach($data as $row) {    
                      ?>
                      <tr>
                        <td><?php echo $row['student']->id; ?></td>
                        <td><?php echo $row['student']->fullname; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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