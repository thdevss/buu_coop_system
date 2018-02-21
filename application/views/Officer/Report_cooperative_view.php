<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#">อาจารย์</a></li>
  <li class="breadcrumb-item active">สถิติการฝึกงานที่ผ่านมา</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> รายงานการไปสหกิจ</div>
                    <div class="card-body">
                        <form action="<?php echo site_url('Officer/Report_cooperative/search');?>" method="post">
                            <div class="row">
                                <div class="form-group col-sm-4">
                                <label for"company_id">บริษัทที่ไป</label>
                                    <select class="form-control" id="company_id" name="company_id">
                                        <option value="0">ทั้งหมด</option>
                                    <?php foreach($company_name as $row) {?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['name_th']; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            <div class="form-group col-sm-6">
                                <label for"">หลักสูตร</label><br>
                                    <?php foreach($department_name as $row) { ?>
                                        <div class="form-check form-check-inline mr-5">
                                            <input class="form-check-input" type="checkbox" id="department_id" value="<?php echo $row['id'];?>" name="department_id">
                                            <label class="form-check-label" for="department_id"><?php echo $row['name']; ?></label>
                                        </div>
                                    <?php } ?>      
                            </div>
                                <div class="form-group col-sm-2">
                                <button type="submit" class="btn btn-md btn-success"> ค้นหา</button>  
                                </div>
                            </div>
                        </form>
                        <ul class="list-group">
                        <li class="list-group-item active">หลักสูตร IT</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                        </ul>










                    </div>
                </div>
            </div>    
        </div>       
  </div>
</div>

