    <!-- Main content -->
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><?php echo strToLevel($user->login_type);?></a></li>
        <li class="breadcrumb-item active">ประกาศข่าวสาร</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
          <div class="row">
            <?php foreach($rowNews as $row) { ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $row['news_title'];?>
                            <span class="btn btn-dark float-right">ผู้ลงประกาศ: <?php echo $row['author']['officer_fullname'];?></span>
                            <span class="btn btn-dark float-right" style="margin-right:10px;"><?php echo thaiDate(date('Y-m-d H:i', strtotime($row['news_date'])), true);?></span>
                        </div>
                        <div class="card-body">
                            <?php echo $row['news_detail'];?>
                        </div>

                        <?php if(@$row['file']) { ?>                        
                        <div class="card-footer">
                            ดาวน์โหลดไฟล์:
                            <?php 
                            foreach($row['file'] as $rowFile) {
                                echo '<a href="'.base_url('uploads/'.$rowFile).'" class="btn btn-xs btn-info">'.basename($rowFile).'</a>';
                            }
                            ?>
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>  
            <?php } ?> 
          </div>  
        </div>
      </div>
      <!-- /.conainer-fluid -->
    </main>

