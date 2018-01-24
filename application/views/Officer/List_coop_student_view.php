<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#">เจ้าหน้าที่</a></li>
  <li class="breadcrumb-item active">รายชื่อนิสิตสหกิจ</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i>รายชื่อนิสิตสหกิจ</div>
              <div class="card-body">
              <table class="table table-bordered datatable" >
                    <thead>
                      <tr>
                        <th class="text-center">รหัสนิสิต</th>
                        <th class="text-center" >ชื่อ-สกุล</th>
                        <th class="text-center">ตำแหน่งงาน </th>
                        <th class="text-center">บริษัท</th>
                        <th class="text-center">พี่เลียง</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $row){ 
                      ?>

                      <tr>
                        <td class="text-center"><?php echo $row['student']->id ?></td>
                        <td class="text-center"><?php echo $row['student']->fullname ?></td>
                        <td class="text-center"><?php echo $row['position_title'] ?></td>
                        <td class="text-center"><?php echo $row['company']->name_th ?></td>
                        <td class="text-center"><?php echo $row['mentor_person_id']->fullname ?></td>
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
        
      </div>
    </div>
  </div>
</div>