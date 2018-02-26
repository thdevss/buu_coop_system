<!-- Breadcrumb -->

<!-- Main content -->
<main class="main">

<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">จัดการเอกสารที่นิสิตต้องส่ง</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <!--1 box-->
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"> จัดการเอกสารที่นิสิตต้องส่ง</div></i>
                    <div class="card-body">
                        <div class="row">
                            <!-- แสดงรายการที่เพิ่ม -->
                            <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <table class="table table-bordered datatable">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>เอกสาร</th>
                                                <th>สถานะเอกสาร</th>
                                            </tr>
                                            </thead>
                                            <tbody>                                         
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-left">IN_S001 - เเบบคำร้องทั่วไป</td>
                                                    <td class="text-center">
                                                    <label class="switch switch-text switch-pill switch-success-outline-alt">
                                                        <input type="checkbox" class="switch-input">
                                                        <span class="switch-label" data-on="On" data-off="Off"></span>
                                                        <span class="switch-handle"></span>       
                                                    </label>                                         
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td class="text-left">IN_S002 - ใบสมัครงานสหกิจศึกษา</td>
                                                    <td class="text-center">
                                                    <label class="switch switch-text switch-pill switch-success-outline-alt">
                                                        <input type="checkbox" class="switch-input">
                                                        <span class="switch-label" data-on="On" data-off="Off"></span>
                                                        <span class="switch-handle"></span>       
                                                    </label>                                         
                                                    </td>
                                                </tr>                                   
                                            </tbody>
                                        </table>
                                        </div>                                   
                                    </div>
                                </div>      
                                         
                            </div>                                    
                            <!-- แสดงรายการที่เพิ่ม -->
                    </div><!-- close card  -->
                </div><!-- close card body -->
            </div><!-- close card col-md-6 -->


        </div><!-- close row -->
    </div><!-- close animated -->
 </div> <!-- close rocontainerw -->
 
 </main>
