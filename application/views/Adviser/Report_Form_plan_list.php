<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>


<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <div class="col-sm-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i> แบบแจ้งแผนปฎิบัติการสหกิจ</div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th></th>
                        <th>รหัสนิสิต</th>
                        <th>ชื่อ - สกุล</th>
                        <th>สาขาวิชา</th>
                        <th>สถานประกอบการ</th>
                        <th>จังหวัด</th>
                        <th></th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data as $row) {?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td class="text-left"><?php echo $row['student']['id']; ?></td>                      
                            <td class="text-left"><?php echo $row['student']['fullname']; ?></td>
                            <td class="text-left"><?php echo $row['department']['name']; ?></td>
                            <td class="text-left"><?php echo $row['company']['name_th']; ?> (<?php echo $row['company']['name_en']; ?>)</td>
                            <td class="text-left"><?php echo $row['company_address']['province']; ?></td>
                            <td class="text-center">
                                <?php echo anchor('Adviser/Report_Form_plan/title_plan/'.$row['student']['id']  , '<i class="fa fa-list-alt"></i> รายละเอียด', 'class="btn btn-primary"');?>
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



</main>