<!-- Breadcrumb -->

<!-- Main content -->
<main class="main">

<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
  <li class="breadcrumb-item active">จัดการปีการศึกษา</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row" >
            <!--1 box-->
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"> จัดการปีการศึกษา</div></i>
                    <div class="card-body">
                        <div class="row">
                            <!-- แสดงรายการที่เพิ่ม -->
                            <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                        <table class="table table-bordered datatable">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>ปีการศึกษา</th>
                                                <th>สถานะการปีการศึกษา(ปัจจุบัน)</th>
                                            </tr>
                                            </thead>
                                            <tbody>                                         
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-left">1/2560</td>
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
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">                        
                                            <h4 class="modal-title icon-magnifier-add " > เพิ่มปีการศึกษาใหม่..</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('Officer/Test_Management/add');?>" method="post">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="text-input">ภาคเรียน</label>
                                                    <select id="select" name="select" class="form-control" required>
                                                        <option value="">Please select</option>
                                                        <option value="1">ที่ 1</option>
                                                        <option value="2">ที่ 2</option>
                                                       
                                                    </select>
                                                </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="text-input">ปีการศึกษา</label>
                                                        <select id="select" name="select" class="form-control" required>
                                                            <option value="">Please select</option>
                                                        <?php
                                                        $year = date('Y')+543;
                                                        for($i=$year-2; $i<$year+10; $i++) { ?>
                                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="close" class="btn btn-danger" data-dismiss="modal"> ปิด</button>
                                                    <button type="submit" class="btn btn-success"> บันทึก</button>
                                                </div>
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
