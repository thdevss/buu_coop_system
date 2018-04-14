    <!-- Main content -->
    <main class="main">

    <?php echo $this->breadcrumbs->show() ;?>


      <div class="container-fluid">
        <div class="animated fadeIn">
          <div class="row">

                <?php if( count($ins001) < 1 ) : ?>
                <div class="col-md-12">
                    <div class="alert alert-primary">
                        <b>โปรดสมัครเข้าร่วมเป็นนิสิตสหกิจก่อนเข้าใช้งานค่ะ</b>
                        <a href="<?php echo site_url('student/main/coop_register');?>" style="color: red; font-size:18px;">คลิ้กเพื่อสมัครเป็นนิสิตสหกิจ</a>
                    </div>

                </div>
                <?php endif; ?>

                <?php if($status) : ?>
                <div class="col-md-12">
                    <div class="alert alert-<?php echo $status['color'];?>">
                        <b><?php echo $status['text'];?></b>
                    </div>

                </div>
                <?php endif; ?>

                <?php if($session_alert) : ?>
                <div class="col-md-12">
                    <?php echo $session_alert;?>

                </div>
                <?php endif; ?>

                

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

