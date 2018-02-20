
<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">ประวัติการเข้ากิจกรรมอบรม</li>
</ol>

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"><i class="fa fa-align-justify"></i> ประวัติการเข้ากิจกรรมอบรม</div>

                                    <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home">ผลลัพธ์ทั้งหมด</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#TAB_0" role="tab" aria-controls="TAB_0">อบรมเสริมทักษะทางวิชา</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#TAB_1" role="tab" aria-controls="TAB_1">เตรียมความพร้อมสหกิจศึกษา</a>
                                    </li>
                                    </ul>
                                    <div class="tab-content">

                                    <div class="tab-pane active" id="home" role="tabpanel">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p><dt>อบรมเสริมทักษะทางวิชา</dt></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p>
                                                    <dd>
                                                        จำนวนชั่วโมงทั้งหมด: 
                                                        <?php echo $train_type[0]['total_hour'];?>
                                                    </dd>
                                                </p>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>
                                                    <dd>
                                                        จำนวนชั่วโมงที่เก็บ: 
                                                        <?php echo $train_type[0]['check_hour'];?>
                                                    </dd>
                                                </p>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>
                                                    <dd>
                                                        จำนวนชั่วโมงที่ขาด: 
                                                        <?php 
                                                        $calc_hour = $train_type[0]['total_hour']-$train_type[0]['check_hour'];
                                                        if($calc_hour < 0) echo 0;
                                                        else echo $calc_hour;
                                                        ?>
                                                    </dd>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p><dt>เตรียมความพร้อมสหกิจศึกษา</dt></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p>
                                                    <dd>
                                                        จำนวนชั่วโมงทั้งหมด: 
                                                        <?php echo $train_type[1]['total_hour'];?>
                                                    </dd>
                                                </p>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>
                                                    <dd>
                                                        จำนวนชั่วโมงที่เก็บ: 
                                                        <?php echo $train_type[1]['check_hour'];?>
                                                    </dd>
                                                </p>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>
                                                    <dd>
                                                        จำนวนชั่วโมงที่ขาด: 
                                                        <?php 
                                                        $calc_hour = $train_type[1]['total_hour']-$train_type[1]['check_hour'];
                                                        if($calc_hour < 0) echo 0;
                                                        else echo $calc_hour;
                                                        ?>
                                                    </dd>
                                                </p>
                                            </div>
                                        </div>



                                    </div>


                                    <?php foreach($train_type as $key => $train) { ?>

                                    <div class="tab-pane" id="TAB_<?php echo $key;?>" role="tabpanel">

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p>
                                                    <dd>
                                                        จำนวนชั่วโมงทั้งหมด: 
                                                        <?php echo $train['total_hour'];?>
                                                    </dd>
                                                </p>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>
                                                    <dd>
                                                        จำนวนชั่วโมงที่เก็บ: 
                                                        <?php echo $train['check_hour'];?>
                                                    </dd>
                                                </p>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>
                                                    <dd>
                                                        จำนวนชั่วโมงที่ขาด: 
                                                        <?php 
                                                        $calc_hour = $train['total_hour']-$train['check_hour'];
                                                        if($calc_hour < 0) echo 0;
                                                        else echo $calc_hour;
                                                        ?>
                                                    </dd>
                                                </p>
                                            </div>
                                        </div>

                                        <p></p>

                                        <table class="table table-bordered datatable">
                                            <thead>
                                                <tr bgcolor="">
                                                    <th class="text-left"></th>
                                                    <th class="text-left">วันที่อบรม</th>
                                                    <th class="text-left">ประเภทโครงการ</th>
                                                    <th class="text-left">ชื่อโครงการ</th>
                                                    <th class="text-left">จำนวนชั่วโมง</th>                                                    
                                                    <th class="text-left">ชั่วโมงที่เก็บได้</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; foreach($train['history'] as $row) { ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $i++;?></td>
                                                    <td class="text-left"><?php echo thaiDate($row['train']['register_period']);?></td>
                                                    <td class="text-left"><?php echo $train['name'];?></td>
                                                    <td class="text-left"><?php echo $row['train']['title'];?></td>
                                                    <td class="text-right"><?php echo $row['train']['number_of_hour'];?></td>
                                                    <td class="text-right"><?php echo $row['check_hour'];?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    
                                    </div>

                                    <?php } ?>



                            </div>
                        </div>
                    </div>
                </div>
            </div>   
</main>     